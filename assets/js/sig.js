window.HELP_IMPROVE_VIDEOJS = false;
/**
 *
 * @author Joab Torres Alencar
 * @description Só carrega o conteudo da página após seu total carregamento
 */
function mostrarConteudo() {
    var elemento = document.getElementById("tela_load");
    elemento.style.display = "none";

    var elemento = document.getElementById("tela_sistema");
    if (elemento) {
        elemento.style.display = "block";
    }

    var elemento = document.getElementById("interface_login");
    if (elemento) {
        elemento.style.display = "block";
    }
}
if (document.getElementById('viewMapa2')) {
    function initialize() {
        if ((typeof latitude !== "undefined") && (typeof longitude !== "undefined")) {
            var latlng = new google.maps.LatLng(latitude, longitude);
        } else {
            var latlng = new google.maps.LatLng(-1.2955583054409823, -47.91926629129639);
        }
        var options = {
            zoom: 14,
            center: latlng,
        };
        map = new google.maps.Map(document.getElementById("viewMapa2"), options);
        marker = new google.maps.Marker({
            map: map
        });
        marker.setPosition(latlng);
    }
    function loadScriptGoogleMapsAPI() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&callback=initialize';
        document.body.appendChild(script);
    }
    loadScriptGoogleMapsAPI();
}
/**
 * @author Joab Torres Alencar
 * @description classes para tratamento de preenchimento de campos
 */
$(document).ready(function () {
    mostrarConteudo();
    $('.select2-js').select2({
        width: '100%'
    });
    $(".date_serach").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: 'dd/mm/yy'
    });
    $('.money-bank').maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
    $('.input-data').mask("99/99/9999");
    $('.input-cpf').mask("999.999.999-99");
    $('.input-telefone').mask("(99) 9999-9999");
    $('.input-celular').mask("(99) 99999-9999");
});
/**
 * @author Joab Torres Alencar
 * @description Está função submite o forumlário de buscar rápida que está no menu da direita
 */
function submit_form_navbar() {
    if (document.nSearchSGL) {
        document.nSearchSGL.submit();
    }
}

//oculta o arlert de mensagem
$("[data-hide]").on("click", function () {
    $("#alert-msg").toggle().addClass('oculta');
});
/**
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
 */

if (document.getElementById("container-usuario-form")) {
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var num = input.name.replace("tImagem-", "");
            reader.onload = function (e) {
                $("#viewImagem-" + num).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readDefaultURL = function () {
        var valor = $('input[name=nSexo]:checked').val();
        if (valor === "M") {
            $("#viewImagem-1").attr('src', base_url + '/assets/imagens/user_masculino.png');
        } else {
            $("#viewImagem-1").attr('src', base_url + '/assets/imagens/user_feminino.png');
        }
        if ($("#iImagem-user").val() !== null) {
            $("#iImagem-user").val(null);
        }
    };
}


/**
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
 */

if (document.getElementById("form_cooperado")) {
    /*
     * Google mapas
     */
    var geocoder;
    var map;
    var marker;
    function initialize() {
        if (document.getElementById("cLatitude").value != '' && document.getElementById("cLongitude").value != '') {
            var latlng = new google.maps.LatLng(document.getElementById("cLatitude").value, document.getElementById("cLongitude").value);
        } else {
            var latlng = new google.maps.LatLng(-1.2955583054409823, -47.91926629129639);
        }
        var options = {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("viewMapa"), options);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });
        marker.setPosition(latlng);

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#cEndereco').val(results[0].formatted_address);
                        $('#cLatitude').val(marker.getPosition().lat());
                        $('#cLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    }

    function loadScriptGoogleMapsAPI() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&callback=initialize';
        document.body.appendChild(script);
    }

    function carregarNoMapa(endereco) {
        geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $('#cEndereco').val(results[0].formatted_address);
                    $('#cLatitude').val(latitude);
                    $('#cLongitude').val(longitude);
                    var location = new google.maps.LatLng(latitude, longitude);
                    marker.setPosition(location);
                    map.setCenter(location);
                    map.setZoom(16);
                }
            }
        });
    }
    loadScriptGoogleMapsAPI();
    $(document).ready(function () {
        $("#btnEndereco").click(function () {
            if ($(this).val() !== "")
                carregarNoMapa($("#txtEndereco").val());
        });
        $("#cEndereco").blur(function () {
            if ($(this).val() !== "")
                carregarNoMapa($(this).val());
        });
    });
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var num = input.name.replace("tImagem-", "");
            reader.onload = function (e) {
                $("#viewImagem-" + num).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
}



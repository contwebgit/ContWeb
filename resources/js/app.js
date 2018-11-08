
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

function animateCount(id, max, time){
    let i=1;

    if(max > 700){
        i = 700;
    }

    $("#"+id).fadeIn(10000);
    let loop = setInterval(function(){
        $("#"+id).text("+" + i);
        if(i === max){
            clearInterval(loop);
        }
        i++;
    },time);
}

//$('html, body').animate({scrollTop : 0},100)

$(document).ready(function() {

    $('#link-planos').click(function() {
        console.log("trwy5");
        $('html, body').animate({scrollTop:1500}, 'slow');
        return false;
    });

    let first = true;
    $(window).scroll(function() {
        if ($(".questions").is(":visible")) {
            $(".question").fadeIn(3000);
        } // fim do if
        if ($(".statistics").is(":visible")) {

            if(first){
                animateCount("age", 45, 70);
                animateCount("opened", 1500, 2);
                animateCount("like", 2000, 1);
                animateCount("clients", 2000, 1);
                first = false;
            }
        } // fim do if
    }); // fim scroll

    $("#conteudos").hover(function(){
        $("#sub-conteudos").toggle();
    });

    $("#planos").hover(function(){
        $("#sub-planos").toggle();
    });

    $("#blogs").hover(function(){
        $("#sub-blogs").toggle();
    });

    $("#configuracoes").hover(function () {
        $("#sub-configuracoes").toggle();
    });

    $("#contratar").on("click", function () {
        $("#modal-cnpj").modal();
    });

    $("#preencher").on("click", function(){
        var a = $("#preencher").is(":checked");
        $("#cpreencher").val(a);
        console.log( $("#cpreencher").val());
    });

    $("#autopreencher").on("click", function () {
        let cnpj = $("#cnpj-aux").val();
        $("#cnpj").val(cnpj);
        $("#form-orcamento").submit();
    });

    $("#adicionar-pergunta").on("click", function() {
        $("#modal-planos").modal();
    });

    $("#select-planos").on("change", function() {
        if($(this).val() === ''){
            $(".plano-novo").show();
        }else{
            $(".plano-novo").hide();
        }
    });

    $(window).on("scroll", function(){
        if($(this).scrollTop() > 400){
            $("fixed-content").addClass("fixed");
        }else{
            $("fixed-content").removeClass("fixed");
        }
    });


    $(".input-line").keyup(function(){
        let resposta = 0;
        for(var i=0; i<$(".input-line").left-2; i++){
           resposta += parseInt($(this)[0].value);
        }
        var total = (10 * resposta);
        $(".totalAtual").val(total);
        $(".totalAtual").text(total);
    });

    $(".pergunta > select").on("change", function(){
        var pergunta = $(".pergunta > select");
        var total = 0;
        var valid = true;

        pergunta.each(function(key, value){
            if(key !== 0) {
                total = total + parseFloat(value.value.split(':')[1]);
            }
            if(value.value === "0:0"){
                valid = false;
            }
        });

        if(valid){
            $("#contratar").removeAttr("disabled");
            $("#contratar-servico").removeAttr("disabled");
        }

        var text = "R$ " + total.toFixed(2).toString().replace(".", ",");

        $("#total").val(text);
        $("#totalVal").val(text);

    });


    $("#atualmente").keyup(function(){
            var atual = $(this).val();

            var total =  parseFloat(atual) - parseFloat($("#total").val().split("R$ ")[1]);
            console.log(parseFloat($("#total").val().split("R$ ")[1]));
            $("#economia-mes").val("R$ " + total + ",00 /mês");
            $("#economia-ano").val("R$ " + total*12 + ",00 /ano");
    });

    $("#show").on("click", function(){
        $(this).attr("disabled", "disabled");

        if($(this).find('i').hasClass("arrow-circle-right")){
            $(this).find('i').removeClass("arrow-circle-right");
            $(this).find('i').addClass("arrow-circle-left");
        }else{
            $(this).find('i').removeClass("arrow-circle-left");
            $(this).find('i').addClass("arrow-circle-right");
        }

        let left = $(".main-sidebar").css("left").split("px")[0];
        if( parseInt(left) < 1 || left === "auto") {
            $(".main-sidebar").animate({"left": "+=260px"}, "slow");
            $(this).animate({"left": "+=250px"}, "slow");
        }else{
            $(".main-sidebar").animate({"left": "-=260px"}, "slow");
            $(this).animate({"left": "-=250px"}, "slow");
        }
        $(this).removeAttr("disabled");
    });

    if($('#cnpj').length > 0){
        var cnpj = $('#cnpj').val().replace(/[^0-9]/g, '');

        if(cnpj.length === 14) {

            let url = 'https://www.receitaws.com.br/v1/cnpj/' + cnpj;

            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'jsonp',
                complete: function (xhr) {

                    response = xhr.responseJSON;

                    if (response.status === 'OK') {
                        $("#InputCNPJ").val(response.cnpj);
                        $("#InputCompany").val(response.nome);
                        $("#InputDate").val(response.abertura);
                        $("#InputNameFantasy").val(response.fantasia);
                        $("#InputCnaeMain").val(response.atividade_principal[0].code + " - " + response.atividade_principal[0].text);
                        $("#activity").val(response.atividade_principal[0].text);

                        response.atividades_secundarias.forEach(function (value) {
                            $("#InputCnaeSecondary").val($("#InputCnaeSecondary").val() + value.code + " - " + value.text + "\n");
                        });

                        response.qsa.forEach(function(data){
                            $("#InputPartner").val($("#InputPartner").val() + data.nome + "\n");
                            $("#InputQualification").val($("#InputQualification").val() + data.qual + "\n");

                        });

                        $("#InputLegal").val(response.natureza_juridica);
                        $("#InputAddress").val(response.logradouro);
                        $("#InputCEP").val(response.cep);
                        $("#InputDistrict").val(response.bairro);
                        $("#InputCounty").val(response.municipio);
                        $("#InputNumber").val(response.numero);
                        $("#InputUF").val(response.uf);
                        $("#InputStatus").val(response.situacao);
                        $("#InputStatusDate").val(response.data_situacao);
                        $("#InputStatusReason").val(response.motivo_situacao);
                        $("#InputSpecial").val(response.situacao_especial)
                        $("#InputSpecialDate").val(response.data_situacao_especial)
                        $("#InputShareCapital").val(response.capital_social);

                        $("#InputEmail").focus();
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    }

    if($("#preencher").val() === "1") {
        $("#contratar-servico").attr("type", "submit");
    }else{
        $("#contratar-servico").on("click", function () {
            $("#modal-cnpj").modal();
        });
    }

    if($("#preencher-count").val() === "1"){
        var cpf = $('#cpf').val().replace(/[^0-9]/g, '');

        if(cpf.length === 14) {
            let url = 'https://www.receitaws.com.br/v1/cnpj/' + cpf;

            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'jsonp',
                complete: function (xhr) {
                    response = xhr.responseJSON;

                    if (response.status === 'OK') {
                        $("#InputCPF").val(cpf);
                        $("#InputName").val(response.nome);
                        $("#InputCep").val(response.cep);
                        $("#InputLogradouro").val(response.logradouro);
                        $("#InputNumero").val(response.numero);
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    }


    $("#estado-orcamento").on("change", function(){
        if(window.location.href.indexOf('plano') !== -1) {
            let plano = $("#plano").val();
            let estado = $(this).val();

            window.location = '/orcamento/plano/' + plano + '/' + estado;
        }else{
            let servico = $("#servico").val();
            let estado = $(this).val();

            window.location = '/orcamento/servico/' + servico + '/' + estado;
        }
    });

}); // fim document ready

if($("#estado-orcamento").length > 0){
    let estado = "#" + window.location.href.split('/')[6];
    console.log(estado);
    $(estado).attr('selected', 'selected');
}

if($("#InputEstado").length > 0){
    $.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados', function(data){
       data.forEach(function(value){
          $("#InputEstado").append('<option value="'+ value.id + ":" + value.name +'">' + value.nome + '</option>' );
       });
    });

    $("#InputEstado").on("change", function(){
        $("#InputCidade").removeAttr('disabled');
        $("#InputCidade > option").remove();
        let estado = $(this).val().split(":")[0];
        $.get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + estado + "/municipios", function(data){
            data.forEach(function (value) {
                $("#InputCidade").append('<option value="'+ value.nome +'">' + value.nome + '</option>' );

            });
        });
    });
}

$("#checkbox-termos").on("click", function () {
    $("#buttonContrate").removeAttr('disabled');
});

$("#service_start_month").on("change", function(){
    $("#month-message > p").remove();
    if($(this).val() === 'Mês atual'){
        $("#month-message").append("<p>O fechamento fiscal/contábil deste mês corrente já ficará por nossa conta. Haverá uma cobrança no ato desta contratação, para efetivação do contrato. </strong>ATENÇÃO</strong> Nossos serviços são cobrados na sistemática pré-pago.</p>");
    }else{
        $("#month-message").append("<p>O fechamento fiscal/contábil deste mês corrente, que será efetuado no início do próximo mês, deverá ser executado, ainda, pelo seu antigo Contador. Haverá uma cobrança no ato desta contratação, para efetivação do contrato, porém, você receberá o valor integral em crédito no próximo mês. </strong>ATENÇÃO</strong> Nossos serviços são cobrados na sistemática pré-pago.</p>");
    }
});


var fillInPage = (function () {
    var updateCityText = function (geoipResponse) {
        $("#geopip").val(JSON.stringify(geoipResponse));
        $("#agente").val(navigator.userAgent);
    };

    var onSuccess = function (geoipResponse) {
        updateCityText(geoipResponse);
    };

    var onError = function (error) {
        return "";
    };

    return function () {
        geoip2.city( onSuccess, onError );
    };
}());

if($('#cnpj').length > 0){
    fillInPage();
}

$("#btn-add-post").on("click", function(){
    var conteudo = $("#page").html();
    $("#conteudo").val(conteudo);
    $("#form-add-post").submit();
});

var richTextEditor = {
    bindEvents: function() {
        this.bindDesignModeToggle();
        this.bindToolbarButtons();
    },

    bindDesignModeToggle: function() {
        $('#page').on('click', function(e) {
            document.designMode = 'on';
        });

        $(document.body).on('click', function(e) {
            var $target = $(e.target);

            if ($target.is('body')) {
                document.designMode = 'off';
            }
        });
    },

    bindToolbarButtons: function() {
        $('#toolbar').on('mousedown', '.icon', function(e) {
            e.preventDefault();
            var btnId = $(e.target).attr('id');
            this.editStyle(btnId);
        }.bind(this));
    },

    editStyle: function(btnId) {
        var value = null;

        if (btnId === 'createLink') {
            if (this.isSelection()) value = prompt('Enter a link:');
        }

        document.execCommand(btnId, true, value);
    },

    isSelection: function() {
        var selection = window.getSelection();
        return selection.anchorOffset !== selection.focusOffset
    },

    init: function() {
        this.bindEvents();
    },
}

richTextEditor.init();

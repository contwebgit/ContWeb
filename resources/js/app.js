
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

        pergunta.each(function(key, value){
            if(key !== 0) {
                total = total + parseFloat(value.value.split(':')[1]);
            }
        });

        var text = "R$ " + total.toFixed(2).toString().replace(".", ",");
        $("#total").val(text);
    });


    $("#atualmente").on("change", function(){
            var atual = $(this).val();

            console.log(parseFloat($("#total").val()));

            var total =  parseFloat(atual) - parseFloat($("#total").val().split("R$ ")[1]);
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
                    console.log(response);

                    if (response.status === 'OK') {
                        $("#InputCNPJ").val(response.cnpj);
                        $("#InputCompany").val(response.nome);
                        $("#InputDate").val(response.abertura);
                        $("#InputNameFantasy").val(response.fantasia);
                        $("#InputCnaeMain").val(response.atividade_principal[0].code);
                        $("#activity").val(response.atividade_principal[0].text);

                        response.atividades_secundarias.forEach(function (value) {
                            $("#InputCnaeSecondary").val($("#InputCnaeSecondary").val() + " / " + value.code);
                        });

                        $("#InputLegal").val(response.natureza_juridica);
                        $("#InputAddress").val(response.logradouro);
                        $("#InputCEP").val(response.cep);
                        $("#InputDistrict").val(response.bairro);
                        $("#InputCounty").val(response.municipio);
                        $("#InputNumber").val(response.numero);
                        $("#InputUF").val(response.uf);
                        $("#InputPhone").val(response.telefone);
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
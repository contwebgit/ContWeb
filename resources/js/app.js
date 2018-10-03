
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

    $("#conteudos").on("click", function(){
        let left = $("#sub-conteudos").css("left").split("px")[0];
        if( parseInt(left) < 1 || left === "auto") {
            $("#sub-conteudos").animate({"left": "+=467px"}, "slow");
        }else{
            $("#sub-conteudos").animate({"left": "-=467px"}, "slow");
        }
    });

    $("#planos").on("click", function(){
        let left = $("#sub-planos").css("left").split("px")[0];
        if( parseInt(left) < 1 || left === "auto") {
            $("#sub-planos").animate({"left": "+=467px"}, "slow");
        }else{
            $("#sub-planos").animate({"left": "-=467px"}, "slow");
        }
    });

    $("#blogs").on("click", function(){
        let left = $("#sub-blogs").css("left").split("px")[0];
        if( parseInt(left) < 1 || left === "auto") {
            $("#sub-blogs").animate({"left": "+=467px"}, "slow");
        }else{
            $("#sub-blogs").animate({"left": "-=467px"}, "slow");
        }
    });

    $("#adicionar-pergunta").on("click", function(){
        $("#modal-planos").modal();
    });

    $("#select-planos").on("change", function(){
        if($(this).val() === ''){
            $(".plano-novo").show();
        }else{
            $(".plano-novo").hide();
        }
    });

    $(window).on("scroll", function(){
        if($(this).scrollTop() > 400){
            $("fixed-content").addClass("fixed");
            console.log(11);
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
            total = total + parseFloat(value.value);
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
        let left = $(".main-sidebar").css("left").split("px")[0];
        if( parseInt(left) < 1 || left === "auto") {
            $(".main-sidebar").animate({"left": "+=260px"}, "slow");
            $(this).animate({"left": "+=250px"}, "slow");
        }else{
            $(".main-sidebar").animate({"left": "-=260px"}, "slow");
            $(this).animate({"left": "-=250px"}, "slow");
        }
    });
}); // fim document ready
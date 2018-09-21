
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

    $("#consultas").on("click", function(){
        let left = $("#sub-consultas").css("left").split("px")[0];
        if( parseInt(left) < 1 || left === "auto") {
            $("#sub-consultas").animate({"left": "+=467px"}, "slow");
        }else{
            $("#sub-consultas").animate({"left": "-=467px"}, "slow");
        }
    });

    $("#select-planos").on("change", function(){
        if($(this).val() === ''){
            $(".plano-novo").show();
        }else{
            $(".plano-novo").hide();
        }
    });


}); // fim document ready
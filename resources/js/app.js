
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
        let n =  parseInt($("#icon-conteudos").css("padding-bottom").split("px")[0]);
        $("#sub-conteudos").slideToggle("slow");
        if( n === 15 ){
            $("#icon-conteudos").css("padding-bottom", "232px");
        }else{
            $("#icon-conteudos").css("padding-bottom", "15px");
        }
    });
}); // fim document ready
function scrollButtonAppear(buttonStart) {

    return function(){

        if (jQuery(window).scrollTop()>buttonStart){
            jQuery('.scroll-up-button').css('visibility','visible');
        }
        else{
            jQuery('.scroll-up-button').css('visibility','hidden');
        }
    }
}

jQuery(document).ready(function($){

    $('.scroll-up-button').click(
        function(){
            $("html,body").animate(
                {'scrollTop': "0"},500
            );
    });

    var scroll_mark = 1000; // distance down the page for button to appear (in px)

    $(window).scroll(
        scrollButtonAppear(scroll_mark)
    );

     $(window).resize(
        scrollButtonAppear(scroll_mark)
    );

});


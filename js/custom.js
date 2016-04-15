//jQuery(function($){
//    $('.product-menu-item').hover(function(){
//        $('.products-posts').addClass('when_product-menu-item_hover');
//    }, function(){
//        $('.products-posts').removeClass('when_product-menu-item_hover');
//    })
//});

//Navigation
var visible = false;
function showmenu() {
jQuery(document).ready(function ($) {
    if(visible) {
        $(".primary-mobile-nav").css('display', 'none');
        visible = false;
    } else {
        $(".primary-mobile-nav").css('display', 'block');
        visible = true;
    }
});
}

jQuery(document).ready(function ($) {
    $(window).resize(function () {
        if ($(window).width() > 700) {
            $(".primary-mobile-nav").css('display', 'none');
        }
        else {

        }
    });

});//Navigation



//Flexslider

jQuery(document).ready(function ($) {
    $(window).load(function () {
        $('#flexslider1').flexslider({
            animation: "fade",
            slideshow: true,
            controlNav: false,
            directionNav: false,
            randomize: true
        });
    });
});


jQuery(document).ready(function ($)  {

    // store the slider in a local variable
    var $window = $(window),
        flexslider = { vars:{} };

    // tiny helper function to add breakpoints
    function getGridSize() {
        return (window.innerWidth < 720) ? 2 :
            (window.innerWidth < 1200) ? 3 : 4;
    }

    $window.load(function() {
        $('#flexslider2').flexslider({
            animation: "slide",
            animationLoop: true,
            itemWidth: 210,
            minItems: getGridSize(), // use function to pull in initial value
            maxItems: getGridSize(), // use function to pull in initial value
            start: function(slider){
                flexslider = slider;
            }
        });
    });
    $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
    });
  });

//Flexslider


//Search placeholder
jQuery(document).ready(function ($) {

    document.getElementById("s").setAttribute("placeholder", "Поиск по сайту");
});
//Search placeholder


//Fixed menu
jQuery(document).ready(function ($) {
    $('.site-header').addClass('original').clone().insertAfter('.site-header').addClass('cloned').css('position', 'fixed').css('top', '0').css('margin-top', '0').css('z-index', '500').removeClass('original').hide();

    scrollIntervalID = setInterval(stickIt, 10);


    function stickIt() {

        var orgElementPos = $('.original').offset();
        orgElementTop = orgElementPos.top;

        if ($(window).scrollTop() >= (orgElementTop)) {
            orgElement = $('.original');
            coordsOrgElement = orgElement.offset();
            leftOrgElement = coordsOrgElement.left;
            widthOrgElement = orgElement.css('width');
            $('.cloned').css('left', leftOrgElement + 'px').css('top', '0').css('width', widthOrgElement).show();
            $('.original').css('visibility', 'hidden');
        } else {
                //$('.cloned').hide(0);
            $('.original').css('visibility', 'visible');
        }
    }
});

//Fixed menu


//Contacts
jQuery(document).ready(function ($) {
    $('.contact-page .fa').hover(
        function() {
            $(this).addClass('animated pulse');
        },
        function() {
            $(this).removeClass('animated pulse');
        }
    )});


//Contacts
//About Us
jQuery(document).ready(function ($) {
    $('.about-us .thumbnail-about-us').hover(
        function() {
            $(this).addClass('animated pulse');
        },
        function() {
            $(this).removeClass('animated pulse');
        }
    )});


//About Us

//google map
jQuery(document).ready(function ($) {
    function initialize() {
        var mapProp = {
            center:new google.maps.LatLng(49.443002, 32.056625),
            zoom:16,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
});
//google map


jQuery(document).ready(function ($) {

    if  (screen.width < 767){
        $('.hd-search').appendTo($('#xs_social'));
    }
});



jQuery(document).ready(function($){

    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

});

//sitebar
//jQuery(document).ready(function($){
//    $('.secondary-column-icon').click(function(){
//        var effect = 'slide';
//        var options = { direction: "right" };
//        var duration = 500;
//        $('.secondary-column').toggle(effect, options, duration,function (){
//            //if ($('.dropdown-sidebar').is(':visible')){
//            //    $('.secondary-column-icon i').removeClass("fa-arrow-left").addClass( "fa-arrow-right" );
//            //}
//            //else if(!(hasClass( "fa-arrow-left" ))) {
//            //    $('.secondary-column-icon i').removeClass("fa-arrow-right").addClass( "fa-arrow-left" );
//            //}
//        });
//
//    });
//});




//sitebar
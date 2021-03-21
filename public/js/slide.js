$(document).ready(function(){
    //trigger menu
    $('#home .menu-open-button-five').click();

    $("#slideshow > div:gt(0)").hide();

    var buttons = "<button class=\"slidebtn prev\"><i class=\"fa fa-chevron-circle-left\"></i></button><button class=\"slidebtn next\"><i class=\"fa fa-chevron-circle-right\"></i></button\>";

    var slidesl = $('.slideitem').length
    var d = "<li class=\"dot active-dot\">&bull;</li>";
    for (var i = 1; i < slidesl; i++) {
        d = d+"<li class=\"dot\">&bull;</li>";
    }
    var dots = "<ul class=\"slider-dots\">" + d + "</ul\>";

    // $("#slideshow").append(dots);
    $("#slideshow").append(buttons);

    function show_item(item,value) {
        var currentSlide = $('.current');
        var reqSlide = $('#'+item);

        var currentDot = $('.active-dot');
        var reqDot = $('.dot').eq(item);

        var Slide = reqSlide;
        var Dot = reqDot;

        currentSlide.fadeOut(item).removeClass('current');
        Slide.fadeIn(item).addClass('current');
        Slide.find('.menu-open-button-'+value).click();

        currentDot.removeClass('active-dot');
        Dot.addClass('active-dot');
    }

    buttons = ['two','three','four','five','six','seven','eight','nine'];
    buttons.forEach(button_function);

    function button_function(value) {
        $('.menu-item-'+value).click(function(){
            let item  = $(this).data('section');
            show_item(item,value);
        });
    }

    $('.back-button').click(function() {
        var item  = $(this).data('section');
        show_item(item);
    })

});

$(document).on('ready', function () {
    "use strict";
    $('#contactform').submit(function () {
        var action = $(this).attr('action');
        $("#message").slideUp(750, function () {
            $('#message').hide();
            $('#submit').after('<img src="images/ajax-loader.gif" class="loader" />').attr('disabled', 'disabled');
            $.post(action, {
                name: $('#name').val(),
                email: $('#email').val(),
                comments: $('#comments').val(),
                verify: $('#verify').val()
            }, function (data) {
                document.getElementById('message').innerHTML = data;
                $('#message').slideDown('slow');
                $('#contactform img.loader').fadeOut('slow', function () {
                    $(this).remove()
                });
                $('#submit').removeAttr('disabled');
                if (data.match('success') != null) $('#contactform').slideUp('slow');
            });
        });
        return false;
    });
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            $(".forsticky").addClass("sticky");
        }
        else {
            $(".forsticky").removeClass("sticky");
            $(".forsticky").addClass("");
        }
    });
    $('.cartinfo > i').on('click', function () {
        $(this).parent().parent().fadeOut('fast');
    });
    $('.qopen').on('click', function () {
        $('.quickviewpopup').fadeIn('fast');
        $('html').addClass('noscroll');
        return false;
    });
    $('.closeview').on('click', function () {
        $('.quickviewpopup').fadeOut('fast');
        $('html').removeClass('noscroll');
    });
    $('.searchopen').on('click', function () {
        $('.searchdialouge').fadeIn('fast');
        $('header').addClass('showup');
    });
    $('.searchpopup > span').on('click', function () {
        $(this).parent().parent().fadeOut('fast');
        $('header').removeClass('showup');
    });
    $('.cartopen').on('click', function () {
        $('.cartslide').addClass('slidein');
        $('body').addClass('active');
    });
    $('.closecartslide').on('click', function () {
        $('.cartslide').removeClass('slidein');
        $('body').removeClass('active');
    });
    $('.delcart').on('click', function () {
        $(this).parent().parent().fadeOut();
    });
    $('.filterbtn').on('click', function () {
        $(this).toggleClass('active');
        $('.filter-open').slideToggle('fast');
    });
    $('header.sideheader nav > ul > li.menu-item-has-children > a').on('click', function () {
        $('header.sideheader nav > ul > li.menu-item-has-children > ul').slideUp();
        $(this).next('ul').slideDown('fast');
        return false;
    });
    $('.respheader nav > ul > li.menu-item-has-children > a').on('click', function () {
        $('.respheader nav > ul > li.menu-item-has-children > ul').slideUp();
        $(this).next('ul').slideDown('fast');
        $(this).toggleClass('active');
        return false;
    });
    $('.page-loading > span').on('click', function () {
        $(this).parent().fadeOut();
    });
    $('.center #hamburger-two').on('click', function () {
        $(this).toggleClass('active');
        $('.menuclick').toggleClass('active');
        $('nav').fadeToggle();
    });
    $('.open-minimal-menu.resopen').on('click', function () {
        $('.respheader').toggleClass('slidein');
        $('.open-minimal-menu.resopen #hamburger-two').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('.open-minimal-menu.sideopen').on('click', function () {
        $('.sideheader').toggleClass('slidein');
        $('.open-minimal-menu.sideopen #hamburger-two').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('.faqs-sec > h2').on('click', function () {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });
    $('.tab-sec .tab-content:first').fadeIn('fast');
    $('.tab-sec li a').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.tab-sec li a').removeClass('current');
        $('.tab-sec .tab-content').fadeOut();
        $(this).addClass('current');
        $("#" + tab_id).fadeIn('fast');
    });
    $('.tab-sec2 .tab-content2:first').fadeIn('fast');
    $('.tab-sec2 li a').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.tab-sec2 li a').removeClass('current');
        $('.tab-sec2 .tab-content2').fadeOut();
        $(this).addClass('current');
        $("#" + tab_id).fadeIn('fast');
    });
});
$(window).on('load', function () {
    "use strict";
    $('.page-loading').fadeOut();
    var full_height = $(window).height();
    $(".full-bg").css({"height": full_height});
});
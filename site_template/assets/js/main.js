$(document).ready(function () {
    //support page
    $("#id-1").click(function () {
        $('html, body').animate({
            scrollTop: $("#quest-id-5").offset().top
        }, 2000);
    });
    $("#id-2").click(function () {
        $('html, body').animate({
            scrollTop: $("#quest-id-5").offset().top
        }, 2000);
    });
    $("#id-3").click(function () {
        $('html, body').animate({
            scrollTop: $("#quest-id-5").offset().top
        }, 2000);
    });
    $("#id-4").click(function () {
        $('html, body').animate({
            scrollTop: $("#quest-id-5").offset().top
        }, 2000);
    });
    $("#id-5").click(function () {
        $('html, body').animate({
            scrollTop: $("#quest-id-5").offset().top
        }, 2000);
    });

    $("#owl-demo").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        autoPlay : false,
                pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });
    $("#owl-demo-2").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        autoPlay : false,
                pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });
    $("#owl-demo-3").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        autoPlay : false,
                pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });
    $("#owl-demo-4").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        autoPlay : false,
                pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });

    $("#owl-demo-5").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        autoPlay : false,
                pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });
    
        $("#owl-demo-6").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        autoPlay : false,
                pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });
    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
    $('.count-basket').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
    //search page
    $(".trade-list li").click(function () {
        if ($(this).hasClass("select-it")) {
            $(this).removeClass("select-it");
        } else {
            $(this).addClass("select-it");
        }
    });
    $("#click").click(function () {
        $('html, body').animate({
            scrollTop: $("#main0").offset().top
        }, 2000);
    });
    $('#h-slider').slider({
        range: true,
        values: [17, 67]
    });
    //row view change
    $("#row-view").click(function () {
        $('div.search-item').addClass('row-view-change');
        $('div.hover-prod-btn').hide();
        $('div.more-hide').removeClass('hidden');
        $('.search-item.row-view-change>.prod-item .finish-list-a').removeClass('hidden');
        $('.search-item.row-view-change>.prod-item .prod-img img').addClass('img-thumbnail');
    });
    $("#grid-view").click(function () {
        $('div.search-item').removeClass('row-view-change');
        $('div.hover-prod-btn').hide();
        $('div.more-hide').addClass('hidden');
        $('.search-item>.prod-item .finish-list-a').addClass('hidden');
        $('.search-item.row-view-change>.prod-item .prod-img img').removeClass('img-thumbnail');
    });
    $('#sidebar-toggle').click(function () {
        $('.side-toggle').slideToggle();
    });
    $('#buy-toggle').click(function () {
        $('.buy-finish').slideToggle();
    });

    $(function () {
        $("#progressbar").progressbar({
            value: 37
        });
    });
    //buying page
    $('#have-pass').click(function () {
        if ($('#btn-con').hasClass("show-div")) {
            $('#btn-con').removeClass("show-div");
            $('#btn-con').addClass("hide-div");
            $('#buy-pass').removeClass("hide-div");
            $('#buy-pass').addClass("show-div");
        } else {
            $('#buy-pass').removeClass("show-div");
            $('#btn-con').addClass("show-div");
            $('#buy-pass').addClass("hide-div");

        }
        ;
    });
    $('#gift').click(function () {
        if ($('#gift-message').hasClass("hide-div")) {
            $('#gift-message').removeClass("hide-div");
            $('#gift-message').addClass("show-div");
        } else {
            $('#gift-message').addClass("hide-div");
            $('#gift-message').removeClass("show-div");

        }
    });


});
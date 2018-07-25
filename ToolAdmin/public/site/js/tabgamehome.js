$(function () {
    var selectedClass = "";
    $(".tabbed ul li a").click(function () {
        $('.tabbed ul li a').removeClass('active');

        $(this).addClass('active');

        selectedClass = $(this).attr("data-rel");
        //$("#portfolio_device").fadeTo(100, 0.1);
        $("#owl-example .item a").not("." + selectedClass).fadeOut().removeClass('scale-anm');

        $("." + selectedClass).fadeIn().addClass('scale-anm');
        //$("#portfolio_device").fadeTo(300, 1);

    });

});
$('.owl-carousel').owlCarousel({
    margin: 20,
    // Peak to the next one
    stagePadding: 50,
    nav: true,
    slideBy: 2,
    dots: false,
    rewindSpeed: 500,
    navigation: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});
$("#owl-example a img").each(function (index) {
    $(this).click(function () {
        var hdnlogin = document.getElementById("<%=hdnlogin.ClientID%>");
        if (hdnlogin.value == "") {

            $('.popup-thongbao').css('display', "block");
            $("#lblPopupError").text('Bạn cần đăng nhập để chơi game');
        }

    });
});
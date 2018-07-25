

<meta charset="UTF-8">
<title>Ixeng - Cổng Game Bài Đổi Thưởng Tiền Thật</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, minimum-scale=0.3, user-scalable=no" />

<meta name="description" content="IXeng cổng game đổi thưởng tiền thật, Tích Xèng đổi VNĐ. Cổng game bài, chắn, phỏm, tài xỉu, tiến lên miền nam. Cổng game uy tín vĩnh viễn.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, minimum-scale=0.3, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/css/vinplay.css" type="text/css">
<link rel="stylesheet" href="<?php echo public_url() ?>/site/css/slick.css" type="text/css">
<link rel="stylesheet" href="<?php echo public_url() ?>/site/css/slick-theme.css" type="text/css">
<!-- End CSS -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="<?php echo public_url() ?>/site/js/underscore-min.js"></script>
<script src="<?php echo public_url() ?>/js/validate.js"></script>

<script src="<?php echo public_url() ?>/js/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4
        });
        $(".tabs-menu a").click(function(event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    });

</script>

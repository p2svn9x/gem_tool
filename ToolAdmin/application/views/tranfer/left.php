
<div id="leftSide" style="padding-top:30px;">
    <!-- Account panel -->
    <div class="sideProfile">
        <a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin') ?>/images/user.png"
                                                      width="40"></a>
<!--        --><?php //if (isset($admin_info)) : ?>
<!---->
<!--            <span>Xin chào: <strong>--><?php //echo $admin_info->UserName; ?><!--</strong></span>-->
<!--        --><?php //endif; ?>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <div class="gw-sidebar">
        <div id="gw-sidebar" class="gw-sidebar">
            <div class="nano-content">
                <ul class="gw-nav gw-nav-list">
                    <li> <a href="<?php echo tranfer_url("")?>"> <span class="gw-menu-text">Trang chủ</span> </a> </li>
                    <li>
                        <a href="<?php echo tranfer_url("setcau")?>">Set cầu tài xỉu</a>
                    </li>
                    <li>
                        <a href="<?php echo tranfer_url("soicau")?>">Soi cầu tài xỉu</a>
                    </li>
                    <li>
                        <a href="<?php echo tranfer_url("congtien")?>">Cộng tiền tài khoản</a>
                    </li>
                    <li>
                        <a href="<?php echo tranfer_url("logaction")?>">Log hành động admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<script>
    jQuery(function ($) {
        $("ul a").click(function(e) {
            var link = $(this);
            var item = link.parent("li");
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }
            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                console.log(href);
                link.attr("href", "#");
                setTimeout(function () {
                    link.attr("href", href);
                }, 100);
                e.preventDefault();
            }
        })
            .each(function() {
                var link = $(this);
                if (link.get(0).href === location.href) {
                    link.addClass("active").parents("li").addClass("active ");
                    return false;
                }
            });
    });
</script>
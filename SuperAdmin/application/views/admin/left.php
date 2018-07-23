<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo public_url("admin") ?>/dist/img/user2-160x160.jpg" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $admin_info->FullName ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo base_url() ?>">
                    <i class="fa fa-dashboard"></i><span>Trang chủ</span>
                </a>
            </li>
            <?php if (isset($admin_info)) :  ?>
                <?php echo $menu_list; ?>
            <?php endif; ?>
            

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script>
    jQuery(function ($) {
        $("ul a").click(function (e) {
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
                }, 3000);
                e.preventDefault();
            }
        })
            .each(function () {
                var link = $(this);
                if (link.get(0).href === location.href) {
                    link.addClass("active").parents("li").addClass("active ");
                    return false;
                }
            });
    });

</script>
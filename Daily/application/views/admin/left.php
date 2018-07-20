<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo public_url("admin") ?>/dist/img/user2-160x160.jpg" class="img-circle"
             alt="User Image">
    </div>
    <div class="pull-left info">
        <p><?php echo $admin_info->nickname ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>

<ul class="sidebar-menu">

<?php if ($admin_info->nickname == "tongdailymb" || $admin_info->nickname == "tongdailymn") : ?>
    <li>
        <a href="<?php echo base_url("agency/listdailymien") ?>">
            <i class="fa fa-dashboard"></i><span>Danh sách đại lý trực thuộc </span>
        </a>
    </li>
<?php else: ?>
    <li>
        <a href="<?php echo base_url("agency") ?>">
            <i class="fa fa-dashboard"></i><span>Danh sách đại lý trực thuộc</span>
        </a>
    </li>

<?php endif; ?>





<?php if ($admin_info->status == "A"): ?>
    <li>
        <a href="<?php echo base_url('agency/listnoactive') ?>">
            <i class="fa fa-dashboard"></i><span>Đại lý ngừng hoạt động</span>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('agency/add') ?>">
            <i class="fa fa-dashboard"></i><span>Thêm mới đại lý cấp 1</span>
        </a>
    </li>
<?php endif; ?>
<?php if ($admin_info->status == "D"): ?>
    <?php if ($admin_info->nickname == "tongdailymb" || $admin_info->nickname == "tongdailymn") : ?>
    <?php else: ?>
        <li>
            <a href="<?php echo base_url('agency/listnoactive') ?>">
                <i class="fa fa-dashboard"></i><span>Đại lý ngừng hoạt động</span>
            </a>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo base_url('agency/editinfo') ?>">
            <i class="fa fa-dashboard"></i> <span>Cập nhật thông tin</span>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('agency/tranfermoney') ?>">
            <i class="fa fa-dashboard"></i> <span>Chuyển Vin</span>
        </a>
    </li>
<?php endif; ?>
<li>
    <a href="<?php echo base_url('agency/doanhso') ?>">
        <i class="fa fa-dashboard"></i> <span>Doanh số</span>
    </a>
</li>
<li>
    <a href="<?php echo base_url('agency/topdoanhso') ?>">
        <i class="fa fa-dashboard"></i> <span>Top doanh số liên minh</span>
    </a>
</li>

<?php if ($admin_info->nickname == "tongdailymb") : ?>
    <li>
        <a href="<?php echo base_url('agency/toplienminhmien') ?>">
            <i class="fa fa-dashboard"></i> <span>Top liên minh miền bắc</span>
        </a>
    </li>
<?php elseif ($admin_info->nickname == "tongdailymn"): ?>
    <li>
        <a href="<?php echo base_url('agency/toplienminhmien') ?>">
            <i class="fa fa-dashboard"></i> <span>Top liên minh miền nam</span>
        </a>
    </li>
    <?php elseif($admin_info->status == "A"): ?>
    <li>
        <a href="<?php echo base_url('agency/toplienminh2mien') ?>">
            <i class="fa fa-dashboard"></i> <span>Top liên minh 2 miền</span>
        </a>
    </li>
<?php endif; ?>


<?php //if ($admin_info->nickname == "tongdailymb" || $admin_info->nickname == "tongdailymn") : ?>
<?php //else: ?>
<!--    <li>-->
<!--        <a href="--><?php //echo base_url('agency/topdscap2') ?><!--">-->
<!--            <i class="fa fa-dashboard"></i> <span>Top doanh số cấp 2</span>-->
<!--        </a>-->
<!--    </li>-->
<?php //endif; ?>
<li>
    <a href="<?php echo base_url('agency/topdoanhsoban') ?>">
        <i class="fa fa-dashboard"></i> <span>Top doanh số bán</span>
    </a>
</li>
<?php if ($admin_info->nickname == "tongdailymb") : ?>
    <li>
        <a href="<?php echo base_url('agency/topdoanhsobanmien') ?>">
            <i class="fa fa-dashboard"></i> <span>Top doanh số bán miền bắc</span>
        </a>
    </li>
<?php elseif ($admin_info->nickname == "tongdailymn"): ?>
    <li>
        <a href="<?php echo base_url('agency/topdoanhsobanmien') ?>">
            <i class="fa fa-dashboard"></i> <span>Top doanh số bán miền nam</span>
        </a>
    </li>

<?php
elseif ($admin_info->status == "A"): ?>
    <li>
        <a href="<?php echo base_url('agency/topdsban2mien') ?>">
            <i class="fa fa-dashboard"></i> <span>Top doanh số bán 2 miền</span>
        </a>
    </li>
<?php endif; ?>
<!--<li>
                <a href="<?php echo base_url('agency/topdoanhsocap2') ?>">
                    <i class="fa fa-dashboard"></i> <span>Top doanh số cấp 2 trực thuộc</span>
                </a>
            </li>-->
<li>
    <a href="<?php echo base_url('agency/listtranfer') ?>">
        <i class="fa fa-dashboard"></i><span>Mua vin đại lý</span>
    </a>
</li>
<li>
    <a href="<?php echo base_url('agency/listtranfersellvin') ?>">
        <i class="fa fa-dashboard"></i><span>Bán vin đại lý</span>
    </a>
</li>
<!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Doanh số</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("agency/doanhso") ?>"><i class="fa fa-circle-o"></i> Top doanh số cấp 1</a></li>
                    <li><a href="<?php echo base_url("agency/topdscap2") ?>"><i class="fa fa-circle-o"></i> Top tổng doanh số cấp 2</a></li>
                    
                </ul>
            </li>-->
<?php if ($admin_info->nickname == "tongdailymb" || $admin_info->nickname == "tongdailymn") : ?>
<?php else: ?>
    <li>
        <a href="<?php echo base_url('freeze') ?>">
            <i class="fa fa-dashboard"></i><span>Đóng băng</span>
        </a>
    </li>
<?php endif; ?>
<?php if ($admin_info->status == "A"): ?>
    <li>
        <a href="<?php echo base_url('user/transaction') ?>">
            <i class="fa fa-dashboard"></i><span>Lịch sủ giao dịch trong game</span>
        </a>
    </li>
<?php endif; ?>
<?php if ($admin_info->status == "D"): ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Giftcode</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url("agency/addgiftcode") ?>"><i class="fa fa-circle-o"></i> Xuất
                    giftcode</a></li>
            <li><a href="<?php echo base_url("agency/giftcode") ?>"><i class="fa fa-circle-o"></i> Danh sách
                    giftcode</a></li>
            <li><a href="<?php echo base_url("agency/giftcodeuse") ?>"><i class="fa fa-circle-o"></i> Thông
                    kê giftcode trong kho</a></li>
            <li><a href="<?php echo base_url("agency/usergiftcode") ?>"><i class="fa fa-circle-o"></i> Tài
                    khoản sử dụng giftcode</a></li>
            <li><a href="<?php echo base_url("agency/nicknameusegiftcode") ?>"><i
                        class="fa fa-circle-o"></i> Thống kê giftcode đã dùng</a></li>
        </ul>
    </li>

    <!-- <li class="treeview">
                   <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Lịch sử giao dịch trong game </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                   <ul class="treeview-menu">
                       <li><a href="<?php echo base_url("user/transactionagent") ?>"><i class="fa fa-circle-o"></i> Đại lý</a></li>
                       <li><a href="<?php echo base_url("user/transaction") ?>"><i class="fa fa-circle-o"></i> Tài khoản</a></li>            
					   </ul>
               </li> -->
<?php endif; ?>
<?php if ($admin_info->nickname == "tongdaily") : ?>
    <li>
        <a href="<?php echo base_url('user/transactiontongdaily') ?>">
            <i class="fa fa-dashboard"></i><span>Lịch sủ giao dịch tổng đại lý</span>
        </a>
    </li>
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
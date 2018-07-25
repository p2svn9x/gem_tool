<header class="main-header">
    <div class="container">
        <div id="header">
            <h1 id="logo">
                <a href="<?php echo news_url() ?>"><img src="<?php echo public_url() ?>/news/images/logo.png" alt=""></a>
            </h1><!-- END #logo -->
            <div class="widget-header">
            </div>
            <div class="userbox">
                <p class="avatartop">
                    <img src="http://profile.rikvip.com/Content/img_ava/16.png">
                </p>
                <p id="nicknamevip" data-min="" style="font-weight:bold;font-size:13px">    </p>
                <p title="Số dư Rik"><img src="<?php echo public_url() ?>/news/images/vin-ic.png" class="ic-user"><span class="rik-text" id="vin-balance"></span></p>
                <p title="VipPoint"><img src="<?php echo public_url() ?>/news/images/dm-ic.png" class="ic-user-vip"><span class="vp-text"></span></p>


            </div>

            <div class="loginbox1" style="top: 26px;right: -171px;">
                <a  href="javascript:void(0)" class="logout" >Đăng xuất</a>
            </div>
            <div class="loginbox">
                <a href="<?php echo news_url('login') ?>" class="login">Đăng nhập</a>
                <a href="">Đăng ký</a>
            </div>
        </div>

        <!--#header-->
        <div class="secondary-navigation">
            <nav id="navigation">
                <ul id="menu-top-menu" class="menu sf-js-enabled">
                    <li id="menu-item-7"
                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-7">
                        <a title="RikVip.net" href="<?php echo news_url() ?>">Trang chủ</a></li>
                    <?php foreach($catalog_list as $row): ?>
                    <li id="menu-item-42"
                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-42"><a
                            href="<?php echo news_url('category/'.$row->slug. '-'. $row->id.'.html') ?>"><?php echo $row->name ?></a></li>
                        <?php endforeach; ?>
                </ul>
        </div>
    </div>
    <!--.container-->
</header>
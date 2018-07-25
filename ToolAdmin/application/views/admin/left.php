
<div id="leftSide" style="padding-top:30px;">
    <!-- Account panel -->
    <div class="sideProfile">
        <a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin') ?>/images/user.png"
                                                      width="40"></a>
        <?php if (isset($admin_info)) : ?>

            <span>Xin chào: <strong><?php echo $admin_info->UserName; ?></strong></span>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
    <div class="gw-sidebar">
        <div id="gw-sidebar" class="gw-sidebar">
            <div class="nano-content">
                <ul class="gw-nav gw-nav-list">
                    <li <?php if($actual_link ==  admin_url("") ){echo "class='active'";}else{echo "class='init-un-active'";} ?>> <a href="<?php echo admin_url("")?>"> <span class="gw-menu-text">Trang chủ</span> </a> </li>
                    <?php if (isset($admin_info)) :  ?>
                    <?php echo $menu_list; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>


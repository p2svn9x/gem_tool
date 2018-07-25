<div class="topNav">
	<div class="wrapper">
		<div class="welcome">

		</div>

		<div class="userNav">
			<ul>
                <li class="iconmenu"><a>
                        <img src="<?php echo public_url('admin/images/menuicon.png') ?>">
                    </a></li>
				<li><a target="_blank" href="<?php echo base_url('admin')?>">
					<img src="<?php echo public_url('admin')?>/images/icons/light/home.png" style="margin-top:7px;">
					<span>Trang chủ</span>
				</a></li>

				<!-- Logout -->
				<li><a href="<?php echo admin_url('admin/logout')?>">
					<img alt="" src="<?php echo public_url('admin')?>/images/icons/topnav/logout.png">
					<span>Đăng xuất</span>
				</a></li>

			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>
<script>
    $(function() {
        var menuVisible = false;
        $('.iconmenu').click(function() {
            if (menuVisible) {
                $('#left_content').css({'display':'none'});
                menuVisible = false;
                return;
            }
            $('#left_content').css({'display':'block'});
            menuVisible = true;
        });
        $('.iconmenu').click(function() {
            $(this).css({'display':'none'});
            menuVisible = false;
        });
    });

</script>
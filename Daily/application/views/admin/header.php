<header class="main-header">
<!-- Logo -->
<a href="<?php echo base_url('') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>DL</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Đại lý</b>&nbsp;&nbsp;&nbsp;XengClub</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 <span  class="user-image" style="margin-right: 10px;width: 75px;">VP :<?php echo number_format($vippoint)?></span>
          <span id="vippointsave" class="user-image" style="width: 75px"></span>
  
        <img src="<?php echo public_url('admin/images/vin.png')?>" class="user-image"><span  class="user-image" style="margin-right: 100px;"><?php echo number_format($vin)?></span>

        <img src="<?php echo public_url("admin")?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

        <span class="hidden-xs"><?php echo $admin_info->nickname ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?php echo public_url("admin")?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
                <?php echo $admin_info->nickname ?>
            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-right">
                <a href="<?php echo base_url('user/logout')?>" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
<!-- Control Sidebar Toggle Button -->

</ul>
</div>
</nav>
</header>
 <input type="hidden" id="hndvippointsave" name="hndvippointsave" value="<?php echo $vippointsave ?>">
<script>
    $(document).ready(function(){
        $("#vippointsave").text(bacVippoint($("#hndvippointsave").val()));
    });
    function bacVippoint(strVip){
        var strresult;
        if(strVip>=0 && strVip <= 80){
            strresult = "Đá";
        }else if(strVip>80 && strVip <= 800){
            strresult = "Đồng";
        }else if(strVip>800 && strVip <= 5000){
            strresult = "Bạc";
        }else if(strVip>4500 && strVip <= 8600){
            strresult = "Vàng";
        }else if(strVip>8600 && strVip <= 12000){
            strresult = "Bạch Kim 1";
        }else if(strVip>12000 && strVip <= 50000){
            strresult = "Bạch Kim 2";
        }else if(strVip>50000 && strVip <= 100000){
            strresult = "Kim Cương 1";
        }else if(strVip>100000 && strVip <= 2000000){
            strresult = "Kim Cương 2";
        }
        else if(strVip>=200000){
            strresult = "Kim Cương 3";
        }
        return strresult;
    }
</script>

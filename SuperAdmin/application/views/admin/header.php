<header class="main-header">
<!-- Logo -->
<a href="<?php echo base_url('') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>A</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Super</b>&nbsp;&nbsp;&nbsp;Admin</span>
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
        <img src="<?php echo public_url("admin")?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $admin_info->FullName ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?php echo public_url("admin")?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
                <?php echo $admin_info->FullName ?>
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
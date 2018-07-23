<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SuperAdmin GemClub</title>

<meta name="robots" content="noindex, nofollow" />

<link rel="shortcut icon" href="<?php echo public_url('admin')?>/images/icon.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo public_url('admin')?>/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo public_url('admin')?>/dist/css/ajax/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/plugins/datepicker/bootstrap-datetimepicker.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/dist/css/simplePagination.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/dist/css/colorbox.css">
<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo public_url('admin')?>/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo public_url('admin') ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo public_url('admin')?>/plugins/raphael-min.js"></script>

<!-- Sparkline -->
<script src="<?php echo public_url('admin') ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo public_url('admin') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo public_url('admin') ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo public_url('admin') ?>/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo public_url('admin')?>/plugins/datepicker/moment.js"></script>

<script src="<?php echo public_url('admin') ?>/plugins/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo public_url('admin') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo public_url('admin') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo public_url('admin') ?>/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.twbsPagination.js"></script>
<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.simplePagination.js"></script>
<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.colorbox.js"></script>
<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.table2excel.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo public_url('admin') ?>/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo public_url('admin') ?><!--/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo public_url('admin') ?>/dist/js/demo.js"></script>
<script src="<?php echo public_url('admin') ?>/plugins/ckeditor/ckeditor.js"></script>
<script>
    $('a.verify_action').click(function(){
        if(!confirm('Bạn chắc chắn muốn xóa ?'))
        {
            return false;
        }
    });
</script>
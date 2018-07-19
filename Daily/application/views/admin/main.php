<html>
<head>
    <?php $this->load->view('admin/head') ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('admin/header') ?>
    <?php $this->load->view('admin/left') ?>

    <!-- Content -->
    <div class="content-wrapper">
    <?php $this->load->view($temp, $this->data); ?>
        </div>
    <!-- End content -->

    <?php $this->load->view('admin/footer') ?>
</div>

</body>
</html>
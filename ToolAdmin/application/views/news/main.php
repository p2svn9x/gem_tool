<html>
<head>
    <?php $this->load->view('news/head') ?>
</head>

<body>
<?php $this->load->view('news/header') ?>
<div class="main-container">
    <div id="page">
        <div class="content">
            <article class="article">
                <?php $this->load->view($temp, $this->data); ?>
            </article>
            <aside class="sidebar c-4-12">

                <?php $this->load->view('news/sidebar') ?>

            </aside>
        </div>
    </div>
</div>
    <?php $this->load->view('news/footer') ?>
</body>
</html>
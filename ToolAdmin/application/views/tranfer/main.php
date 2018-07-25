<html>
    <head>
        <?php $this->load->view('tranfer/head')?>
    </head>
    
    <body>
          <div id="left_content">
                <?php $this->load->view('tranfer/left')?>
          </div>

          <div id="rightSide">
                 <?php $this->load->view('tranfer/header')?>
                 
                 <!-- Content -->
                 <?php  $this->load->view($temp, $this->data);?>
                 <!-- End content -->
                 
                 <?php $this->load->view('tranfer/footer')?>
          </div>
          <div class="clear"></div>
          
    </body>
</html>
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Soi cầu</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Soi cầu tài xỉu</h6>
            <div class="num f12">Tổng xiu: <b><?php echo (2000 - $couttai) ?></b></div>
            <div class="num f12">Tổng tài: <b><?php echo $couttai ?></b></div>
        </div>
        <div class="formRow">
           <span class="oneTwo" style="width: 100%;line-height: 5px">
                   <?php foreach($list as $row): ?>
                       <?php if($row->result == 0) :?>
                   <?php echo "<img style=\"width:25px\" src=\"../public/admin/images/sp_xiu.png\" title=\"Xỉu\">" ?>
                           <?php elseif($row->result == 1):?>
                           <?php echo "<img style=\"width:25px\" src=\"../public/admin/images/sp_tai.png\" title=\"Tài\">" ?>
                               <?php endif; ?>
                   <?php endforeach;?>

           </span>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear mt30"></div>

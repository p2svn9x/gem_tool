<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
<section class="content-header">
    <h1>
        Soi cầu tài xỉu
    </h1>
    <label class="pull-right">Tổng xiu: <b style="color: red"><?php echo (2000 - $couttai) ?></b></label>
    <label class="pull-right">Tổng tài: <b style="color: red ;margin-right: 20px;"><?php echo $couttai ?></b></label>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
					<form action="<?php echo base_url('soicau') ?>" method="post">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-1 col-sm-12 col-xs-12 control-label">Từ ngày:</label>

                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate" name="fromDate"
                                               value="<?php echo $this->input->post('fromDate')?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-md-1 col-sm-12 col-xs-12 control-label">Đến ngày:</label>

                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate" name="toDate"
                                               value="<?php echo $this->input->post('toDate') ?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>

                                <div class="col-md-1 col-sm-12 col-xs-12"><input type="submit" value="Tìm kiếm"
                                                                                 name="submit"
                                                                                 class="btn btn-primary pull-right"
                                                                                 id="search_tran"></div>

                            </div>
                        </div>
                    </form>
                   <span  style="width: 100%;line-height: 5px">
                   <?php foreach($list as $row): ?>
                       <?php if($row->result == 0) :?>
                           <img src="<?php echo public_url('admin/images/sp_xiu.png') ?>" style="width:25px" title="Xỉu">
                       <?php elseif($row->result == 1):?>
                           <img src="<?php echo public_url('admin/images/sp_tai.png') ?>" style="width:25px" title="Tài">
                       <?php endif; ?>
                   <?php endforeach;?>
                    </span>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<script>

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>


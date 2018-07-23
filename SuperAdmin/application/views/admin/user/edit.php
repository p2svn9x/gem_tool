<section class="content-header">
    <h1>
      Cập nhật người dùng
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                    <fieldset
                    <div class="box-body">
                        <div class="form-group ">
                            <div class="row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập:</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly class="form-control" name="username" value="<?php echo $info->username ?>">
                                </div>
                                <div class="col-sm-4"><label class="control-label" for="inputError" style="color: #ff0000"><?php echo form_error('username')?></label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Mật khẩu:</label>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="col-sm-4"><label class="control-label" for="inputError" style="color: #ff0000"><?php echo form_error('password')?></label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Nhập lại mật khẩu:</label>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" name="repassword">
                                </div>
                                <div class="col-sm-4"><label class="control-label" for="inputError" style="color: #ff0000"><?php echo form_error('repassword')?></label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="email" value="<?php echo $info->email ?>">
                                </div>
                                <div class="col-sm-4"><label class="control-label" for="inputError" style="color: #ff0000"><?php echo form_error('email')?></label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Điện thoại:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $info->phone ?>">
                                </div>
                                <div class="col-sm-4"><label class="control-label" for="inputError" style="color: #ff0000"><?php echo form_error('phone')?></label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label">Địa chỉ:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="address" value="<?php echo $info->address ?>">
                                </div>
                                <div class="col-sm-4"><label class="control-label" for="inputError" style="color: #ff0000"><?php echo form_error('address')?></label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <input type="submit" value="Cập nhật" name="submit" class="btn btn-primary pull-left">
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</section>
<script>
</script>
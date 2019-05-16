<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Upload file cầu tài xỉu
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <label class="col-sm-4" style="color: red;word-break: break-all"
                                       id="errorcode"><?php echo $error; ?>
                                </label>
                            </div>
                        </div>
                        <form action="<?php echo base_url("setcau/uploadfiletaixiu") ?>" id="fileinfo" name="fileinfo"
                              enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <label class="col-sm-2 control-label" for="exampleInputEmail1">File cầu tài xỉu:</label>

                                    <div class="col-sm-2">
                                        <input type="file" id="userfile" name="filedat"
                                               value="<?php echo $this->input->post('filedat') ?>">
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="submit" class="btn btn-primary pull-left" id="upload"
                                               value="Upload"
                                               name="ok">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


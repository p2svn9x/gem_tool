<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
<section class="content-header">
    <h1>
       Thu hồi giftcode vận hành
    </h1>
</section>
    <input type="hidden" id="listgiftcode" value="<?php echo $listgc ?>">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <label class="col-sm-4" style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                            </label>
                        </div>
                    </div>
                    <form action="<?php echo base_url("giftcodevh/delgiftcodevh") ?>" id="fileinfo" name="fileinfo"
                          enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-2 control-label" for="exampleInputEmail1">Giftcode:</label>

                                <div class="col-sm-2">
                                    <input type="file" id="userfile" name="filexls"
                                           value="<?php echo $this->input->post('filexls') ?>">
                                </div>
                                <div class="col-sm-1">
                                    <input type="submit" class="btn btn-primary pull-left" id="upload" value="Upload"
                                           name="ok">

                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-2 control-label">Nguồn xuất:</label>
                            <div class="col-sm-2">
                                <select id="nguonxuat" class="form-control">
                                    <option value="">Chọn</option>
                                    <?php foreach($source as $row): ?>
                                        <option value="<?php echo $row->key ?>"><?php echo $row->name ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <label class="col-sm-2" id="errornx" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-2 control-label" for="exampleInputEmail1">Tiền</label>

                            <div class="col-sm-1">
                                <select class="form-control" id="money" name="money">
                                    <option value="1">Zik</option>
                                    <option value="0">Xu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label id="labelvin" class="col-sm-2 control-label">Mệnh giá</label>

                            <div class="col-sm-2" id="menhgiavin">
                                <select name="menhgiavin" class="form-control" id="roomvin">
                                    <?php foreach($listvin as $key => $row): ?>
                                        <option value="<?php echo $row ?>"><?php echo $row.",000 Zik" ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2" id="menhgiaxu" style="display: none">
                                <select name="menhgiaxu" class="form-control" id="roomxu">
                                    <?php foreach($listxu as $key => $row): ?>
                                        <option value="<?php echo $row ?>"><?php echo $row.",000,000 Xu" ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-2 control-label">Đợt phát hành:</label>

                            <div class="col-sm-2">
                                <select id="phathanh" class="form-control">
                                    <option value="">Chọn</option>
                                    <?php foreach($listversion as $key => $row): ?>
                                        <option value="<?php echo $row ?>">Đợt <?php echo $row ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label class="col-sm-2" id="errorph" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-1"><input type="button" value="Thu hồi" name="submit"
                                                         class="btn btn-primary pull-left" id="search_tran"></div>

                        </div>
                    </div>
                    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <p style="color: #0000ff">Bạn thu hồi giftcode thành công</p>
                                </div>
                                <div class="modal-footer">
                                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<style>.spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>


<script>
    $("#search_tran").click(function () {
        if($("#nguonxuat").val() == ""){
            $("#errocode").html("Bạn chưa chọn nguồn xuất");
            return false;
        }
        if($("#phathanh").val() == ""){
            $("#errocode").html("Bạn chưa chọn đợt phát hành");
            return false;
        }
        if ($("#listgiftcode").val()== "" ) {
            $("#errocode").html("Không tồn tại file hoặc key Giftcode viết sai");
        } else {
            $("#spinner").show();

            if ($("#money").val() == 1) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('giftcodevh/delgiftcodevhajax')?>",
                    data: {
                        giftcode: $("#listgiftcode").val(),
                        nguonxuat: $("#nguonxuat").val(),
                        roomvin: $("#roomvin").val(),
                        phathanh: $("#phathanh").val(),
                        money: $("#money").val()
                    },
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $("#spinner").hide();
                        if (res.errorCode == 0) {
                            $("#bsModal3").modal("show");
                            $("#errocode").html("");
                        } else if (res.errorCode == 10001) {
                            $("#errocode").html("Nhưng giftcode sau không tồn tại hoặc đã sử dụng  " + res.giftCode + "  vui lòng upload lại file");
                        }
                    }, error: function () {
                        $("#spinner").hide();
                        $("#errocode").html("Bạn chưa thu hồi được giftcode");
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('giftcodevh/delgiftcodevhajax')?>",
                    data: {
                        giftcode: $("#listgiftcode").val(),
                        nguonxuat: $("#nguonxuat").val(),
                        roomxu: $("#roomxu").val(),
                        phathanh: $("#phathanh").val(),
                        money: $("#money").val()
                    },
                    dataType: 'json',
                    success: function (res) {
                        $("#spinner").hide();
                        if (res.errorCode == 0) {
                            $("#bsModal3").modal("show");
                            $("#errocode").html("");
                        } else if (res.errorCode == 10001) {
                            $("#errocode").html("Nhưng giftcode sau không tồn tại hoặc đã sử dụng  " + res.giftCode + "  vui lòng upload lại file");
                        }

                    }, error: function () {
                        $("#spinner").hide();
                        $("#errocode").html("Bạn chưa thu hồi được giftcode");
                    }
                });
            }
        }

    });
    $(document).ready(function () {

        $('#money').change(function () {
            var val = $("#money option:selected").val();
            if (val == 1) {
                $("#labelvin").css("display", "block");
                $("#menhgiavin").css("display", "block");
                $("#menhgiaxu").css("display", "none");
            } else if (val == 0) {
                $("#menhgiaxu").css("display", "block");
                $("#labelvin").css("display", "block");
                $("#menhgiavin").css("display", "none");
            }
        });
    });
</script>

<section class="content-header">
    <h1>
        Cồng tiền marketing
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?php if ($this->input->post('ok')): ?>
                        <?php if (isset($succes)) : ?>
                            <div class="form-group successful">
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <label class="control-label col-sm-2" id="successgift"
                                           style="color: #00a65a"><?php echo $succes; ?></label>
                                </div>
                            </div>
                        <?php elseif (isset($error)) : ?>
                            <div class="form-group successful">
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <label class="control-label col-sm-3" id="errorgift"
                                           style="color: red"><?php echo $error; ?></label>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="form-group successful">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <label class="control-label col-sm-3" id="successgift1" style="color: 00a65a"></label>
                        </div>
                    </div>
                    <div class="form-group successful">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <label class="control-label col-sm-3" id="errogift1" style="color: red"></label>
                        </div>
                    </div>
                    <form action="<?php echo base_url("giftcode/marketingaddmoney") ?>" id="fileinfo" name="fileinfo"
                          enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label" for="exampleInputEmail1">Tài khoản:</label>

                                <div class="col-sm-2">
                                    <input type="file" id="userfile" name="filexls"
                                           value="<?php echo $this->input->get('filexls') ?>">
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
                            <label class="col-sm-1 control-label" for="exampleInputEmail1">Tiền</label>

                            <div class="col-sm-1">
                                <select class="form-control" id="money" name="money">
                                    <option value="1">Vin</option>
                                    <option value="0">Xu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label id="labelvin" class="col-sm-1 control-label">Mệnh giá</label>

                            <div class="col-sm-2" id="menhgiavin">
                                <select name="menhgiavin" class="form-control" id="roomvin">
                                    <option value="10000">10,000 Vin</option>
                                    <option value="20000">20,000 Vin</option>
                                    <option value="50000">50,000 Vin</option>
                                    <option value="100000">100,000 Vin</option>
                                </select>
                            </div>
                            <div class="col-sm-2" id="menhgiaxu" style="display: none">
                                <select name="menhgiaxu" class="form-control" id="roomxu">
                                    <option value="1000000">1,000,000 Xu</option>
                                    <option value="3000000">3,000,000 Xu</option>
                                    <option value="5000000">5,000,000 Xu</option>
                                    <option value="9000000">9,000,000 Xu</option>
                                    <option value="10000000">10,000,000 Xu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-1"><input type="submit" value="Cộng tiền" name="submit"
                                                         class="btn btn-primary pull-left" id="search_tran"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
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
    $(".successful").click(function () {
        $(".successful").hide();
    });
    $("#search_tran").click(function () {
        $("#successgift").css("display", "none");
        $("#error").css("display", "none");
        $.ajax({
            url: "<?php echo base_url("giftcode/upload") ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                    $.each(data, function (index, value) {

                        if (value.dup == 1) {
                            $("#errogift1").html("Tài khoản:   " + value.nickname + "  trùng vui lòng upload lại file");
                            return false;
                        } else if (value.dup == 0) {
                            if ($("#money").val() == 1) {

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $linkapi ?>",
                                    data: {
                                        c: 310,
                                        nn: value.nickname,
                                        vin: $("#roomvin").val(),
                                        xu: 0
                                    },
                                    dataType: 'json',
                                    success: function (result) {

                                        if (result.errorCode == 10001) {
                                            $("#errogift1").html("Tài khoản  " + result.message + "   không tồn tại vui lòng upload lại file");
                                        } else if (result.errorCode == 0) {
                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo base_url("giftcode/maradd") ?>",
                                                data: {
                                                    nickname: value.nickname,
                                                    money: $("#roomvin").val(),
                                                    type: "Vin"
                                                },
                                                dataType: 'json'
                                            });

                                            $("#successgift1").html("Cộng tiền thành công");
                                        }
                                    }
                                });
                            } else {

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $linkapi ?>",
                                    data: {
                                        c: 310,
                                        nn: value.nickname,
                                        vin: 0,
                                        xu: $("#roomxu").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {

                                        if (result.errorCode == 10001) {
                                            $("#errogift1").html("Tài khoản  " + result.message + "   không tồn tại vui lòng upload lại file");
                                        }
                                        else if (result.errorCode == 0) {
                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo base_url("giftcode/maradd") ?>",
                                                data: {
                                                    nickname: value.nickname,
                                                    money: $("#roomxu").val(),
                                                    type: "Xu"
                                                },
                                                dataType: 'json'
                                            });
                                            $("#successgift1").html("Cộng tiền thành công");
                                        }

                                    }
                                });
                            }

                         } else if(value.dup == 2){
                            $("#errogift1").html("Không tồn tại file vui lòng upload file");
                        }
                    });


            }
        });
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

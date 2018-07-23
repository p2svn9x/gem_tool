<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
<section class="content-header">
    <h1>
        Xuất giftcode cho đại lý
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group successful">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <label class="control-label col-sm-2" id="successgift" style="color: #00a65a"></label>
                        </div>
                    </div>
                    <div class="form-group successful">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <label class="control-label col-sm-4" id="errorgift" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-1 control-label" for="exampleInputEmail1">Giftcode</label>

                            <div class="col-sm-2">
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
                            <label id="labelvin" class="col-sm-1 control-label">Mệnh giá</label>

                            <div class="col-sm-2" id="menhgiavin">
                                <select name="menhgiavin" class="form-control" id="roomvin">
                                    <option value="10">10K Zik</option>
                                    <option value="20">20K Zik</option>
                                    <option value="50">50K Zik</option>
                                    <option value="100">100K Zik</option>
                                </select>
                            </div>
                            <div class="col-sm-2" id="menhgiaxu" style="display: none">
                                <select name="menhgiaxu" class="form-control" id="roomxu">
                                    <option value="3">3M xu</option>
                                    <option value="5">5M xu</option>
                                    <option value="9">9M xu</option>
                                    <option value="10">10M xu</option>
                                </select>
                            </div>
                            <label id="errormg" style="color:red " class="col-sm-2"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-1 control-label">Số lượng:</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="soluong">
                            </div>
                            <label class="col-sm-2" id="errorsl" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-1 control-label">Nguồn xuất:</label>
                            <div class="col-sm-2">
                                <select id="nguonxuat" class="form-control">
                                    <option value="">Chọn</option>
                                    <?php foreach ($list as $row): ?>
                                        <option value="<?php echo $row->key ?>"><?php echo $row->nickname ?></option>
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
                            <label class="col-sm-1 control-label">Đợt phát hành:</label>

                            <div class="col-sm-2">
                                <select id="phathanh" class="form-control">
                                    <option value="">Chọn</option>
                                    <option value="1">Đợt 1</option>
                                </select>
                            </div>
                            <label class="col-sm-2" id="errorph" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-1"><input type="submit" value="Thêm giftcode" name="submit"
                                                         class="btn btn-primary pull-left" id="search_tran"></div>
                            <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                         class="btn btn-primary pull-left" id="reset"
                                                         onclick="window.location.href = '<?php echo base_url('giftcode/add') ?>'; ">
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

    $(".successful").click(function () {
        $(".successful").hide();
    });
    $("#search_tran").click(function () {
        var account = $("#nguonxuat option:selected").text();
        if ($("#soluong").val() == "") {
            $("#errorsl").html("Bạn phải nhập số lượng giftcode");
            $("#errornx").html("");
            $("#errorph").html("");
            return false;
        } else if ($("#nguonxuat").val() == "") {
            $("#errornx").html("Bạn phải chọn nguồn xuất giftcode");
            $("#errorsl").html("");
            $("#errorph").html("");
            return false;
        } else if ($("#phathanh").val() == "") {
            $("#errorph").html("Bạn phải chọn đợt phát hành giftcode");
            $("#errorsl").html("");
            $("#errornx").html("");
            return false;
        }
        if ($("#money").val() == 1) {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('giftcode/addajax') ?>",
                data: {
                    money: $("#roomvin").val(),
                    quantity: $("#soluong").val(),
                    source: $("#nguonxuat").val(),
                    version: $("#phathanh").val(),
                    moneytype: $("#money").val(),
                    nickname : account
                },
                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
                    if (result == 1) {
                        $("#successgift").html("Bạn xuất giftcode thành công");
                        $("#errorgift").html("");
                    } else if (result = 2) {
                        $("#errorgift").html("Bạn nhập số lượng giftcode lớn hơn trong kho hoăc mệnh giá không tồn tại");
                        $("#successgift").html("");
                    }
                    $("#errorsl").html("");
                    $("#errornx").html("");
                    $("#errorph").html("");
                }
            })
        } else if ($("#money").val() == 0) {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('giftcode/addajax') ?>",
                data: {
                    money: $("#roomxu").val(),
                    quantity: $("#soluong").val(),
                    source: $("#nguonxuat").val(),
                    version: $("#phathanh").val(),
                    moneytype: $("#money").val(),
                    nickname : account
                },
                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
                    if (result == 1) {
                        $("#successgift").html("Bạn xuất giftcode thành công");
                        $("#errorgift").html("");
                    } else if (result = 2) {
                        $("#errorgift").html("Bạn nhập số lượng giftcode lớn hơn trong kho hoăc mệnh giá không tồn tại");
                        $("#successgift").html("");
                    }
                    $("#errorsl").html("");
                    $("#errornx").html("");
                    $("#errorph").html("");
                }
            })
        }
    });


    $(document).ready(function () {
        $("#soluong").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

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

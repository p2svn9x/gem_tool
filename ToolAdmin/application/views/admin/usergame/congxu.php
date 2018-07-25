<?php $this->load->view('admin/usergame/head', $this->data) ?>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
         <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
        <div class="widget">
            <div class="title">
                <h6>Cộng trừ xu </h6>
            </div>
            <form class="list_filter form" action="" method="">
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4"><label id="errorname" style="color: red;"></label></div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-2"><label>Nickname</label></div>
                        <div class="col-sm-2"><input class="form-control" id="filter_iname" placeholder="Nhập nick name" type="text"></div>

                    </div>

                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2"><label>Tiền xu</label></div>
                        <div class="col-sm-2"><input class="form-control" id="txtmoney" placeholder="Nhập số tiền xu " type="text"></div>
                        <label id="numchuyen" style="color: blueviolet"></label>
                    </div>

                </div>

                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2"><label>Lý do</label></div>
                        <div class="col-sm-2"><input class="form-control" id="txtreason"  type="text" placeholder="Nhập lý do"></div>

                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2"><label>Mã otp</label></div>
                        <div class="col-sm-1"><input class="form-control" id="txtotp"  type="text" placeholder="Nhập OTP"></div>
                        <div class="col-sm-1">
                            <select id="txttypeotp">
                                <option value="0">SMS OTP</option>
                                <option value="1">APP OTP</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-1">
                            <input type="button" id="congxu" value="Công xu" class="button blueB">
                        </div>
                        <div class="col-sm-1">
                            <input type="button" id="truxu" value="Trừ xu" class="button blueB">
                        </div>
                    </div>
                </div>
            </form>
            <div class="formRow"></div>
            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <p style="color: #0000ff">Bạn cộng xu thành công</p>
                        </div>
                        <div class="modal-footer">
                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                   aria-hidden="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="bsModal4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <p style="color: #0000ff">Bạn trừ xu thành công</p>
                        </div>
                        <div class="modal-footer">
                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                   aria-hidden="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
</div>
<script>
    $("#congxu").click(function () {
        if($("#filter_iname").val() == ""){
            $("#errorname").html("Bạn chưa nhập nick name");
            return false;
        }
        if($("#txtmoney").val() == ""){
            $("#errorname").html("Bạn chưa nhập số tiền");
            return false;
        }
        if($("#txtmoney").val() > 50000000000){
            $("#errorname").html("Số xu bạn chuyển không được lớn hơn 50.000.000 xu");
            return false;
        }
        if($("#txtreason").val() == ""){
            $("#errorname").html("Bạn chưa nhập lý do");
            return false;
        }
        if($("#txtotp").val() == ""){
            $("#errorname").html("Bạn chưa nhập OTP");
            return false;
        }


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/congxuajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                money : $("#txtmoney").val(),
                reason : $("#txtreason").val(),
                otp : $("#txtotp").val(),
                typeotp : $("#txttypeotp").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if(result == 1){
                    $("#errorname").html("");
                    $("#filter_iname").val("");
                    $("#txtmoney").val("");
                    $("#txtreason").val("");
                    $("#txtotp").val("");
                    $("#numchuyen").html("");
                    $("#bsModal3").modal("show");
                }else if(result == 2){
                    $("#errorname").html("Bạn chuyển xu thất bại");
                }else if(result == 4){
                    $("#errorname").html("OTP sai");
                }else if(result == 5){
                    $("#errorname").html("OTP hết hạn");
                }
                else if(result == 3){
                    $("#errorname").html("Nick name không đủ tiền");
                }
                else if(result == 6){
                    $("#errorname").html("Nick name không tồn tại");
                }
            }
        });
    });
    $("#truxu").click(function () {
        if($("#filter_iname").val() == ""){
            $("#errorname").html("Bạn chưa nhập nick name");
            return false;
        }
        if($("#txtmoney").val() == ""){
            $("#errorname").html("Bạn chưa nhập số tiền");
            return false;
        }
        if($("#txtreason").val() == ""){
            $("#errorname").html("Bạn chưa nhập lý do");
            return false;
        }
        if($("#txtotp").val() == ""){
            $("#errorname").html("Bạn chưa nhập OTP");
            return false;
        }


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/truxuajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                money : -$("#txtmoney").val(),
                reason : $("#txtreason").val(),
                otp : $("#txtotp").val(),
                typeotp : $("#txttypeotp").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if(result == 1){
                    $("#errorname").html("");
                    $("#filter_iname").val("");
                    $("#txtmoney").val("");
                    $("#txtreason").val("");
                    $("#txtotp").val("");
                    $("#numchuyen").html("");
                    $("#bsModal4").modal("show");
                }else if(result == 2){
                    $("#errorname").html("Bạn chuyển xu thất bại");
                }else if(result == 4){
                    $("#errorname").html("OTP sai");
                }else if(result == 5){
                    $("#errorname").html("OTP hết hạn");
                }
                else if(result == 3){
                    $("#errorname").html("Nick name không đủ tiền");
                }
                else if(result == 6){
                    $("#errorname").html("Nick name không tồn tại");
                }
            }
        });
    });
    $(document).ready(function () {
        $("#txtmoney").keydown(function (e) {
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
    });
    var format = function(num){
        var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
        if(str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for(var j = 0, len = str.length; j < len; j++) {
            if(str[j] != ",") {
                output.push(str[j]);
                if(i%3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
    $("#txtmoney").keyup(function (e) {
        $(this).val(($(this).val()));
        $("#numchuyen").text(format($(this).val()));

    });
</script>

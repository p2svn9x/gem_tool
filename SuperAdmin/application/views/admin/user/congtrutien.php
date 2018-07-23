<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
<section class="content-header">
    <h1>
      Cộng trừ tiền
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <label class="col-sm-2  control-label" style="color: red" id="errorvin"></label>
                        </div>
                    </div>
					 <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-1 control-label">Hành động:</label>
                            <div class="col-sm-2">
                                <select  id="actionname" class="form-control" >
                                    <option value="Admin">Cộng trừ tiền Admin</option>
                                    <option value="EventVP">Trả Thưởng Vippoint Event</option>
                                    </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-1 control-label">Nick name:</label>
							  <input id="checknickname" type="hidden">
                            <div class="col-sm-2">
                                <input type="text" id="nickname" class="form-control" onblur="myFunction()">
                            </div>
							<label id="lblnickname" style="color: blueviolet"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-1 control-label">Số tiền:</label>

                            <div class="col-sm-2">
                                <input type="text" id="tienchuyen" class="form-control">
                            </div>
                            <label id="numchuyen" style="color: blueviolet"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-1 control-label">Loại tiền:</label>

                            <div class="col-sm-2">
                                <select id="money_type" class="form-control">
                                    <option value="vin">Vin</option>
                                    <option value="xu">Xu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-1 control-label">Lý do:</label>

                            <div class="col-sm-2">
                                <input type="text" id="reasonchuyen" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-1">
                                <input type="button" id="chuyentien"
                                       value="Cộng tiền" class="btn btn-primary pull-left">
                            </div>
                            <div class="col-sm-1">
                                <input type="button" id="trutien"
                                       value="Trừ tiền" class="btn btn-primary pull-left">
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content" style="width: 500px">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Nhập OTP</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-5"><input class="form-control" type="text" id="maotpcong"
                                                                     placeholder="Nhập OTP"></div>
                                        <div class="col-sm-4"><select class="form-control" id="otpselectcong">
                                                <option value="0">OTP SMS</option>
                                                <option value="1">OTP APP</option>
                                            </select></div>
                                        <div class="col-sm-3"><input type="button" class="btn btn-primary" value="Cộng tiền" id="congotp">
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 style="margin-right: 50px"><span style="color: #0000ff">SMS OTP:</span> Vui lòng soạn tin <span style="color: #0000ff">VIN OTP</span>
                                                gửi <span style="color: #0000ff">8079</span> để nhận mã xác thực</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 style="margin-right: 25px"><span style="color: #0000ff">APP OTP:</span> Nếu bạn đã cài <span style="color: #0000ff">APP OTP</span>
                                                .Vui lòng bật <span style="color: #0000ff">APP OTP</span>  để lấy mã xác thực.</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="bsModal4" tabindex="-1" role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content" style="width: 500px">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Nhập OTP</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-5"><input class="form-control" type="text" id="maotptru"
                                                                     placeholder="Nhập OTP"></div>
                                        <div class="col-sm-4"><select class="form-control" id="otpselecttru">
                                                <option value="0">OTP SMS</option>
                                                <option value="1">OTP APP</option>
                                            </select></div>
                                        <div class="col-sm-3"><input type="button" class="btn btn-primary" value="Trừ tiền" id="truotp">
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 style="margin-right: 50px"><span style="color: #0000ff">SMS OTP:</span> Vui lòng soạn tin <span style="color: #0000ff">VIN OTP</span>
                                                gửi <span style="color: #0000ff">8079</span> để nhận mã xác thực</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 style="margin-right: 25px"><span style="color: #0000ff">APP OTP:</span> Nếu bạn đã cài <span style="color: #0000ff">APP OTP</span>
                                                .Vui lòng bật <span style="color: #0000ff">APP OTP</span>  để lấy mã xác thực.</h5>
                                        </div>
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
<style>
    .spinner {
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
    }

</style>

<script>
    $("#chuyentien").click(function () {
        if ($("#nickname").val() == "") {
            $("#errorvin").html("Bạn chưa nhập nickname nhận");
            return false;
        }
        else if ($("#tienchuyen").val() == "") {
            $("#errorvin").html("Bạn chưa nhập số tiền chuyển");
            return false;
        }
        else if ($("#tienchuyen").val() > 50000000) {
            $("#errorvin").html("Số tiền chuyển tối đa là 50,000,000");
            return false;
        } else if ($("#reasonchuyen").val() == "") {
            $("#errorvin").html("Bạn chưa nhập lý do chuyển");
            return false;
        } else if($("#checknickname").val() == -1) {
            $("#errorvin").html("Nickname không tồn tại");
            return false;
        }
        else if($("#checknickname").val() == -2) {
            $("#errorvin").html("Hệ thống gián đoạn");
            return false;
        }
		else {

            $("#bsModal3").modal('show');
            $("#errorvin").html("");
        }
    })
    $("#trutien").click(function () {
        if ($("#nickname").val() == "") {
            $("#errorvin").html("Bạn chưa nhập nickname");
            return false;
        }
        else if ($("#tienchuyen").val() == "") {
            $("#errorvin").html("Bạn chưa nhập số tiền trừ");
            return false;
        }
         else if ($("#reasonchuyen").val() == "") {
            $("#errorvin").html("Bạn chưa nhập lý do trừ tiền");
            return false;
        } 
		 else if($("#checknickname").val() == -1) {
            $("#errorvin").html("Nickname không tồn tại");
            return false;
        }
        else if($("#checknickname").val() == -2) {
            $("#errorvin").html("Hệ thống gián đoạn");
            return false;
        }else {
            $("#bsModal4").modal('show');
            $("#errorvin").html("");
        }
    })

    $("#congotp").click(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/congtienajax") ?>",
            data: {
                nickname: $("#nickname").val(),
                tienchuyen: $("#tienchuyen").val(),
                money_type: $("#money_type").val(),
                reasonchuyen: $("#reasonchuyen").val(),
                maotpcong: $("#maotpcong").val(),
                otpselectcong:  $("#otpselectcong").val(),
				 actionname :  $("#actionname").val()
            },
            dataType: 'json',
            success: function (result) {
                if(result == 1){
                    alert("Bạn chuyển tiền thành công");
                    $("#nickname").val("");
                    $("#tienchuyen").val("");
                    $("#reasonchuyen").val("");
                    $("#maotpcong").val("");
                    $("#otpselectcong").val("");
                    $("#numchuyen").text("");
					 $("#lblnickname").text("");
                    var baseurl = "<?php echo base_url('user/congtrutien') ?>";
                    window.location.href = baseurl;
                }else if(result == 2){
                    alert("Bạn chuyển tiền thất bại")
                }
                else if(result == 4){
                    alert("Bạn nhập OTP không chính xác")
                }
                else if(result == 5){
                    alert("Mã OTP hết hạn")
                }
                else if(result == 3){
                    alert("Tài khoản  không đủ tiền")
                }else if(result == 6){
                    alert("Tài khoản  không tồn tại")
                }

            }
        })

    })

    $("#truotp").click(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/trutienajax") ?>",
            data: {
                nickname: $("#nickname").val(),
                tienchuyen: -$("#tienchuyen").val(),
                money_type: $("#money_type").val(),
                reasonchuyen: $("#reasonchuyen").val(),
                maotptru: $("#maotptru").val(),
                otpselecttru:  $("#otpselecttru").val(),
				 actionname :  $("#actionname").val()
            },
            dataType: 'json',
            success: function (result) {
                if(result == 1){
                    alert("Bạn trừ  tiền thành công");
                    $("#nickname").val("");
                    $("#tienchuyen").val("");
                    $("#reasonchuyen").val("");
                    $("#maotptru").val("");
                    $("#otpselecttru").val("");
                    $("#numchuyen").text("");
					  $("#lblnickname").text("");
                    var baseurl = "<?php echo base_url('user/congtrutien') ?>";
                    window.location.href = baseurl;
                }else if(result == 2){
                    alert("Bạn trừ tiền thất bại")
                }
                else if(result == 4){
                    alert("Bạn nhập OTP không chính xác")
                }
                else if(result  == 5){
                    alert("Mã OTP hết hạn")
                }
                else if(result == 3){
                    alert("Tài khoản  không đủ tiền")
                }else if(result == 6){
                    alert("Tài khoản  không tồn tại")
                }

            }
        })

    })
    $(document).ready(function () {
		  $( "#actionname" ).change(function() {
            if($("#actionname").val() == "Admin"){
                $("#trutien").show();
            }else if($("#actionname").val() == "EventVP"){
                $("#trutien").hide();
            }
        });
        $("#tienchuyen").keydown(function (e) {
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
    $("#tienchuyen").keyup(function (e) {
        $(this).val(($(this).val()));
        $("#numchuyen").text(format($(this).val()));

    });
	 function myFunction() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/getnicknameajax") ?>",
            data: {
                nickname: $("#nickname").val()
            },
            dataType: 'json',
            success: function (res) {
                $("#checknickname").val(res);
                if (res == -2) {
                    $("#lblnickname").text("Hệ thống gián đoạn");
                    $("#errorvin").html("");
                }
                else if (res == -1) {
                    $("#lblnickname").text("Nickname không tồn tại");
                    $("#errorvin").html("");
                }
                else if (res == 0) {
                    $("#lblnickname").text("Tài khoản thường");
                    $("#errorvin").html("");
                }
                else if (res == 1) {
                    $("#lblnickname").text("Tài khoản đại lý cấp 1");
                    $("#errorvin").html("");
                }
                else if (res == 2) {
                    $("#lblnickname").text("Tài khoản đại lý cấp 2");
                    $("#errorvin").html("");
                }
                else if (res == 100) {
                    $("#lblnickname").text("Tài khoản admin");
                    $("#errorvin").html("");
                }
            }
        })
    }
</script>
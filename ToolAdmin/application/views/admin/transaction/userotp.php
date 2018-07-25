<?php $this->load->view('admin/usergame/head', $this->data) ?>
<div class="line"></div>
<?php if ($role == false): ?>
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
                <h6>Mở khóa chat</h6>
            </div>

            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <label class="col-sm-4" style="color: red" id="errocode">
                    </label>

                </div>
            </div>
            <form>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">Số điện thoại:</label>

                        <div class="col-sm-2">
                            <input type="text" id="mobile" class="form-control"
                                   placeholder="Bạn cần nhập số điện thoại">
                        </div>
                        <label class="col-sm-2 control-label">Loại:</label>

                        <div class="col-sm-2">
                            <select id="type-otp">
                                <option value="0">OTP APP</option>
                                <option value="1">OTP SMS</option>
                                <option value="2">ODP</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="button" id="search-otp" class="button blueB" value="Tìm kiếm">
                        </div>

                    </div>
                </div>

            </form>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Số điện thoại</td>
                    <td>OTP</td>
                    
                    <td>Thời gian</td>

                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
            </table>


        </div>
    </div>
<?php endif; ?>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<div class="clear mt30"></div>
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
    }</style>
<script>
    $("#search-otp").click(function () {
        if ($("#mobile").val() == "") {
            $("#errocode").html("Bạn chưa nhập số điện thoại");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/userotpajax')?>",
            // url: "http://192.168.0.251:8082/api_backend",
            data: {
                mobile: $("#mobile").val(),
                type:  $("#type-otp").val()
            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if (res.errorCode == 0) {
					 $("#errocode").html("");
                    var stt = 1;

                        res += resultSearchTransction(stt, res.otp.mobile, res.otp.otp, res.otp.commandCode,res.otp.otpTime );


                    $('#logaction').html(res);
                }else  if (res.errorCode == 1020){
                    $("#errocode").html("Số điện thoại chưa lấy OTP");
                    $('#logaction').html("");
                }
				else  if (res.errorCode == 1001){
                    $("#errocode").html("Lỗi hệ thống");
                    $('#logaction').html("");
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#errocode").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 20000
        });

    });


    function resultSearchTransction(stt,sdt, otp, cuphap, time) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + sdt + "</td>";
        rs += "<td>" + otp + "</td>";
      
        rs += "<td>" + moment.unix(time/1000).format("DD-MM-YYYY HH:mm:ss") + "</td>";
        rs += "</tr>";
        return rs;
    }


</script>
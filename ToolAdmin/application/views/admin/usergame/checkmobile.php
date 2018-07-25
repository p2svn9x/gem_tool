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
        <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
        <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
        <input type="hidden" id="listmobile" value="<?php echo $listmb ?>">
        <div class="widget">
            <div class="title">
                <h4 style="margin-left: 20px">Kiểm tra số điện thoại </h4>
            </div>

            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <label class="col-sm-4" style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                    </label>

                </div>
            </div>
            <div class="formRow">
                <form action="<?php echo admin_url("usergame/checkmobile") ?>" id="fileinfo" name="fileinfo"
                      enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Số điện thoại:</label>

                        <div class="col-sm-2">
                            <input type="file" id="userfile" name="filexls"
                                   value="<?php echo $this->input->post('filexls') ?>">
                        </div>
                        <div class="col-sm-1">
                            <input type="submit" class="btn btn-primary pull-left button blueB" id="upload"
                                   value="Upload" name="ok">
                        </div>
                </form>
                <div class="col-sm-1"><input type="button" id="openuser" value="Tìm kiếm" class="button blueB">
                </div>
                <td style="">
                    <input type="button" id="exportexel" value="Xuất Exel" class="button blueB"
                           style="margin-left: 20px">
                </td>
                <input type="hidden" id="status" value="<?php echo $admin_info->Status ?>">
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-xs-12">
                        <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr style="height: 20px;">
                                <td>STT</td>
                                <td>Username</td>
                                <td>Nickname</td>
                                <td>SDT</td>
                                <td>Tiền nạp</td>
                                <td>Bảo mật</td>
                            </tr>
                            </thead>
                            <tbody id="logaction">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-xs-12">
                        <table id="checkAll1" class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr style="height: 20px;">
                                <td>STT</td>
                                <td>SĐT</td>
                            </tr>
                            </thead>
                            <tbody id="logaction1">
                            </tbody>
                        </table>
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
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery.table2excel.js"></script>
<script type="text/javascript">
    $("#openuser").click(function () {
        var result = ""
        var result1 = ""
        if($("#listmobile").val() == ""){
            $("#errocode").html("Không tồn tại file ");
        }else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('usergame/checkmobileajax')?>",
                data: {
                    mobile: $("#listmobile").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        if (res.lstPhone != null || res.lstPhone != "") {
                            $("#errocode").html("Số điện thoại không tồn tại:" + (res.lstPhone));

                            stt1 = 1;
                            $.each(res.lstPhone.split(','), function (index, value) {
                                result1 += resultsdt(stt1, value);
                                stt1++;
                            });
                            $('#logaction1').html(result1);
                            $("#checkAll1").table2excel({
                                exclude: ".noExl",
                                name: "Excel Document Name",
                                filename: "Listnomobile",
                                fileext: ".xls",
                                exclude_img: true,
                                exclude_links: true,
                                exclude_inputs: true
                            });
                        }
                        stt = 1;
                        $.each(res.transactions, function (index, value) {
                            result += resultSearchTransction(stt, value.userName, value.nickName,value.mobile, value.rechargeMoney, value.isHasSercurityMobile);
                            stt++;
                        });
                        $('#logaction').html(result);
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Hệ thống quá tải. Vui lòng gọi 19008698");
                }, timeout: 20000
            });
        }

    });
    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Listmobile",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    function resultSearchTransction(stt, username, nickname,sdt,rechargemoney,baomat) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + username + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + sdt + "</td>";
        rs += "<td>" + commaSeparateNumber(rechargemoney) + "</td>";
        if( baomat == 1){
            rs += "<td>" + "Đã bảo mật" + "</td>";
        }else if(baomat == 0){
            rs += "<td>" + "Chưa bảo mật" + "</td>";
        }

        return rs;
    }
    function resultsdt(stt, sdt) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + sdt + "</td>";
        return rs;
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

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
        <input type="hidden" id="listnickname" value="<?php echo $listnn ?>">
        <div class="widget">
            <div class="title">
                <h4 style="margin-left: 20px">Kiểm tra nickname được dùng giftcode</h4>
            </div>

            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <label class="col-sm-4" style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                    </label>

                </div>
            </div>
            <div class="formRow">
                <form action="<?php echo admin_url("usergame/checkusername") ?>" id="fileinfo" name="fileinfo"
                      enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Tài khoản:</label>

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
                                <td>IP</td>
								
                                    <td>Điện thoại</td>
                            
                                <td>Thời gian</td>
                            </tr>
                            </thead>
                            <tbody id="logaction">
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
        if($("#listnickname").val() == ""){
            $("#errocode").html("Không tồn tại file ");
        }else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('usergame/checkusernameajax')?>",
                data: {
                    nickname: $("#listnickname").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        if (res.lstNickName != null || res.lstNickName != "") {
                            $("#errocode").html("Nick name không tồn tại:" + (res.lstNickName));
                        }
                        stt = 1;
                        $.each(res.transactions, function (index, value) {
                            result += resultSearchTransction(stt, value.user_name, value.nick_name, value.ip,value.phone,value.time_log);
                            stt++;
                        });
                        $('#logaction').html(result);
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Hệ thống gián đoạn");
                }
            });
        }

    });
    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Listuser",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    function resultSearchTransction(stt, username, nickname, ip,phone,time) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + username + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + ip + "</td>";
		
            rs += "<td>" + phone + "</td>";
      
        rs += "<td>" + time + "</td>";
        return rs;
    }
</script>

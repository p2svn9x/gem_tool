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
        <input type="hidden" id="listgiftcode" value="<?php echo $listnn ?>">
        <div class="widget">
            <div class="title">
                <h4 style="margin-left: 20px">Kiểm tra giftcode</h4>
            </div>

            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <label class="col-sm-4" style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                    </label>

                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <label class="col-sm-4" style="color: red;word-break: break-all" id="errocodeuse">
                    </label>

                </div>
            </div>
            <div class="formRow">
                <form action="<?php echo admin_url("giftcode/checkgiftcode") ?>" id="fileinfo" name="fileinfo"
                      enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Giftcode:</label>

                        <div class="col-sm-2">
                            <input type="file" id="userfile" name="filexls"
                                   value="<?php echo $this->input->post('filexls') ?>">
                        </div>
                        <div class="col-sm-1">
                            <input type="submit" class="btn btn-primary pull-left button blueB" id="upload"
                                   value="Upload" name="ok">
                        </div>
                </form>

                <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Hiển thị:</label></td>
                <td class="">
                    <select id="selectdisplay" name="selectdisplay"
                            style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                        <option value="50" >50</option>
                        <option value="100" >100</option>
                        <option value="200" >200</option>
                        <option value="500" >500</option>
                        <option value="1000" >1000</option>
                        <option value="2000" >2000</option>
                        <option value="5000" >5000</option>
                    </select>
                </td>
                <div class="col-sm-1"><input type="button" id="openuser" value="Tìm kiếm" class="button blueB">
                </div>
                <td style="">
                    <input type="button" id="exportexel" value="Xuất Exel" class="button blueB"
                           style="margin-left: 20px">
                </td>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-xs-12">
                        <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr style="height: 20px;">
                                <td>STT</td>
                                <td>Giftcode</td>
                                <td>Nickname</td>
                                <td>Tổng tiền nạp</td>
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
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-sm"></ul>
    </div>
</div>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery.table2excel.js"></script>
<script type="text/javascript">
    $("#openuser").click(function () {
        var result = ""
        if($("#listgiftcode").val() == ""){
            $("#errocode").html("Không tồn tại file ");
        }else {
            var oldPage = 0;
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('giftcode/checkgiftcodeajax')?>",
                data: {
                    giftcode: $("#listgiftcode").val(),
                    display : $("#selectdisplay").val(),
                    pages : 1
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    $("#spinner").hide();
                    if (res.errorCode == "0") {
                        if (res.giftCodeNotExits != null || res.giftCodeNotExits != "") {
                            $("#errocode").html("Giftcode không tồn tại:" + (res.giftCodeNotExits));
                        }else{
                            $("#errocode").html("");
                        }
                        if (res.giftCodeNotUse != null || res.giftCodeNotUse != "") {
                            $("#errocodeuse").html("Giftcode chưa sử dụng :" + (res.giftCodeNotUse));
                        }else{
                            $("#errocodeuse").html("");
                        }


                        var totalPage = res.total;
                        stt = 1;
                        $.each(res.transactions, function (index, value) {
                            result += resultSearchTransction(stt, value.giftcode, value.nickName, value.totalRecharge, value.createTime);
                            stt++;
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if (oldPage > 0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo admin_url('giftcode/checkgiftcodeajax')?>",
                                        data: {
                                            giftcode: $("#listgiftcode").val(),
                                            pages : page,
                                            display : $("#selectdisplay").val()
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            stt = 1;
                                            $.each(res.transactions, function (index, value) {
                                                result += resultSearchTransction(stt, value.giftcode, value.nickName, value.totalRecharge, value.createTime);
                                                stt++;
                                            });
                                            $('#logaction').html(result);
                                        }
                                    });
                                }
                                oldPage = page;
                            }
                        });

                    }else if(res.errorCode == "10002"){
                        $("#errocode").html("File giftcode có chứa khoảng trắng .Vui lòng upload lại file");
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
            filename: "List giftcode",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function resultSearchTransction(stt, giftcode, nickname, totalre,time) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + giftcode + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(totalre) + "</td>";
        rs += "<td>" + time + "</td>";
        return rs;
    }
</script>

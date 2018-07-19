<section class="content-header">
    <h1>
        L?ch s? chuy?n kho?n
    </h1>
</section>
<form action="<?php echo base_url("agency/listtranfer")?>" method="post">
<input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer" name="statususer">
<input type="hidden" id="page1"  name="page1" >
<input type="hidden" value="<?php echo $listnn ?>" id="listdaily1">
<input type="hidden" value="<?php echo $listnn1 ?>" id="listdaily2">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

                    <?php if ($admin_info->status == "A"): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <?php if (isset($nicknamesend)): ?>
                                    <div class="col-sm-2">
                                        <input type="hidden" id="nicknamesend"  class="form-control"
                                               value="<?php echo $nicknamesend ?>">
                                        <input type="hidden" id="nicknamreveice"  class="form-control"
                                               value="<?php echo $nicknamreceive ?>">

                                    </div>
                                <?php else: ?>
                                    <label class="col-sm-1 control-label">Nick name nh?n:</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="nickname" name="nicknamesend" class="form-control" value="<?php echo $this->input->post("nicknamesend")?>">
                                    </div>
                                    <label class="col-sm-1 control-label">Nick name chuy?n:</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="nickname" name="nicknamereceive" class="form-control" value="<?php echo $this->input->post("nicknamereceive")?>">
                                    </div>
                                <?php endif; ?>

                                <label class="col-sm-1 control-label">Tr?ng thái</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="status" name="status" >
                                        <option value="">Ch?n</option>

                                        <option value="1" <?php if($this->input->post("status")== "1"){echo "selected";}  ?>>Tài kho?n thu?ng chuy?n d?i lý c?p 1</option>
                                        <option value="2" <?php if($this->input->post("status")== "2"){echo "selected";}  ?>>Tài kho?n thu?ng chuy?n d?i lý c?p 2</option>
                                        <option value="3" <?php if($this->input->post("status")== "3"){echo "selected";}  ?>>Ð?i lý c?p 1 chuy?n tài kho?n thu?ng</option>
                                        <option value="4" <?php if($this->input->post("status")== "4"){echo "selected";}  ?>>Ð?i lý c?p 1 chuy?n d?i lý c?p 1</option>
                                        <option value="5" <?php if($this->input->post("status")== "5"){echo "selected";}  ?>>Ð?i lý c?p 1 chuy?n d?i lý c?p 2</option>
                                        <option value="6" <?php if($this->input->post("status")== "6"){echo "selected";}  ?>>Ð?i lý c?p 2 chuy?n tài kho?n thu?ng</option>
                                        <option value="7" <?php if($this->input->post("status")== "7"){echo "selected";}  ?>>Ð?i lý c?p 2 chuy?n d?i lý c?p 1</option>
                                        <option value="8" <?php if($this->input->post("status")== "8"){echo "selected";}  ?>>Ð?i lý c?p 2 chuy?n d?i lý c?p 2</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <label class="col-sm-1 control-label">T? ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate" name="fromDate" value="<?php echo $this->input->post("fromDate")?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Ð?n ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate" name="toDate" value="<?php echo $this->input->post("toDate")?>"><span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-1"><input type="submit" value="Tìm ki?m" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/listtranfer') ?>'; ">
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <div class="row">

                                <?php if (isset($nickname)): ?>
                                    <input type="hidden" id="nickname" class="form-control"
                                           value="<?php echo $nickname ?>">
                                <?php else: ?>
                                    <input type="hidden" id="nickname" value="<?php echo $admin_info->nickname ?>">
                                <?php endif; ?>
                                <div class="col-sm-1"></div>
                                <label class="col-sm-1 control-label">T? ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Ð?n ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-1"><input type="submit" value="Tìm ki?m" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/listtranfer') ?>'; ">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tài kho?n chuy?n</th>
                                <th>Tài kho?n nh?n</th>
                                <th>S? vin g?i</th>
                                <th>S? vin nh?n</th>
                                <th>Phí chuy?n kho?n</th>
                                <th>Tr?ng thái</th>
                                <th>Th?i gian</th>
                            </tr>
                            </thead>
                            <tbody id="logaction">

                            </tbody>
                        </table>

                        <div id="spinner" class="spinner" style="display:none;">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                 alt="Loading"/>
                        </div>
                        <div class="text-center pull-right">
                            <ul id="pagination-demo" class="pagination-lg"></ul>
                        </div>
                        <h1 id="resultsearch"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
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

    #resultsearch {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        width: 400px; /* width of the spinner gif */
        height: 100px; /*hight of the spinner gif +2px to fix IE8 issue */
    }
</style>


<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày k?t thúc ph?i l?n hon ngày b?t d?u')
            return false;
        }
    });

    function resulttranferlist(stt, namesend, namerecive, moneysend, moneyrecive, fee, status, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td class ='idnamesend'>" + namesend + "</td>";
        rs += "<td class = 'idnamerecive'>" + namerecive + "</td>";
        rs += "<td>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td>" + date + "</td>";
       
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        $("#spinner").show();
        if ($("#statususer").val() == "D") {
            listTranferAgent();
        } else {
            listTranferAdmin();
        }
    });

    function csstextdaily() {
        var listdl1 = $("#listdaily1").val().split(',');
        var listdl2 = $("#listdaily2").val().split(',');
        $("table tr td.idnamesend").each(function (index, value) {
            $.each(listdl1, function (index1, value1) {
                if (value1 == value.innerHTML) {
                    $(this).text().css("color", "red");
                }
            });
        });
        $("table tr td.idnamerecive").each(function (index, value) {
            $.each(listdl2, function (index1, value1) {
                if (value1 == value.innerHTML) {
                    $(this).text().css("color", "red");
                }
            });
        });
    }

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function statustranfer(feetran) {
        var strresult;
        switch (feetran) {
            case 1:
                strresult = "Tài kho?n thu?ng chuy?n d?i lý c?p 1";
                break;
            case 2:
                strresult = "Tài kho?n thu?ng chuy?n d?i lý c?p 2";
                break;
            case 3:
                strresult = "Ð?i lý c?p 1 chuy?n tài kho?n thu?ng";
                break;
            case 4:
                strresult = "Ð?i lý c?p 1 chuy?n d?i lý c?p 1";
                break;
            case 5:
                strresult = "Ð?i lý c?p 1 chuy?n d?i lý c?p 2";
                break;
            case 6:
                strresult = "Ð?i lý c?p 2 chuy?n tài kho?n thu?ng";
                break;
            case 7:
                strresult = "Ð?i lý c?p 2 chuy?n d?i lý c?p 1";
                break;
            case 8:
                strresult = "Ð?i lý c?p 2 chuy?n d?i lý c?p 2";
                break;
        }
        return strresult;
    }
    function listTranferAgent() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/historyTransferAgent') ?>",
            data: {
                nicknamesend: $("#nicknamesend").val(),
                nicknamereceive: $("#nicknamereceive").val(),
                status: "",
                timestart: $("#fromDate").val(),
                timeend: $("#toDate").val(),
                topds:1,
                p: 1
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var countrow = result.totalRecord;
                $("#num").html(countrow);
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm th?y k?t qu?");
                } else {
                    $("#resultsearch").html("");
                    $('#pagination-demo').twbsPagination({
                        totalPages: result.total,
                        visiblePages: 5,
                        onPageClick: function (event, page) {

                            $("#spinner").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('TranferAjax/historyTransferAgent') ?>",
                                data: {
                                    nicknamesend: $("#nickname").val(),
                                    nicknamereveice: $("#nickname").val(),
                                    status: $("#status").val(),
                                    timestart: $("#fromDate").val(),
                                    timeend: $("#toDate").val(),
                                    p: page
                                },
                                dataType: 'json',
                                success: function (result) {
                                    $("#spinner").hide();
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time);
                                        stt++
                                    });
                                    $('#logaction').html(result);
                                    csstextdaily();
                                }
                            });
                        }
                    });
                }
            }
        });
    }
    function listTranferAdmin() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/historyTransferAdmin') ?>",
            data: {
                nicknamesend: $("#nicknamesend").val(),
                nicknamereceive: $("#nicknamereceive").val(),
                status: "",
                timestart: $("#fromDate").val(),
                timeend: $("#toDate").val(),
                topds:1,
                p: 1
            },
            dataType: 'json',
            success: function (result) {
                
                $("#spinner").hide();
                var countrow = result.totalRecord;
                $("#num").html(countrow);
                    $("#resultsearch").html("");
                    $('#pagination-demosearch').css("display", "none");
                    $('#pagination-demo').twbsPagination({

                        totalPages: result.total,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            $("#page1").val(page);
                            $("#spinner").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('TranferAjax/historyTransferAdmin') ?>",
                                data: {
                                    nicknamesend: $("#nickname").val(),
                                    nicknamereveice: $("#nickname").val(),
                                    status: $("#status").val(),
                                    timestart: $("#fromDate").val(),
                                    timeend: $("#toDate").val(),
                                    p: page
                                },
                                dataType: 'json',
                                success: function (result) {
                                    $("#spinner").hide();
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time);
                                        stt++
                                    });
                                    $('#logaction').html(result);
                                    csstextdaily();
                                }
                            });
                        }
                    });
                }
        });
    }
</script>
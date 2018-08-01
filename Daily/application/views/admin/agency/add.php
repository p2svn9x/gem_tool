<section class="content-header">
    <h1>
        <?php if ($admin_info->status == "D") : ?>
<!--            Thêm đại lý cấp 2-->
        <?php else: ?>
            Thêm đại lý cấp 1
        <?php endif; ?>

    </h1>
    <input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer">
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
    <?php if ($admin_info->status == "A") : ?>
<form id="form" class="form" enctype="multipart/form-data" method="post" action="">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <label class="control-label" id="errorstatus" style="color: red"></label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Nick name:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" name="param_name" id="param_name"
                       placeholder="Nhập nick name">
            </div>
            <div class="col-sm-3">
                <input type="button" value="Tìm kiếm" name="submit"
                       class="btn btn-primary pull-left" id="searchnickname">
            </div>
        </div>
    </div>

</form>
    <?php endif; ?>

<div id="info_user" style="display: none">
<?php if ($admin_info->status == "A") : ?>
    <input type="hidden" name="username" id="username"
           value="">
    <input type="hidden" name="nickname" id="nickname"
           value="">
    <input type="hidden" name="email" id="email" value="">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-2"></div>
            <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập:&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<label for="inputEmail3" class="control-label"
                                         style="color: #0000ff" id="lblusername"></label></label>
            <label for="inputEmail3" class="col-sm-2 control-label">Nick name:&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<label for="inputEmail3" class="control-label"
                                         style="color: #0000ff" id="lblnickname"></label></label>
            <label for="inputEmail3" class="col-sm-2 control-label">Số vin dư:&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<label for="inputEmail3" class="control-label"
                                         style="color: #0000ff" id="lblvin"></label>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Đại lý cha:</label>

            <div class="col-sm-2">
                <select class="form-control" id="parent_name">
                    <option value="">Chọn</option>
                    <option value="<?php echo $dlmb ?>">Tổng đại lý miền bắc</option>
                    <option value="<?php echo $dlmn ?>">Tổng đại lý miền nam</option>
                    <option value="<?php echo $dlmt ?>">Tổng đại lý miền trung</option>
                </select>

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="errorparent"
                   style="color: red"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Tên đại lý:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="namedaily">

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="errorname"
                   style="color: red"></label>
        </div>
    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Số điện
                thoại:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="phonedaily">

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="errorphone"
                   style="color: red"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Địa chỉ:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="addressdaily">

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="erroradd"
                   style="color: red"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Tên ngân hàng:</label>

            <div class="col-sm-2">
               <select class="form-control" id="namebank">
                   <option value="">Chọn</option>
                   <option value="BIDV">BIDV</option>
                   <option value="VietinBank">VietinBank</option>
                   <option value="VietcomBank">VietcomBank</option>
                   <option value="MSB">MaritimeBank</option>
               </select>

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="errornamebank"
                   style="color: red"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Tên tài khoản ngân hàng:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="usernamebank">

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="erroruserbank"
                   style="color: red"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Số tài khoản ngân hàng:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="numberbank">

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label" id="errornumberbank"
                   style="color: red"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Facebook:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="facebook">

            </div>
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label">Hiển thị trong game:</label>

            <div class="col-sm-2">
                <input type="checkbox" id="isshow" name="chk" value="0">
                <input type="hidden" name="displayname" id="displayname" value="">
            </div>
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-1 control-label"></label>

            <div class="col-sm-2">
                <input type="button" id="setdaily1" name="setdaily1"
                       value="" class="btn btn-primary pull-left">

            </div>
        </div>
    </div>
<?php elseif ($admin_info->status == "D"): ?>
    <!--<input type="hidden" name="username" id="username"
           value="">
    <input type="hidden" name="nickname" id="nickname"
           value="">
    <input type="hidden" name="mobile" id="mobile" value="">
    <input type="hidden" name="email" id="email" value="">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3"></div>
            <label for="inputEmail3" class="col-sm-2 control-label">Nick name:&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<label for="inputEmail3" class="control-label"
                                         style="color: #0000ff" id="lblnickname"></label></label>
            <label for="inputEmail3" class="col-sm-1 control-label">&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;</label>

            <div class="col-sm-2">
                <input type="button" id="setdaily2" name="setdaily2"
                       value="" class="btn btn-primary pull-left">

            </div>
        </div>
    </div>-->
<?php endif; ?>
<h3>Lịch sử chuyển dịch hệ thống</h3>

<div class="form-group">
    <div class="row">
        <label class="col-sm-1 control-label">Tiền:</label>
        <div class="col-sm-1">
            <select id="money_type" class="form-control">
                <option value="vin">Vin</option>
                <option value="xu">Xu</option>
            </select>
        </div>
        <label class="col-sm-1 control-label">Từ ngày:</label>

        <div class="col-sm-2">
            <div class="input-group date" id="datetimepicker1">
                <input type="text" class="form-control" id="fromDate"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
            </div>
        </div>
        <label class="col-sm-1 control-label">Đến ngày:</label>

        <div class="col-sm-2">
            <div class="input-group date" id="datetimepicker2">
                <input type="text" class="form-control" id="toDate"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
            </div>
        </div>
        <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                     class="btn btn-primary pull-right" id="search_tran"></div>
        <div class="col-sm-1"><input type="submit" value="Reset" name="submit"
                                     class="btn btn-primary pull-left" id="reset"></div>
    </div>
</div>
<div class="col-sm-12">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Nickname</th>
            <th>Số dư</th>
            <th>Tiền thay dổi</th>
            <th>Hành động</th>
            <th>Ngày tạo</th>
        </tr>
        </thead>
        <tbody id="logaction">

        </tbody>
    </table>

    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center pull-right">
        <ul id="pagination-demo" class="pagination-lg"></ul>
        <ul id="pagination-demosearch" class="pagination-lg"></ul>
    </div>
    <h1 id="resultsearch"></h1>
</div>
</div>

</div>
</div>
</div>
</div>
</section>
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
        top: 100%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        width: 400px; /* width of the spinner gif */
        height: 100px; /*hight of the spinner gif +2px to fix IE8 issue */
    }
</style>

<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
});
$( document ).ready(function() {
    $("#displayname").val($('#isshow').val());
});
$('#isshow').on('change', function(){
    this.value = this.checked ? 1 : 0;
    $("#displayname").val(this.value);
}).change();
$("#searchnickname").click(function () {
    if ($("#param_name").val() == "") {
       // $("#errorstatus").css("display", "block");
        $("#info_user").css("display", "none");
        $("#errorstatus").html("Bạn chưa nhập nick name");
        return false;
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "agency/infodaily",
        data: {
            nickname: $("#param_name").val().trim()
        },
        dataType: 'json',
        success: function (res) {
			  $("#spinner").hide();
            if(res == 2){
				 $("#info_user").css("display", "none")
                $("#errorstatus").html("Tài khoản không tồn tại hoặc đã là đại lý");
            }else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('TranferAjax/AgentAdd') ?>",
                    data: {
                        nickname: $("#param_name").val().trim()
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.user != null) {
                            if ($("#statususer").val() == "D") {
                                $("#info_user").css("display", "block");
                                $("#errorstatus").html("");
                                $("#lblnickname").html(result.user.nickname);
                                $("#setdaily2").val("Set đại lý cấp 2");
                                $("#username").val(result.user.username);
                                $("#nickname").val(result.user.nickname);
                                $("#email").val(result.user.email);
                            } else if($("#statususer").val() == "A"){
                                $("#info_user").css("display", "block");
                                   $("#errorstatus").html("");
                                $("#lblusername").html(result.user.username);
                                $("#lblnickname").html(result.user.nickname);
                                $("#lblvin").html(commaSeparateNumber(result.user.vinTotal));
                                $("#setdaily1").val("Set đại lý cấp 1");
                                $("#username").val(result.user.username);
                                $("#nickname").val(result.user.nickname);
                                $("#email").val(result.user.email);
                                $("#phonedaily").val(result.user.mobile)
                            }
                            getTransactionHistory();
                        } else if(result.user == null) {
                            $("#errorstatus").html("Nick name đã là đại lý hoặc không tồn tại");
                           
                            $("#info_user").css("display", "none")
                        }
                    }
                })
            }

        }
    });
});
$("#setdaily2").click(function () {
    $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/setLevelAgent2') ?>",
            dataType: 'json',
            data: {
                nickname: $("#nickname").val(),
                status: 2,
                username: $("#username").val(),
                mobile: $("#mobile").val(),
                email: $("#email").val()
            },
            success: function (res) {
                window.location.href = "<?php echo base_url('agency') ?>";
            }
    });
});
$("#setdaily1").click(function () {
    if($("#parent_name").val() == ""){
        $("#erroradd").html("");
        $("#errorphone").html("");
        $("#errorname").html("");
        $("#errornamebank").html("");
        $("#erroruserbank").html("");
        $("#errornumberbank").html("");
        $("#errorparent").html("Bạn chưa chọn đại lý cha");
        return false;
    }

   else if($("#namedaily").val() == ""){
        $("#errorname").html("Bạn phải nhập tên đại lý");
        $("#errorphone").html("");
        $("#erroradd").html("");
        $("#errornamebank").html("");
        $("#erroruserbank").html("");
        $("#errornumberbank").html("");
        $("#errorparent").html("");
        return false;
    }else if($("#phonedaily").val() == ""){
        $("#errorphone").html("Bạn phải nhập số điện thoại");
        $("#errorname").html("");
        $("#erroradd").html("");
        $("#errornamebank").html("");
        $("#erroruserbank").html("");
        $("#errornumberbank").html("");
        $("#errorparent").html("");
        return false;
    } else if($("#addressdaily").val() == ""){
        $("#erroradd").html("Bạn phải nhập địa chỉ");
        $("#errorphone").html("");
        $("#errorname").html("");
        $("#errornamebank").html("");
        $("#erroruserbank").html("");
        $("#errornumberbank").html("");
        $("#errorparent").html("");
        return false;
    }else if($("#namebank").val() == ""){
        $("#erroradd").html("");
        $("#errorphone").html("");
        $("#errorname").html("");
        $("#errornamebank").html("Bạn phải nhập tên ngân hàng");
        $("#erroruserbank").html("");
        $("#errornumberbank").html("");
        $("#errorparent").html("");
        return false;
    }else if($("#usernamebank").val() == ""){
        $("#erroradd").html("");
        $("#errorphone").html("");
        $("#errorname").html("");
        $("#errornamebank").html("");
        $("#erroruserbank").html("Bạn phải nhập tên tài khoản ngân hàng");
        $("#errornumberbank").html("");
        $("#errorparent").html("");
        return false;
    }else if($("#numberbank").val() == ""){
        $("#erroradd").html("");
        $("#errorphone").html("");
        $("#errorname").html("");
        $("#errornamebank").html("");
        $("#erroruserbank").html("");
        $("#errornumberbank").html("Bạn phải nhập số tài khoản ngân hàng");
        $("#errorparent").html("");
        return false;
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('TranferAjax/setLevelAgent1') ?>",
        dataType: 'json',
        data: {
            namedaily : $("#namedaily").val(),
            phonedaily : $("#phonedaily").val(),
            addressdaily: $("#addressdaily").val(),
            facebookdaily: $("#facebookdaily").val(),
            namebank: $("#namebank").val(),
            usernamebank: $("#usernamebank").val(),
            numberbank: $("#numberbank").val(),
            username: $("#username").val(),
            email: $("#email").val(),
            nickname: $("#nickname").val(),
            show: $("#isshow").val(),
            parent : $("#parent_name").val()

        },
        success: function (response) {
           
            window.location.href = "<?php echo base_url('agency') ?>";
        }
    });
});
$("#search_tran").click(function () {
    var fromDatetime = $("#fromDate").val();
    var toDatetime = $("#toDate").val();
    if (fromDatetime > toDatetime) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
        return false;
    }
    $('#pagination-demo').css("display", "none");
    $('#pagination-demosearch').css("display", "block");
    $("#spinner").show();
    getTransactionHistory();
});
function resultSearchTransction(transactionTime, nickName,   currentMoney, moneyExchange, serviceName, stt) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    rs += "<td>" + nickName + "</td>";
    rs += "<td>" + currentMoney + "</td>";
    rs += "<td>" + moneyExchange + "</td>";
    rs += "<td>" + serviceName + "</td>";
    rs += "<td>" + transactionTime + "</td>";
    rs += "</tr>";
    return rs;
}
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
        $('#isshow').on('change', function(){
            this.value = this.checked ? 1 : 0;
        }).change();

    function getTransactionHistory(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/getTransactionHistory') ?>",
            data: {
                nickname: $("#nickname").val(),
                timestart: $("#fromDate").val(),
                timeend: $("#toDate").val(),
                moneytype: $("#money_type").val(),
                actiongame: "",
                servicename: "",
                page: 1,
                like: 1
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalPage = result.totalPages;
                console.log(totalPage);
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $('#pagination-demosearch').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    $('#pagination-demosearch').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            $("#spinner").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('TranferAjax/getTransactionHistory') ?>",
                                data: {
                                    nickname: $("#nickname").val(),
                                    timestart: $("#fromDate").val(),
                                    timeend: $("#toDate").val(),
                                    moneytype: $("#money_type").val(),
                                    actiongame: "",
                                    servicename: "",
                                    page: page,
                                    like: 1
                                },
                                dataType: 'json',
                                success: function (result) {
                                    $("#spinner").hide();
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resultSearchTransction(value.transactionTime, value.nickName,  commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName,stt)
                                        stt++;
                                    });
                                    $('#logaction').html(result);
                                }
                            });
                        }
                    });
                }
                stt = 1;
                $.each(result.transactions, function (index, value) {
                    result += resultSearchTransction(value.transactionTime, value.nickName,   commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName,stt)
                    stt++;
                });
                $('#logaction').html(result);
            }
        });
    }
</script>
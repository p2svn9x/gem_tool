<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">

        </div>
        <div class="clear"></div>
    </div>
</div>
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
        <script src="<?php echo public_url() ?>/site/js/jquery.csv.js"></script>
    <div class="widget">
    <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

    <div class="title">
        <h6>Lịch sử nạp vin qua thẻ</h6>
    </div>
    <form class="list_filter form" action="<?php echo admin_url('report/rechargebycard') ?>" method="post">
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                    <td class="item">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" id="fromDate" name="fromDate" value="<?php echo $start_time ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>


                    </td>

                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Đến ngày: </label>
                    </td>
                    <td class="item">

                        <div class="input-group date" id="datetimepicker2">
                            <input type="text" id="toDate" name="toDate" value="<?php echo $end_time ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>
                    </td>


                </tr>
            </table>
        </div>
        <div class="formRow">

            <table>
                <tr>
                    <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                    <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                               id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
                    <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Loại thẻ:</label></td>
                    <td class="">
                        <select id="select_provider" name="select_provider"
                                style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                            <option value="">Chọn</option>
                            <option value="Viettel" <?php if ($this->input->post('select_provider') == "Viettel") {
                                echo "selected";
                            } ?>>Viettel
                            </option>
                            <option
                                value="Mobifone" <?php if ($this->input->post('select_provider') == "Mobifone") {
                                echo "selected";
                            } ?>>Mobifone
                            </option>
                            <option
                                value="Vinaphone" <?php if ($this->input->post('select_provider') == "Vinaphone") {
                                echo "selected";
                            } ?>>Vinaphone
                            </option>
                            <option value="Zing" <?php if ($this->input->post('select_provider') == "Zing") {
                                echo "selected";
                            } ?>>Zing
                            </option>
                            <option value="Vcoin" <?php if ($this->input->post('select_provider') == "Vcoin") {
                                echo "selected";
                            } ?>>Vcoin
                            </option>
                            <option value="Gate" <?php if ($this->input->post('select_provider') == "Gate") {
                                echo "selected";
                            } ?>>Gate
                            </option>
                            <option
                                value="VietNamMobile" <?php if ($this->input->post('select_provider') == "VietNamMobile") {
                                echo "selected";
                            } ?>>VietNamMobile
                            </option>
							<option value="MegaCard" <?php if ($this->input->post('select_provider') == "MegaCard") {
                                echo "selected";
                            } ?>>MegaCard
                            </option>
                        </select>
                    </td>
                </tr>

            </table>

        </div>

        <div class="formRow">
            <table>
                <tr>
                    <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã thẻ:</label></td>
                    <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                               id="txtmathe" value="<?php echo $this->input->post('txtmathe') ?>" name="txtmathe">
                    </td>
                    <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Mã serial:</label></td>
                    <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                               id="txtserial" value="<?php echo $this->input->post('txtserial') ?>"
                               name="txtserial"></td>
                </tr>
            </table>
        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã giao dịch:</label></td>
                    <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                               id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                               name="magiaodich"></td>
                    <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Trạng thái:</label></td>
                    <td class="">
                        <select id="select_status" name="select_status"
                                style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                            <option value="">Chọn</option>
                            <option value="0" <?php if ($this->input->post('select_status') == "0") {
                                echo "selected";
                            } ?>>Thành công
                            </option>
                            <option value="1" <?php if ($this->input->post('select_status') == "1") {
                                echo "selected";
                            } ?>>Thất bại
                            </option>
                            <option value="30" <?php if ($this->input->post('select_status') == "30") {
                                echo "selected";
                            } ?>>Đang xử lý
                            </option>
                            <option value="31" <?php if ($this->input->post('select_status') == "31") {
                                echo "selected";
                            } ?>>Thẻ đã nạp trước đó
                            </option>
                            <option value="32" <?php if ($this->input->post('select_status') == "32") {
                                echo "selected";
                            } ?>>Thẻ bị khóa
                            </option>
                            <option value="33" <?php if ($this->input->post('select_status') == "33") {
                                echo "selected";
                            } ?>>Thẻ chưa kích hoạt
                            </option>
                            <option value="34" <?php if ($this->input->post('select_status') == "34") {
                                echo "selected";
                            } ?>>Thẻ hết hạn
                            </option>
                            <option value="35" <?php if ($this->input->post('select_status') == "35") {
                                echo "selected";
                            } ?>>Sai mã thẻ
                            </option>
                            <option value="36" <?php if ($this->input->post('select_status') == "36") {
                                echo "selected";
                            } ?>>Mã serial không đúng
                            </option>
                        </select>
                    </td>
                    
                </tr>
            </table>
        </div>
		<div class="formRow">
            <table>
                <tr>
                    <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nhà cung cấp:</label></td>
                    <td class="">
                        <select id="select_partner" name="select_partner"
                                style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                            <option value="">Chọn</option>
                            <option value="maxpay" <?php if ($this->input->post('select_partner') == "maxpay") {
                                echo "selected";
                            } ?>>Maxpay
                            </option>
                            <option value="abtpay" <?php if ($this->input->post('select_partner') == "abtpay") {
                                echo "selected";
                            } ?>>Abtpay
                            </option>
                        </select>
                    </td>
                    <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Số dòng:</label></td>
                    <td>
                        <input type="text" id="limit" placeholder="" value="50">
                    </td>
                    <td style="">
                        <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                               style="margin-left: 50px">
                    </td>
                    <td>
                        <input type="reset"
                               onclick="window.location.href = '<?php echo admin_url('report/rechargebycard') ?>'; "
                               value="Reset" class="basic" style="margin-left: 20px">
                    </td>
                    <td>
                        <label for="csv_file" class="btn btn-info btn-sm" style="margin-left: 20px">
                            <input type="file" id="csv_file" style="display: none" />
                            Upload CSV
                        </label
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm" id="exportBtn" style="margin-left: 20px">Export CSV</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <div class="formRow">
        <div class="row">
            <div class="col-sm-2">
                <h5>Tổng:<span style="color: #0000ff" id="summoney"></span></h5>
            </div>
            <div class="col-sm-8">
            </div>
           <!-- <div class="col-sm-2">
                <h5>Tổng giao dịch:<span style="color: #0000ff" id="sumrecord"></span></h5>
            </div>-->
        </div>
    </div>
<!--
    <table class="table table-bordered table-striped" id="checkAll" style="table-layout: fixed;word-wrap: break-word;">
        <thead>
        <tr>
            <td>Viettel</td>
            <td>Vinaphone</td>
            <td>Mobifone</td>
            <td>Gate</td>
            <td>MegaCard</td>
			<td>Vcoin</td>
            <td></td>


        </tr>
        </thead>
        <tbody id="logaction1">
        </tbody>
    </table>
    <table class="table table-bordered table-striped" id="checkAll" style="table-layout: fixed;word-wrap: break-word;">
        <thead>
        <tr>
            <td>Web</td>
            <td>Android</td>
            <td>Ios</td>
            <td>Winphone</td>
            <td>Facebook App</td>
            <td>Desktop</td>
            <td>Other</td>


        </tr>
        </thead>
        <tbody id="logaction2">
        </tbody>
    </table>
	-->
    <div class="formRow">
    </div>

    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
        <thead>
        <tr style="height: 20px;">
            <td>STT</td>
            <td>Mã giao dịch</td>
            <td>Nick name</td>
            <td>Thẻ</td>
            <td>Nhà cung cấp</td>
            <td>Serial</td>
            <td>Mã thẻ</td>
            <td>Mệnh giá</td>
            <td>Mã lỗi dịch vụ</td>
            <td>Mô tả</td>
            <td>Mã lỗi Vinplay</td>
            <td>Thời gian</td>
            <td>Cập nhật thẻ</td>

        </tr>
        </thead>
        <tbody id="logaction">
        </tbody>
    </table>
    </div>
    </div>
<?php endif; ?>
<style>
    td {
        word-break: break-all;
    }

    thead {
        font-size: 12px;
    }

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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-lg"></ul>
    </div>

</div>

<div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p id="statuspenđing" style="color: #0000ff"></p>
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
                <p style="color: red">Có lỗi xảy ra khi kết nối với maxpay</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Không tìm thấy dữ liệu giao dịch nạp thẻ trong DB</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal6" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Có lỗi xảy ra khi xử lý cộng tiền cho khách hàng</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal7" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Chưa cộng được tiền cho khách hàng chưa login</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal8" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Dữ liệu gửi lên không chính xác khi kết nối với maxpay</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal9" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Không tìm thấy giao dịch thẻ khi kết nối với maxpay</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal10" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Lỗi không xác định khi kết nối với maxpay</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bsModal11" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: red">Hệ thống gián đoạn vui lòng liên hệ 19006896</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

        $('#csv_file').change(function () {
            var fileInput = document.getElementById("csv_file");
            var reader = new FileReader();
            reader.onload = function () {
                var data = $.csv.toArrays(reader.result);
                var pinList  = "";
                var serialList  = "";
                $.each(data, function (key, value) {
                    if(key > 0){
                        if(pinList.length > 1) pinList += ',';
                        if(serialList.length > 1) serialList += ',';
                        pinList = pinList + value[0];
                        serialList = serialList + value[1];
                    }
                })
                $('#txtmathe').val(pinList);
                $('#txtserial').val(serialList);
                $('#toDate').val('');
                $('#fromDate').val('');
//                console.log(serialList)
            };
            reader.readAsBinaryString(fileInput.files[0]);
        })

        $('#exportBtn').click(function () {
            nickname = $("#filter_iname").val(),
            provider = $("#select_provider").val(),
            serial = $("#txtserial").val(),
            mathe = $("#txtmathe").val(),
            status = $("#select_status").val(),
            toDate = $("#toDate").val(),
            fromDate = $("#fromDate").val(),
            tranid = $("#magiaodich").val(),
            partner = $("#select_partner").val();
            window.location.href = 'exportRechargeByCard?nickname='+nickname+'&provider='+provider+'&serial='+serial+'&mathe='+mathe+'&status='+status+'&toDate='+toDate+'&fromDate='+fromDate+'&tranid='+tranid+'&partner='+partner;
        })

    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    function resultSearchTransction(stt, rid, nickName, provider, partner, serial, pin, amount, status, message, code, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + provider + "</td>";
        rs += "<td>" + partner + "</td>";
        rs += "<td>" + serial + "</td>";
        rs += "<td>" + pin + "</td>";
        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>" + status + "</td>";
        rs += "<td>" + message + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + date + "</td>";
        if (code == 30) {
            rs += "<td>" + "<input type='button' id='updatecard' value='Cập nhật thẻ' class='button blueB'  onclick=\"updatecard('" + rid + "','" + nickName + "')\" >" + "</td>";
        }
        else {
            rs += "<td></td>"
        }
        rs += "</tr>";
        return rs;
    }

    function resultnhamang(viettel, vina, mobi, gate,mega,vcoin) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(viettel) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vina) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(mobi) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(gate) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(mega) + "</td>";
		rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vcoin) + "</td>";
     
        rs += "<td >" + "" + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resultplatform(web, android, ios, wp, facebook, desktop, other) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(web) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(android) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(ios) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(wp) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(facebook) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(desktop) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(other) + "</td>";

        rs += "</tr>";
        return rs;
    }
	
	  $(document).ready(function () {
		    $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	  });
    $("#search_tran").click(function () {
        var result = "";
        var result1 = "";
        var result2 = "";
        var oldpage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/rechargebycardajax')?>",
           
            data: {
                nickname: $("#filter_iname").val(),
                provider: $("#select_provider").val(),
                serial: $("#txtserial").val(),
                mathe: $("#txtmathe").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                tranid: $("#magiaodich").val(),
				partner: $("#select_partner").val(),
                limit: $('#limit').val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalRecord);
                   // var total1 = commaSeparateNumber(result.moneyReponse[1].value);
                   // var total2 = commaSeparateNumber(result.moneyReponse[2].value);
                    //var total3 = commaSeparateNumber(result.moneyReponse[3].value);
                   // var total4 = commaSeparateNumber(result.moneyReponse[4].value);
                   // var total5 = commaSeparateNumber(result.moneyReponse[5].value);
                  //  var total6 = commaSeparateNumber(result.moneyReponse[6].value);
                   // var total7 = commaSeparateNumber(result.moneyReponse[7].value);
                  //  var total8 = commaSeparateNumber(result.moneyReponse[8].value);
                   // var total9 = commaSeparateNumber(result.moneyReponse[9].value);
                  //  var total10 = commaSeparateNumber(result.moneyReponse[10].value);
                    //var total13 = commaSeparateNumber(result.moneyReponse[11].value);
					//  var total16 = commaSeparateNumber(result.moneyReponse[12].value);
					//  var total17 = commaSeparateNumber(result.moneyReponse[13].value);
                  //  result1 += resultnhamang(total8, total9, total10, total13,total16,total17);
                 //   $('#logaction1').html(result1);
                 //   result2 += resultplatform(total1, total2, total3, total4,total5, total6, total7);
                  //  $('#logaction2').html(result2);
                    $('#summoney').html(totalmoney);
                 //   $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.referenceId, value.nickName, value.provider, value.partner, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.timelog);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/rechargebycardajax')?>",
                                  
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        provider: $("#select_provider").val(),
                                        serial: $("#txtserial").val(),
                                        mathe: $("#txtmathe").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        tranid: $("#magiaodich").val(),
										partner: $("#select_partner").val(),
                                        limit: $('#limit').val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.referenceId, value.nickName, value.provider, value.partner, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.timelog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: 60000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }

            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: 60000
        })

    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });


</script>


<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }


    function updatecard(referentid, nickname) {
        if (!confirm('Bạn chắc chắn muốn cập nhật thẻ ?')) {
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/updatecard')?>",
            data: {
                rid: referentid,
                nickname: nickname
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.errorCode == 0) {
                    $("#bsModal3").modal("show");
                    $("#statuspenđing").html("Bạn cập nhật thẻ thành công. Trạng thái  " + result.rechargeByCardMessage.message);
                } else if (result.errorCode == 1001) {
                    $("#bsModal4").modal("show");
                } else if (result.errorCode == 1036) {
                    $("#bsModal5").modal("show");
                } else if (result.errorCode == 1037) {
                    $("#bsModal6").modal("show");
                } else if (result.errorCode == 1038) {
                    $("#bsModal7").modal("show");
                } else if (result.errorCode == 1039) {
                    $("#bsModal8").modal("show");
                }
                else if (result.errorCode == 1040) {
                    $("#bsModal9").modal("show");
                }
                else if (result.errorCode == 1041) {
                    $("#bsModal10").modal("show");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#bsModal11").modal("show");
            }, timeout: 20000
        });


    }
</script>
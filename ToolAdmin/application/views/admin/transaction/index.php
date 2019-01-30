<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
        </div>
        <div class="clear"></div>
    </div>
</div>
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
<h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

<div class="title">
    <h6>Lịch sử giao dịch hệ thống</h6>
</div>
<form class="list_filter form" action="<?php echo admin_url('transaction') ?>" method="post">
<table>
    <tr>
        <td>
            <label for="param_name"
                   style="margin-top:30px;width: 100px">Từ ngày:</label></td>
        <td class="item">
            <div class="input-group date" id="datetimepicker1">
                <input type="text" id="toDate" name="toDate"
                       value="<?php echo $start_time ?>"> <span class="input-group-addon">
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
                <input type="text" id="fromDate" name="fromDate"
                       value="<?php echo $end_time ?>"> <span
                    class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
            </div>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td><label style="margin-left: 180px">Nick name:</label></td>
        <td><input type="text" style="margin-left: 20px;margin-top:30px;width: 150px"
                   id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
        <td><label style="margin-left: 105px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
        <td class="">
            <select id="money_type" name="money"
                    style="margin-left: -30px;margin-bottom:-2px;width: 143px">
                <option value="vin" <?php if ($this->input->post('money') == "vin") {
                    echo "selected";
                } ?>>Vin
                </option>
                <option value="xu" <?php if ($this->input->post('money') == "xu") {
                    echo "selected";
                } ?>>Xu
                </option>
            </select>
        </td>
		<td style="">
            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                   style="margin-left: 60px">
        </td>
        <td>
            <input type="reset"
                   onclick="window.location.href = '<?php echo admin_url('transaction') ?>'; "
                   value="Reset" class="basic" style="margin-left: 20px">
        </td>

    </tr>

</table>


<table>
    <tr>
        <td>
            <label for="param_name" style="width: 100px;margin-bottom:-3px;margin-left: 190px;margin-top: 30px"
                   class="formLeft">Dịch vụ: </label>
        </td>
        <td class="item">
		<select id="servicename" name="servicename"
                                 style="margin-left: -15px;margin-bottom:-2px;width: 142px">
                <option value="">Minigame</option>
                <option value="VQMM" <?php if ($this->input->post('servicename') == "VQMM") {
                    echo "selected";
                } ?>>------Quay VQMM
                </option>
                <option value="VQVIP" <?php if ($this->input->post('servicename') == "VQVIP") {
                    echo "selected";
                } ?>>------Quay VIP
                </option>
                <option value="TaiXiu" <?php if ($this->input->post('servicename') == "TaiXiu") {
                    echo "selected";
                } ?>>------Chơi game Tài Xỉu
                </option>
                <option value="MiniPoker" <?php if ($this->input->post('servicename') == "MiniPoker") {
                    echo "selected";
                } ?>>------Chơi game Mini Poker
                </option>
                <option value="CaoThap" <?php if ($this->input->post('servicename') == "CaoThap") {
                    echo "selected";
                } ?>>------Chơi game Cao Thấp
                </option>
                <option value="BauCua" <?php if ($this->input->post('servicename') == "BauCua") {
                    echo "selected";
                } ?>>------Chơi game Bầu Cua
                </option>
                <option value="">Slot</option>
                <option value="PokeGo" <?php if ($this->input->post('servicename') == "PokeGo") {
                    echo "selected";
                } ?>>------Quay Poke Go
                </option>
                <option value="KhoBau" <?php if ($this->input->post('servicename') == "KhoBau") {
                    echo "selected";
                } ?>>------Quay Kho Báu
                </option>
                <option value="SieuAnhHung" <?php if ($this->input->post('servicename') == "SieuAnhHung") {
                    echo "selected";
                } ?>>------Quay Avengers
                </option>
                <option value="MyNhanNgu" <?php if ($this->input->post('servicename') == "MyNhanNgu") {
                    echo "selected";
                } ?>>------Quay Mỹ Nhân Ngư
                </option>
                <option value="NuDiepVien" <?php if ($this->input->post('servicename') == "NuDiepVien") {
                    echo "selected";
                } ?>>------Quay Nữ Điệp Viên
                </option>
				 <option value="VuongQuocVin" <?php if ($this->input->post('servicename') == "VuongQuocVin") {
                    echo "selected";
                } ?>>------Quay Vương Quốc Vin
                </option>
                <option value="NuChienThan" <?php if ($this->input->post('servicename') == "NuChienThan") {
                    echo "selected";
                } ?>>------Quay Nữ Chiến Thần
                </option>
                <option value="DeCheLaMa" <?php if ($this->input->post('servicename') == "DeCheLaMa") {
                    echo "selected";
                } ?>>------Quay Đế Chế La Mã
                </option>
                <option value="">Dịch vụ khác</option>
                <option value="SafeMoney" <?php if ($this->input->post('servicename') == "SafeMoney") {
                    echo "selected";
                } ?>>------Két sắt
                </option>
                <option
                    value="CashOutByCard" <?php if ($this->input->post('servicename') == "CashOutByCard") {
                    echo "selected";
                } ?>>------Mua mã thẻ
                </option>
                <option
                    value="CashOutByTopUp" <?php if ($this->input->post('servicename') == "CashOutByTopUp") {
                    echo "selected";
                } ?>>------Nạp tiền điện thoại
                </option>
                <option
                    value="CashOutByBank" <?php if ($this->input->post('servicename') == "CashOutByBank") {
                    echo "selected";
                } ?>>------Chuyển khoản ngân hàng
                </option>
                <option
                    value="RechargeByCard" <?php if ($this->input->post('servicename') == "RechargeByCard") {
                    echo "selected";
                } ?>>------Nạp vin qua thẻ
                </option>
				<option
        value="RechargeByVinCard" <?php if ($this->input->post('servicename') == "RechargeByVinCard") {
        echo "selected";
    } ?>>------Nạp vin qua VinCard
    </option>
    <option
        value="RechargeByMegaCard" <?php if ($this->input->post('servicename') == "RechargeByMegaCard") {
        echo "selected";
    } ?>>------Nạp vin qua MegaCard
    </option>
                <option
                    value="RechargeByIAP" <?php if ($this->input->post('servicename') == "RechargeByIAP") {
                    echo "selected";
                } ?>>------Nạp vin qua IAP
                </option>
                <option
                    value="RechargeByBank" <?php if ($this->input->post('servicename') == "RechargeByBank") {
                    echo "selected";
                } ?>>------Nạp vin qua ngân hàng
                </option>
                <option
                    value="RechargeBySMS" <?php if ($this->input->post('servicename') == "RechargeBySMS") {
                    echo "selected";
                } ?>>------Nạp vin qua SMS
                </option>
                <option value="NapXu" <?php if ($this->input->post('servicename') == "NapXu") {
                    echo "selected";
                } ?>>------Nạp Xu
                </option>
                <option
                    value="TransferMoney" <?php if ($this->input->post('servicename') == "TransferMoney") {
                    echo "selected";
                } ?>>------Chuyển khoản
                </option>
                <option value="Admin" <?php if ($this->input->post('servicename') == "Admin") {
                    echo "selected";
                } ?>>------Admin
                </option>
                <option value="GiftCode" <?php if ($this->input->post('servicename') == "GiftCode") {
                    echo "selected";
                } ?>>------GiftCode
                </option>
                <option value="GiftCodeVH" <?php if ($this->input->post('servicename') == "GiftCodeVH") {
                    echo "selected";
                } ?>>------GiftCode vận hành
                </option>
                <option value="GiftCodeMKT" <?php if ($this->input->post('servicename') == "GiftCodeMKT") {
                    echo "selected";
                } ?>>------GiftCode marketing
                </option>
                <option value="GcAgent" <?php if ($this->input->post('servicename') == "GcAgent") {
                    echo "selected";
                } ?>>------GiftCode đại lý
                </option>
                <option value="CashoutByVP" <?php if ($this->input->post('servicename') == "CashoutByVP") {
                    echo "selected";
                } ?>>------Đổi thưởng vippoint
                </option>
                <option value="Bot" <?php if ($this->input->post('servicename') == "Bot") {
                    echo "selected";
                } ?>>------Bot
                </option>
                <option value="RefundFee" <?php if ($this->input->post('servicename') == "RefundFee") {
                    echo "selected";
                } ?>>------Hoàn trả phí đại lý
                </option>
                <option value="EventVPBonus" <?php if ($this->input->post('servicename') == "EventVPBonus") {
                    echo "selected";
                } ?>>------Vippoint Event
                </option>
				<option value="NhiemVu" <?php if ($this->input->post('servicename') == "NhiemVu") {
        echo "selected";
    } ?>>------Nhận thưởng nhiệm vụ
    </option>
                <option value="EventVP" <?php if ($this->input->post('servicename') == "EventVP") {
                    echo "selected";
                } ?>>------Trao thưởng Vippoint Event
                </option>
                <option value="BonusTopDS" <?php if ($this->input->post('servicename') == "BonusTopDS") {
                    echo "selected";
                } ?>>------Thường doanh số đại lý
                </option>
                <option value="ChargeSMS" <?php if ($this->input->post('servicename') == "ChargeSMS") {
                    echo "selected";
                } ?>>------Phí SMS đại lý
                </option>
                <option value="">Game bài</option>
                <option value="Sam" <?php if ($this->input->post('servicename') == "Sam") {
                    echo "selected";
                } ?>>------Chơi game Sâm
                </option>
                <option value="BaCay" <?php if ($this->input->post('servicename') == "BaCay") {
                    echo "selected";
                } ?>>------Chơi game Ba cây
                </option>
                <option value="Binh" <?php if ($this->input->post('servicename') == "Binh") {
                    echo "selected";
                } ?>>------Chơi game Binh
                </option>
                <option value="Tlmn" <?php if ($this->input->post('servicename') == "Tlmn") {
                    echo "selected";
                } ?>>------Chơi game TLMN
                </option>
                <option value="TaLa" <?php if ($this->input->post('servicename') == "TaLa") {
                    echo "selected";
                } ?>>------Chơi game Tá Lả
                </option>
                <option value="Lieng" <?php if ($this->input->post('servicename') == "Lieng") {
                    echo "selected";
                } ?>>------Chơi game Liêng
                </option>
                <option value="XiTo" <?php if ($this->input->post('servicename') == "XiTo") {
                    echo "selected";
                } ?>>------Chơi game Xì Tố
                </option>
                <option value="BaiCao" <?php if ($this->input->post('servicename') == "BaiCao") {
                    echo "selected";
                } ?>>------Chơi game Bài Cào
                </option>
                <option value="XocDia" <?php if ($this->input->post('servicename') == "XocDia") {
                    echo "selected";
                } ?>>------Chơi game Xóc Đĩa
                </option>
                <option value="Poker" <?php if ($this->input->post('servicename') == "Poker") {
                    echo "selected";
                } ?>>------Chơi game Poker
                </option>
				<option value="PokerTour" <?php if ($this->input->post('servicename') == "PokerTour") {
        echo "selected";
    } ?>>------Chơi game PokerTour
    </option>
				 <option value="XiDzach" <?php if ($this->input->post('servicename') == "XiDzach") {
                    echo "selected";
                } ?>>------Chơi game XiDzach
                </option>
				
				<option value="">Game Khác</option>
    <option value="HamCaMap" <?php if ($this->input->post('servicename') == "HamCaMap") {
        echo "selected";
    } ?>>------Chơi game hàm cá mập
    </option>
                <option value="ThanBien" <?php if ($this->input->post('servicename') == "ThanBien") {
                    echo "selected";
                } ?>>------Chơi game thần biển
                </option>
                <option value="">Game Cờ</option>
                <option value="Caro" <?php if ($this->input->post('servicename') == "Caro") {
                    echo "selected";
                } ?>>------Chơi game cờ caro
                </option>
				 <option value="CoTuong" <?php if ($this->input->post('servicename') == "CoTuong") {
                    echo "selected";
                } ?>>------Chơi game cờ Cờ tướng
                </option>
				 <option value="CoUp" <?php if ($this->input->post('servicename') == "CoUp") {
                    echo "selected";
                } ?>>------Chơi game cờ úp
                </option>
                <option value="">Lượt quay slot</option>
                <option value="KhoBauVqFree" <?php if ($this->input->post('servicename') == "KhoBauVqFree") {
                    echo "selected";
                } ?>>------Quay kho báu free
                </option>
                <option value="NuDiepVienVqFree" <?php if ($this->input->post('servicename') == "NuDiepVienVqFree") {
                    echo "selected";
                } ?>>------Quay nữ điệp viên free
                </option>
                <option value="SieuAnhHungVqFree" <?php if ($this->input->post('servicename') == "SieuAnhHungVqFree") {
                    echo "selected";
                } ?>>------Quay siêu anh hùng free
                

         </select>
        </td>
		<td>
        <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
               class="formLeft"> Hiển thị: </label>
    </td>
    <td class="item"><select id="record" name="record"
                             style="margin-left: 5px;margin-bottom:-2px;width: 150px">
            <option value="50" <?php if ($this->input->post('record') == 50) {
                echo "selected";
            } ?> >50
            </option>
            <option value="100" <?php if ($this->input->post('record') == 100) {
                echo "selected";
            } ?>>100
            </option>
            <option value="200" <?php if ($this->input->post('record') == 200) {
                echo "selected";
            } ?>>200
            </option>
            <option value="500" <?php if ($this->input->post('record') == 500) {
                echo "selected";
            } ?>>500
            </option>
            <option value="1000" <?php if ($this->input->post('record') == 1000) {
                echo "selected";
            } ?>>1000
            </option>
            <option value="2000" <?php if ($this->input->post('record') == 2000) {
                echo "selected";
            } ?>>2000
            </option>
            <option value="5000" <?php if ($this->input->post('record') == 5000) {
                echo "selected";
            } ?>>5000
            </option>
        </select>
    </td>
        
    </tr>
</table>
</form>
<div class="formRow"></div>
<table cellpadding="0" cellspacing="0" width="100%" class="tablesorter table table-bordered table-hover" id="checkAll">
    <thead>
    <tr style="height: 20px;">
        <th>STT</th>
        <th>Nick name</th>
        <th>Dịch vụ</th>
        <th>Hành động</th>
        <th class="col-sm-3" id="des">Mô tả</th>
        <th style="width:100px;">Số dư</th>
        <th>Tiền thay đổi</th>
        <th>Phế</th>
        <th>Ngày tạo</th>
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

<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<div class="text-center">
    <ul id="pagination-demo" class="pagination-sm"></ul>

</div>

<script src="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.css">
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
        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    function resultSearchTransction(stt, transactionTime, nickName, actionName, description, currentMoney, moneyExchange, serviceName, fee) {
        var rs = "";

        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickName + "</td>";

        rs += "<td>" + actionName + "</td>";
        rs += "<td>" + serviceName + "</td>";
        if (actionName != "CashOutByCard") {
            rs += "<td>" + description + "</td>";
        }else{
            rs += "<td></td>";
        }
        rs += "<td>" + currentMoney + "</td>";
        rs += "<td>" + moneyExchange + "</td>";
        rs += "<td>" + fee + "</td>";
        rs += "<td>" + transactionTime + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		    $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
   $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";

        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/indexajax')?>",
           
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#money_type").val(),
                servicename: $("#servicename").val(),
                action_name: $("#action_name").val(),
                pages: 1,
                timkiemtheo: $("#timkiemtheo").val(),
				 record : $("#record").val()
            },

            dataType: 'json',
			cache : true,
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
					 $("#resultsearch").html("");
                    var totalPage = result.totalPages;
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.transactionTime, value.nickName, value.actionName, value.description, commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName, commaSeparateNumber(value.fee));
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
						"retrieve": true,
                        "ordering": true,
                        "searching": false,
                        "paging": false,
                        "draw": false
                    });

                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                               // table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/indexajax')?>",
                                   
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#money_type").val(),
                                        servicename: $("#servicename").val(),
                                        action_name: $("#action_name").val(),
                                        pages: page,
                                        timkiemtheo: $("#timkiemtheo").val(),
										 record : $("#record").val()
                                    },
                                    dataType: 'json',
									cache : true,
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.transactionTime, value.nickName, value.actionName, value.description, commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName, commaSeparateNumber(value.fee));
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
											"retrieve": true,
                                            "ordering": true,
                                            "searching": false,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 45000,
			 statusCode: {
                                        502: function () {
                                            $("#spinner").hide();
                                            $('#logaction').html("");
                                            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                        }
                                    }
                                });
                            }
                            oldPage = page;
                        }
                    });
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 45000,
			 statusCode: {
                                        502: function () {
                                            $("#spinner").hide();
                                            $('#logaction').html("");
                                            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                        }
                                    }
        })

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

    function commaSeparateNumber1(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ' ' + '$2');
        }
        return val;
    }
</script>
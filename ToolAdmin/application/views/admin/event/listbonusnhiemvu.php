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
    <?php $this->load->view('admin/error')?>
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
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

        <div class="title">
            <h6>Danh sách nhận thưởng nhiệm vụ</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('event/listbonusnhiemvu') ?>" method="post">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate"
                                       value="<?php echo $start_time; ?>"> <span class="input-group-addon">
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
                                       value="<?php echo $end_time; ?>"> <span class="input-group-addon">
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
                                   id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                        </td>


                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Tên game: </label>
                        </td>
                        <td class="item"><select id="sl-gamname" name="sl-gamname"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option value="" selected >Tất cả</option>
                                <option value="" <?php if ($this->input->post('sl-gamname') == "") {
                                    echo "selected";
                                } ?> >Minigame && Slot
                                </option>
                                <option value="TaiXiu" <?php if ($this->input->post('sl-gamname') == "TaiXiu") {
                                    echo "selected";
                                } ?> >------Tài Xỉu
                                </option>
                                <option value="KhoBau" <?php if ($this->input->post('sl-gamname') == "KhoBau") {
                                    echo "selected";
                                } ?> >------Kho Báu
                                </option>
                                <option
                                    value="SieuAnhHung" <?php if ($this->input->post('sl-gamname') == "SieuAnhHung") {
                                    echo "selected";
                                } ?> >------Siêu Anh Hùng
                                </option>
                                <option
                                    value="MyNhanNgu" <?php if ($this->input->post('sl-gamname') == "MyNhanNgu") {
                                    echo "selected";
                                } ?> >------Mỹ Nhân Ngư
                                </option>
                                <option
                                    value="NuDiepVien" <?php if ($this->input->post('sl-gamname') == "NuDiepVien") {
                                    echo "selected";
                                } ?> >------Nữ Điệp Viên
                                </option>
                                <option
                                    value="VuongQuocVin" <?php if ($this->input->post('sl-gamname') == "VuongQuocVin") {
                                    echo "selected";
                                } ?> >------Vương Quốc Vin
                                </option>
                                <option value="" <?php if ($this->input->post('sl-gamname') == "") {
                                    echo "selected";
                                } ?> >Game bài
                                </option>
                                <option value="Sam" <?php if ($this->input->post('sl-gamname') == "Sam") {
                                    echo "selected";
                                } ?> >------Sâm
                                </option>
                                <option value="BaCay " <?php if ($this->input->post('sl-gamname') == "BaCay ") {
                                    echo "selected";
                                } ?> >------Ba Cây
                                </option>
                                <option value="Binh" <?php if ($this->input->post('sl-gamname') == "Binh") {
                                    echo "selected";
                                } ?> >------Binh
                                </option>
                                <option value="Tlmn" <?php if ($this->input->post('sl-gamname') == "Tlmn") {
                                    echo "selected";
                                } ?> >------Tiến lên
                                </option>
                                <option value="Lieng" <?php if ($this->input->post('sl-gamname') == "Lieng") {
                                    echo "selected";
                                } ?> >------Liêng
                                </option>
                                <option value="BaiCao" <?php if ($this->input->post('sl-gamname') == "BaiCao") {
                                    echo "selected";
                                } ?> >------Bài Cào
                                </option>
                                <option value="XocDia" <?php if ($this->input->post('sl-gamname') == "XocDia") {
                                    echo "selected";
                                } ?> >------Xóc Đĩa
                                </option>
                                <option value="Poker" <?php if ($this->input->post('sl-gamname') == "Poker") {
                                    echo "selected";
                                } ?> >------Poker
                                </option>
                                <option value="XiDzach" <?php if ($this->input->post('sl-gamname') == "XiDzach") {
                                    echo "selected";
                                } ?> >------XiDzach
                                </option>

                            </select>
                        </td>


                    </tr>

                </table>

            </div>
            <div class="formRow">

                <table>
                    <tr>
                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Loại tiền: </label>
                        </td>
                        <td class="item"><select id="sl-moneytype" name="sl-moneytype"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option value="" <?php if ($this->input->post('sl-moneytype') == "") {
                                    echo "selected";
                                } ?> >Tất cả
                                </option>
                                <option value="vin" <?php if ($this->input->post('sl-moneytype') == "vin") {
                                    echo "selected";
                                } ?> >Vin
                                </option>
                                <option value="xu" <?php if ($this->input->post('sl-moneytype') == "xu") {
                                    echo "selected";
                                } ?> >Xu
                                </option>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 123px">
                        </td>

                    </tr>
                </table>
            </div>
        </form>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>STT</td>
                <td>User Id</td>
                <td>Nickname</td>
                <td>Tên game</td>
                <td>Cấp độ nhận thưởng</td>
                <td>Tiền thưởng</td>
                <td>Tiền User</td>
                <td>Loại tiền</td>
                <td>Thời gian</td>
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
        <ul id="pagination-demo" class="pagination-sm"></ul>
    </div>

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
    function resultSearchTransction(stt, userid, nickname, gamename, level, moneybonus, moneyuser, moneytype,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + userid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + gamename + "</td>";
        rs += "<td>" + level + "</td>";
        rs += "<td>" + commaSeparateNumber(moneybonus) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyuser) + "</td>";
        rs += "<td>" + moneytype + "</td>";
        rs += "<td>" + date + "</td>";
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
            url: "<?php echo admin_url('event/listbonusnhiemvuajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#sl-moneytype").val(),
                gamename: $("#sl-gamname").val(),
                pages: 1
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


                     stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.userId, value.nickName, value.gameName, value.levelReceivedReward, value.moneyBonus, value.moneyUser, value.moneyType,value.timeLog);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
						"retrieve": true,
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                               // table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('event/listbonusnhiemvuajax')?>",

                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#sl-moneytype").val(),
                                        gamename: $("#sl-gamname").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.userId, value.nickName, value.gameName, value.levelReceivedReward, value.moneyBonus, value.moneyUser, value.moneyType,value.timeLog);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
											"retrieve": true,
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#error-popup").modal("show");

                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#error-popup").modal("show");


            }, timeout: timeOutApi
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
</script>
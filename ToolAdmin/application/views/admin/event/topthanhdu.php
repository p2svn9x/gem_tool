
<?php $this->load->view('admin/logminigame/head', $this->data) ?>
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
                <h6>Top thánh dự</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('logminigame') ?>" method="post">
                <div class="formRow">

                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tháng:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="txtmonth" name="txtmonth"
                                           value="<?php echo $month ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>


                            </td>

                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft">Ngày: </label>
                            </td>
                            <td class="item">

                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" id="txtday" name="txtday"
                                           value="<?php echo $day ?>"> <span
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
                            <td>
                                <label for="param_name" style="width: 100px;margin-bottom:-3px;margin-left: 23px;"
                                       class="formLeft">Loại: </label>
                            </td>
                            <td><select id="top" name="top"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="1" <?php if ($this->input->post('top') == "1") {
                                        echo "selected";
                                    } ?>>BXH ngày
                                    </option>
                                    <option value="0" <?php if ($this->input->post('top') == "0") {
                                        echo "selected";
                                    } ?>>BXH chung cuộc
                                    </option>
                                </select></td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Top:</label></td>
                            <td class="">
                                <select id="toptype" name="toptype"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="1" <?php if ($this->input->post('toptype') == "1") {
                                        echo "selected";
                                    } ?>>Thắng
                                    </option>
                                    <option value="0" <?php if ($this->input->post('toptype') == "0") {
                                        echo "selected";
                                    } ?>>Thua
                                    </option>
                                </select>
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Số dòng 1 trang:</label></td>
                            <td>
                                <input type="text" id="limit" placeholder="" value="10">
                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
            <div class="formRow"></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td><div style="width: 80px"><input type="checkbox" id="checkall" />&nbsp;<button type="button" class="btn btn-sm btn-danger" id="deleteManyBtn">Xóa</button></div></td>
                    <td>STT</td>
                    <td>Tài khoản</td>
                    <td>Số ván</td>
                    <td>Thắng(thua)</td>
                    <td>Phiên</td>
                    <td>Giải thưởng</td>
                    <td>Thao tác</td>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
            </table>
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
<script>

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#checkall').click(function() {
            if($(this).is(':checked')) $('.checkitem').prop('checked', true);
            else $('.checkitem').prop('checked', false);
        });

        $('#deleteManyBtn').click(function () {
            var ids = '';
            $('.checkitem:checked').each(function () {
                if(ids != '') ids += ',';
                ids += $(this).val();
            });
            if(ids == ''){
                alert('Vui lòng chọn ít nhất 1 dòng'); return false;
            }
            deleteThanhDu(ids);
        })

    });
    function resultSearchtaixiu(stt, nickname, van, money, phien,prize,id) {
        var rs = "";
        rs += "<tr>";
        rs += "<td><input type='checkbox' class='checkitem' value='"+id+"' /></td>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + van+ "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + phien + "</td>";
        rs += "<td>" + prize + "</td>";
        rs += "<td><button onclick='deleteThanhDu("+id+")' class='btn btn-sm btn-danger'>Xóa</button></td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
    });
    $("#search_tran").click(function () {
        var result = "";
        var oldPage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/topthanhduajax')?>",
            data: {
                month: $("#txtmonth").val(),
                day: $("#txtday").val(),
                type: $("#toptype").val(),
                top: $("#top").val(),
                limit: $("#limit").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.results == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    var stt = 1;
                    $.each(result.results, function (index, value) {
                        result += resultSearchtaixiu(stt, value.username, value.number, value.totalMoney, value.referenceId,value.prize, value.id);
                        stt ++;
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
                                    url: "<?php echo admin_url('event/topthanhduajax')?>",
                                    data: {
                                        month: $("#txtmonth").val(),
                                        day: $("#txtday").val(),
                                        type: $("#toptype").val(),
                                        top: $("#top").val(),
                                        limit: $("#limit").val(),
                                        pages : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        var stt = 1+$("#limit").val()*(page-1);
                                        $.each(result.results, function (index, value) {
                                            var prize = page > 1 ? "" : value.prize;
                                            result += resultSearchtaixiu(stt, value.username, value.number, value.totalMoney, value.referenceId,prize, value.id);
                                            stt++;
//                                            result += resultSearchtaixiu(value.referenceId, value.user_name, value.bet_value, value.bet_side, value.total_prize, value.total_refund, value.total_exchange, value.time_log, value.money_type)
                                        });
                                        $('#logaction').html(result);

                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    },timeout : 20000
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
            }, timeout: 20000
        })

    });

    function deleteThanhDu(ids) {
        if(!confirm('Bạn muốn xóa?')) return false;
        $("#spinner").show();
        $.post('<?php echo admin_url('event/deletethanhduajax')?>', {
            ids: ids
        }, function (re) {
            $("#spinner").hide();
            if(re.success){
                $("#resultsearch").html("Xóa thành công! Reload...");
                $("#search_tran").trigger('click');
            }else{
                $("#resultsearch").html("Xóa thất bại!");
            }
        },'json')
    }
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>




<?php $this->load->view('admin/giftcode/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Thống kê giftcode</h6>

        </div>
        <div class="formRow">
            <form class="list_filter form" action="" method="get">
                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 60px">Nick name:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name"></td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
                        <td class="">
                            <select id="money" name="money"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                                <option value="1">Vin</option>
                                <option value="0">Xu</option>
                            </select>
                        </td>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item"><input name="created"
                                                value="<?php echo $this->input->get('created') ?>"
                                                id="toDate" type="text" class="datepicker"/></td>
                        <td>
                            <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                   class="formLeft"> Đến ngày: </label>
                        </td>
                        <td class="item"><input name="created_to"
                                                value="<?php echo $this->input->get('created_to') ?>"
                                                id="fromDate" type="text" class="datepicker-input"/></td>
                        <input type="hidden" value="<?php echo $source ?>" id="nguonxuat">
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 20px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('giftcode/usergiftcode') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Nick name</td>
                <td>Giftcode</td>
                <td>Nguồn</td>
                <td>A1</td>
                <td>A5</td>
                <td>A30</td>
                <td>Doanh thu</td>
                <td>Phế</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>
    </div>
</div>
<div class="pagination">
    <div id="pagination"></div>
</div>
<h1 id="resultsearch" style="position: absolute;top: 50%;left: 50%"></h1>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/ajax-loader.gif') ?>" alt="Loading"/>
</div>
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
<script>
    $("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#toDate").datepicker('setDate', new Date());
    $("#fromDate").datepicker('setDate', new Date());
    $("#search_tran").click(function () {
        var from = $("#fromDate").datepicker('getDate');
        var to = $("#toDate").datepicker('getDate');
        if (to > from) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });

    $("#search_tran").click(function () {
        $("#spinner").bind("ajaxSend", function () {
            $(this).show();
        }).bind("ajaxStop", function () {
            $(this).hide();
        }).bind("ajaxError", function () {
            $(this).hide();
        });
            $.ajax({
                type: "POST",
                url: "http://192.168.0.105:8082/api_backend",
                data: {
                    c: 305,
                    nn: $("#filter_iname").val(),
                    ts: $("#toDate").val(),
                    te: $("#fromDate").val(),
                    mt: $("#money").val(),
                    gs: $("#nguonxuat").val(),
                    p: 1
                },
                dataType: 'json',
                success: function (result) {
                    $.each(result, function (index, value) {
                        if(value.giftCodeUse == ""){
                            $("#resultsearch").html("Không tìm thấy kết quả");
                            $('#logaction').html("");
                        }else{
                            $("#resultsearch").html("");
                            var source = value.giftCodeSource.split(",");
                            var giftcode = value.giftCodeUse.split(",");
                            var obj = jQuery.parseJSON( value.loginDay);
                            for(i=0; i < giftcode.length-1 ;i++) {
                                result += resultgiftcodevin(value.nickName, giftcode[i], source[i], obj.A1, obj.A2, obj.A3, value.totalMoney, value.fee)
                            }
                            $('#logaction').html(result);
                        }
                    });
                }
            })
    });
    function resultgiftcodevin(nickname,giftcode,source,a1,a5,a30,totalmoney,fee) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + giftcode + "</td>";
        rs += "<td>" + source + "</td>";
        rs += "<td>" + a1 + "</td>";
        rs += "<td>" + a5 + "</td>";
        rs += "<td>" + a30 + "</td>";
        rs += "<td>" + totalmoney + "</td>";
        rs += "<td>" + fee + "</td>";
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
</script>
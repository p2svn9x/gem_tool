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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
        <div class="widget">
            <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

            <div class="title">
                <h6>Lịch sử user vippoint event</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('event/uservippoint') ?>" method="post">
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $this->input->post('toDate'); ?>"> <span
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
                                    <input type="text" id="fromDate" name="fromDate"
                                           value="<?php echo $this->input->post('fromDate'); ?>"> <span
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
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>
                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Sắp xếp:</label></td>
                            <td><select id="sort" name="sort" style="margin-bottom:-2px;width: 160px">
                                    <option value="" <?php if ($this->input->post('sort') == "") {
                                        echo "selected";
                                    } ?>>Sắp xếp
                                    </option>
                                    <option value="2" <?php if ($this->input->post('sort') == "2") {
                                        echo "selected";
                                    } ?>>Giảm dần
                                    </option>
                                    <option value="1" <?php if ($this->input->post('sort') == "1") {
                                        echo "selected";
                                    } ?>>Tăng dần
                                    </option>

                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Trường:</label></td>
                            <td class="lstcheckbox">
                                <input type="checkbox" value="1" name="chklist" id="filed_0"> <span style="padding-left: 10px;">Vippoint</span>
                                <input type="checkbox" value="2"  name="chklist" id="filed_1"><span style="padding-left: 10px;">VP Event</span>
                                <input type="checkbox" value="3" name="chklist" id="filed_2"><span
                                    style="padding-left: 10px;">VP Được cộng</span>
                                <input type="checkbox" value="4"  name="chklist" id="filed_3"><span style="padding-left: 10px;">Số lần cộng</span>
                                <input type="checkbox" value="5"  name="chklist" id="filed_4"><span
                                    style="padding-left: 10px;">VP bị trừ</span>
                                <input type="checkbox" value="6"  name="chklist" id="filed_5"><span style="padding-left: 10px;">Số lần trừ</span>
                                <input type="checkbox" value="7"  name="chklist" id="filed_6"><span
                                    style="padding-left: 10px;">Cứ điểm</span>
                                <input type="checkbox" value="8"  name="chklist" id="filed_7"><span style="padding-left: 10px;">Cứ điểm max</span>
                                <input type="hidden" value="<?php echo $this->input->post('field'); ?>" id="field" name="field"   >
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">

                    <table>
                        <tr>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tài khoản:</label></td>
                            <td><select id="select_acc" name="select_acc" style="margin-bottom:-2px;width: 160px">
                                    <option value="" <?php if ($this->input->post('select_acc') == "") {
                                        echo "selected";
                                    } ?>>Tất cả
                                    </option>
                                    <option value="0" <?php if ($this->input->post('select_acc') == "0") {
                                        echo "selected";
                                    } ?>>Tài khoản thường
                                    </option>
                                    <option value="1" <?php if ($this->input->post('select_acc') == "1") {
                                        echo "selected";
                                    } ?>>Tài khoản bot
                                    </option>

                                </select>
                            </td>
                            <td style="">
                                <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('event/uservippoint') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
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
                    <div class="col-sm-2">
                        <h5>Tổng số bản ghi:<span style="color: #0000ff" id="sumrecord"></span></h5>
                    </div>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Nick name</td>
                    <td>Vippoint </td>
                    <td>VP Event</td>
                    <td>VP được cộng</td>
                    <td>Số lần cộng</td>
                    <td>VP bị trừ</td>
                    <td>Số lần trừ</td>
                    <td>Cứ điểm</td>
                    <td>Cứ điểm Max</td>
                    <td>Tài khoản</td>
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
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
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
        var lst=''
        $.each($("input[name='chklist']:checked"), function(){
            lst+= $(this).val()+",";
        });
        $("#field").val(lst);
        var data = $("#field").val();
        var field= data.split(",");
        var checkboxes = $('input:checkbox[name="chklist"]');

        for (var j = 0; j < field.length; j++){
            checkboxes
                .filter('[value="'+field[j]+'"]')
                .attr("checked","checked");
        }
    });
    function resultSearchTransction(stt, nickname, vpReal,vpEvent,vpAdd,numAdd,vpSub,numSub,place,placeMax,isbot,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(vpReal)+ "</td>";
        rs += "<td>" + commaSeparateNumber(vpEvent)  + "</td>";
        rs += "<td>" + commaSeparateNumber(vpAdd)  + "</td>";
        rs += "<td>" + commaSeparateNumber(numAdd) + "</td>";
        rs += "<td>" + commaSeparateNumber(vpSub) + "</td>";
        rs += "<td>" + commaSeparateNumber(numSub)  + "</td>";
        rs += "<td>" + commaSeparateNumber(place)  + "</td>";
        rs += "<td>" + commaSeparateNumber(placeMax) + "</td>";
        if(isbot == 0){
            rs += "<td>" + "Tài khoản thường" + "</td>";
        }else if(isbot == 1){
            rs += "<td>" + "Tài khoản bot" + "</td>";
        }

        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        //check box
        var data = $("#field").val();
        var field= data.split(",");
        var checkboxes = $('input:checkbox[name="chklist"]');

        for (var j = 0; j < field.length; j++){
            checkboxes
                .filter('[value="'+field[j]+'"]')
                .attr("checked","checked");
        }
        ///
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/uservippointajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                sort: $("#sort").val(),
                field: $("#field").val(),
                account : $("#select_acc").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    var totalPage = result.total;
                    var totalrecord = commaSeparateNumber(result.totalRecord);

                    $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nickName, value.vp_real, value.vp_event,value.vp_add,value.num_add,value.vp_sub,value.num_sub,value.place,value.placemax,value.is_bot,value.updateTime);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('event/uservippointajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        sort: $("#sort").val(),
                                        field: $("#field").val(),
                                        account : $("#select_acc").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nickName, value.vp_real, value.vp_event,value.vp_add,value.num_add,value.vp_sub,value.num_sub,value.place,value.placemax,value.is_bot, value.updateTime);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }
                                });
                            }
                            oldPage = page;
                        }
                    });
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
</script>
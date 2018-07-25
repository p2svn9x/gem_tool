<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Log vòng quay may mắn</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>

            </ul>
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

        <form class="list_filter form" action="<?php echo admin_url('logminigame/logvqmm') ?>" method="post">
            <table>
                <tr>
                    <td>
                        <label for="param_name"
                               style="margin-top:30px;width: 100px;margin-left: 48px">Từ ngày:</label></td>
                    <td class="item">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" id="toDate" name="toDate"
                                   value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
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
                                   value="<?php echo $this->input->post('fromDate') ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><label style="margin-left: 50px">Nick name:</label></td>
                    <td><input type="text" style="margin-left: 20px;margin-top:30px;width: 150px"
                               id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>

                    <td style="">
                        <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                               style="margin-left: 60px">
                    </td>
                </tr>

            </table>

        </form>
        <div class="formRow"></div>
        <table cellpadding="0" cellspacing="0" width="100%" class="tablesorter table table-bordered table-hover"
               id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <th>STT</th>
                <th data-toggle="true">
                    Mã giao dịch
                </th>

                <th>
                    Nick name
                </th>
                <th>
                    Giải vòng quay vin
                </th>
                <th>
                    Giải vòng quay xu
                </th>
                <th>
                    Giải vòng quay slot
                </th>
                <th>
                    Mô tả
                </th>
                <th>
                    Ngày tạo
                </th>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>
    </div>
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-sm"></ul>

    </div>
</div>
<?php endif;?>
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

    });


    function resultSearchVQMM(stt,tranid, nickname, resultvin, resultxu,resultslot,description,trantime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + tranid + "</td>";
        rs += "<td>" + nickname + "</td>";
        if(resultvin == "fail"){
            rs += "<td>" + "Trượt rồi" + "</td>";
        }else{
            rs += "<td>" + commaSeparateNumber(resultvin) + "</td>";
        }
        if(resultxu == "fail"){
            rs += "<td>" + "Trượt rồi" + "</td>";
        }else{
            rs += "<td id='filter_in'>" + commaSeparateNumber(resultxu) + "</td>";
        }
        if(resultslot == "fail"){
            rs += "<td>" + "Trượt rồi" + "</td>";
        }else{
        rs += "<td id='filter_in'>" + resultslot + "</td>";
        }
        rs += "<td>" + description + "</td>";
        rs += "<td>" + trantime + "</td>";
        rs += "</tr>";
        return rs;
    }


    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
     $(document).ready(function () {
		   $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	 })
    $("#search_tran").click(function () {
        var result = "";
        var oldPage = 0;

        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/logvqmmajax') ?>",
            data: {
                nickname: $("#filter_iname").val(),
                pages : 1,
                todate : $("#toDate").val(),
                fromdate : $("#fromDate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
				
				 if (result.transactions == "") {
                     $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
				
                } else {
					$('#pagination-demo').css("display", "block");
					$("#resultsearch").html("");
					var totalpage = result.total;
					stt = 1;
                $.each(result.transactions, function (index, value) {
                    result += resultSearchVQMM(stt,value.tran_id, value.nick_name,value.result_vin,value.result_xu,value.result_slot,value.description,value.trans_time);
                    stt ++;
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

                    totalPages: totalpage,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        if (oldPage > 0) {
                            $("#spinner").show();
                          //  table.destroy();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo admin_url('logminigame/logvqmmajax') ?>",
                                data: {
                                    nickname: $("#filter_iname").val(),
                                    pages : page,
                                    todate : $("#toDate").val(),
                                    fromdate : $("#fromDate").val()
                                },
                                dataType: 'json',
                                cache: true,
                                success: function (result) {
                                    $("#resultsearch").html("");
                                    $("#spinner").hide();
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resultSearchVQMM(stt,value.tran_id, value.nick_name,value.result_vin,value.result_xu,value.result_slot,value.description,value.trans_time);
                                        stt ++;
                                    });
                                    $('#logaction').html(result);
									
                                    table = $('#checkAll').DataTable({
										"retrieve": true,
                                        "ordering": true,
                                        "searching": false,
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
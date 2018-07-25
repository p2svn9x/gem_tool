<?php $this->load->view('admin/marketing/head', $this->data) ?>
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/admin/css/simplePagination.css" media="screen"/>
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
		<?php $this->load->view('admin/error')?>
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
        <div class="title">
            <h6>Danh sách campaign</h6>
            <div style="float: right">
            <h6>Tổng NRU:<span id="nru" style="color: red"></span> </h6>
            <h6>Tổng PU:<span id = "pu" style="color: red"></span> </h6>
            <h6>Tổng doanh thu:<span id="doanhthu" style="color: red"></span> </h6>
            </div>
        </div>

        <form class="list_filter form" action="<?php echo admin_url('marketing/listcampaing') ?>" method="post">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate" value="<?php echo $start_time; ?>"> <span class="input-group-addon">
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
                                <input type="text" id="fromDate" name="fromDate"  value="<?php echo $end_time; ?>"> <span class="input-group-addon">
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
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Campaign:</label></td>
                        <td class="">
                            <select id="utmcampaign" name="utmcampaign"  style="margin-left: 0px;margin-bottom:-2px;width: 143px"
                                    value="<?php echo $this->input->get('utmcampaign') ?>">
                                <option value="">All</option>
                                <?php foreach ($utm_campain as $row): ?>
                                    <option
                                        value="<?php echo $row->name ?>"><?php echo $row->name_display ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Source:</label></td>
                        <td class="">
                            <select id="utmsource" name="utmsource"   style="margin-left: 0px;margin-bottom:-2px;width: 143px"
                                    value="<?php echo $this->input->get('utmsource') ?>">
                                <option value="">All</option>
                                <?php foreach ($utm_source as $row): ?>
                                    <option
                                        value="<?php echo $row->name ?>"><?php echo $row->name_display ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                    </tr>

                </table>

            </div>

            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" style="width: 100px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Medium: </label>
                        </td>
                        <td class="item">
                            <select id="utmmedium" name="utmmedium"  style="margin-left: 5px;margin-bottom:-2px;width: 150px"
                                    value="<?php echo $this->input->get('utmmedium') ?>">
                                <option value="">All</option>
                                <?php foreach ($utm_medium as $row): ?>
                                    <option
                                        value="<?php echo $row->name ?>"><?php echo $row->name_display ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 123px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('marketing/listcampaing') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover" id="checkAll">
            <tbody>
            <tr style="height: 20px;">
                <td>STT</td>
                <td>Campain</td>
                <td>Medium</td>
                <td>Source</td>
                <td style="width:100px;">NRU</td>
                <td>PU</td>
                <td>Doanh thu</td>
                <td>Thời gian</td>
            </tr>
            </tbody>
            <tbody id="logaction">
            </tbody>
            <tbody><tr id="totalmar">
                <td colspan="4">Tổng:</td>

                <td class="rowDataSd" id="totalnru" style="color: red"></td>
                <td class="rowDataSd" id="totalpu" style="color:red "></td>
                <td class="rowDataSd" id="totaldt" style="color: red"></td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<div class="text-center">
    <ul id="pagination-demo" class="pagination-sm"></ul>
</div>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>

<style>.spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align:center;
        z-index:1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
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

    function resultSearchTransction(stt, campain, medium, source, nru, pu, doanhthu,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + campain + "</td>";
        rs += "<td>" + medium + "</td>";
        rs += "<td>" + source + "</td>";
        rs += "<td class='rowDataSd1'>" + nru + "</td>";
        rs += "<td class='rowDataSd2'>" + pu + "</td>";
        rs += "<td class='rowDataSd3'>" + doanhthu + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/listcampaingajax')?>",
            // url: "http://192.168.0.251:8082/api_backend",
            data: {
                utm_campaign: $("#utmcampaign").val(),
                utm_medium: $("#utmmedium").val(),
                utm_source: $("#utmsource").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $('#logaction').html("");
                    $("#totalnru").text("");
                    $("#nru").text("");
                    $("#totalpu").text("");
                    $("#pu").text("");
                    $("#totaldt").text("");
                    $("#doanhthu").text("");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                }else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.campaign, value.medium, value.source, value.NRU, commaSeparateNumber(value.PU), commaSeparateNumber(value.doanhthu),value.dateStr);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var total=0;
                    var total1=0;
                    var total2=0;
                    $(".rowDataSd1" ).each(function( index ) {
                        total +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalnru").text(commaSeparateNumber(total));
                        $("#nru").text(commaSeparateNumber(total));
                    });
                    $(".rowDataSd2" ).each(function( index ) {
                        total1 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalpu").text(commaSeparateNumber(total1));
                        $("#pu").text(commaSeparateNumber(total1));
                    });
                    $(".rowDataSd3" ).each(function( index ) {
                        total2 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totaldt").text(commaSeparateNumber(total2));
                        $("#doanhthu").text(commaSeparateNumber(total2));
                    });
                }
            }, error: function () {
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
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

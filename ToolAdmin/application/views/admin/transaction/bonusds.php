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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url()?>/js/jquery.twbsPagination.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url()?>/js/jquery.simplePagination.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo public_url()?>/admin/css/simplePagination.css" media="screen" />
        <div class="widget">
            <h5 id="resultsearch"style="color: red;margin-left: 20px"></h5>
            <div class="title">
                <h6>Thưởng doanh số</h6>
            </div>
            <form class="list_filter form">
                <div class="formRow">

                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tháng:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>


                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('transaction/refundfee') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
                            </td>


                        </tr>

                    </table>

                </div>
            </form>
            <div class="formRow"></div>
            <div id="spinner" class="spinner" style="display:none;">
                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
            </div>
            <table  width="100%" class="table table-bordered"id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>Nickname</td>
                                        <td>Top</td>
                                        <td>Doanh số</td>
                                        <td>Thưởng cố định</td>
                                        <td>Thưởng DS</td>
                    <!--                    <td>Top C2</td>-->
                    <!--                    <td>Doanh số C2</td>-->
                    <!--                    <td>Thưởng cố định C2</td>-->
                    <!--                    <td>Thưởng DS C2</td>-->
                    <td>Top bán</td>
                    <td>Doanh số bán</td>
                    <td>Thưởng cố định bán</td>
                    <td>Thưởng DS bán</td>

                    <td>Tổng</td>
                    <td>Tháng</td>
                    <td>Code</td>
                    <td>Mô tả</td>
                    <td>Thời gian</td>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
                <tbody id="logactionsum">

                </tbody>
            </table>
        </div>
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">SUCCESS</p>
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
                        <p style="color:red">ERROR</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                               aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<style>
    td{
        word-break: break-all;
    }
    thead{
        font-size: 12px;
    }
    .spinner {
        position: fixed;
        top: 80%;
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

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'MM/YYYY'
        });
        var startdate = moment().subtract(-30, "days").format("DD-MM-YYYY");
        console.log(startdate);
    });
    $("#search_tran").click(function () {
        loadResult();
    });

    function loadResult() {
        var total1=0;
        var total2=0;
        var total3=0;
        var total4=0;
        var total5=0;
        var total6=0;
        var total7=0;
        var total8=0;
        var total9=0;
        var total10=0;
        var total11=0;
        var total12=0;
        $("#spinner").show();
        var res = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/bonusdsajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if(result.length == 0){
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                }else{
                    $("#resultsearch").html("");
                    $.each(result, function (index, value) {
                        res += resultSearchTransction(value.top, value.nickname, value.ds, value.bonusFix, value.bonusMore, value.bonusVinCash,value.bonusVinplayCard, value.bonusTotal, value.month, value.code,value.description,value.timeLog,value.percent,value.ds2,value.top2,value.bonusFix2,value.bonusMore2, value.dsBan, value.topBan, value.bonusFixBan, value.bonusMoreBan);
                        total1 += value.ds;
                        total2 += value.ds2;
                        total3 += value.bonusFix;
                        total4 += value.bonusFix2;
                        total5 += value.bonusMore;
                        total6 += value.bonusMore2;
                        total7 += value.bonusVinCash;
                        total8 += value.bonusVinplayCard;
                        total9 += value.bonusTotal;
                        total10 += value.dsBan;
                        total11 += value.bonusFixBan;
                        total12 += value.bonusMoreBan;
                    });

                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,total2,total3,total4,total5,total6,total7,total8,total9, total10, total11, total12));
                    //console.log(resultSumTransaction(total1,total2,total3,total4,total5,total6,total7,total8,total9));

                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $('#logactionsum').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 40000
        })
    }

    $(document).ready(function () {
        $("#toDate").val( moment().subtract('month', 1).format('MM/YYYY'));
        loadResult();
    });

    function resultSearchTransction(top,nickname, doanhso, bonusfix, bonusmore,bonusvin,bonusvincard, bonustotal, month,code,description,datetime,percent,ds2,top2,bonusfix2,bonusmore2, doanhsoBan, topBan, bonusfixBan, bonusmoreBan) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + top + "</td>";
        rs += "<td>" + commaSeparateNumber(doanhso) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusfix) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusmore) + "</td>";
//        rs += "<td>" + top2 + "</td>";
//        rs += "<td>" + commaSeparateNumber(ds2) + "</td>";
//        rs += "<td>" + commaSeparateNumber(bonusfix2) + "</td>";
//        rs += "<td>" + commaSeparateNumber(bonusmore2) + "</td>";

        rs += "<td>" + topBan + "</td>";
        rs += "<td>" + commaSeparateNumber(doanhsoBan) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusfixBan) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusmoreBan) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonustotal) + "</td>";
        rs += "<td>" + month + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + datetime + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resultSumTransaction(doanhso,ds2,bonusfix,bonusfix2,bonusmore,bonusmore2,bonusvin,bonusvincard,bonustotal, dsBan, bonusfixBan, bonusmoreBan){
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='2' style='color: #0000ff'>" + "Tổng" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(doanhso) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusfix) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusmore) + "</td>";
        rs += "<td>" + "" + "</td>";
//        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(ds2) + "</td>";
//        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusfix2) + "</td>";
//        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusmore2) + "</td>";
//        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonustotal) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(dsBan) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusfixBan) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusmoreBan) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonustotal) + "</td>";
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
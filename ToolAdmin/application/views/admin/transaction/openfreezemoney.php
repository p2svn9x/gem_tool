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
        <script type="text/javascript" src="<?php echo public_url()?>/js/jquery.table2excel.js"></script>
        <div class="widget">
            <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
            <div class="title">
                <h6>Mở đóng băng</h6>
            </div>


                <div class="formRow">

                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name" class="form-control"></td>

                            <td style="">
                                <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                        </tr>

                    </table>

                </div>


            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Nickname</td>
                    <td>Vin hiện có</td>
                    <td>Vin bị DL đóng băng</td>
                    <td>Vin bị đóng băng trong game</td>
                    <td>Vin</td>
                    <td>Vin trong két sắt</td>
                    <td>Tổng vin</td>
                    <td>Xu</td>
                    <td>Xu bị dóng băng</td>
                    <td>Tổng xu</td>
                    <td>Mở đóng băng</td>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
            </table>
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
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.css">
<script>

    $("#search_tran").click(function () {
        var result = "";
        if($("#filter_iname").val() == ""){
            $("#resultsearch").html("Bạn chưa nhập nickname");
            return false;
        }else {

            $("#spinner").show();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('transaction/openfreezemoneyajax')?>",
                data: {
                    nickname: $("#filter_iname").val()
                },

                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();

                    if (result.errorCode == 0) {
                        $("#resultsearch").html("");
                        result += resultSearchTransction(1, result.nickname, result.vin, result.freezeAgent, result.freezeInGame, result.vinTotal, result.safe,result.xu, result.freezeXuInGame, result.xuTotal);
                        $('#logaction').html(result);
                    } else if (result.errorCode == 1001) {
                        $("#resultsearch").html("Hệ thống gián đoạn");
                    } else if (result.errorCode == 1035) {
                        $("#resultsearch").html("Nickname không tồn tại");
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $('#logaction').html("");
                    $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                }, timeout: 20000
            })
        }
    });
    function resultSearchTransction(stt, nickname, vin,  freeagent,freeingame,totalvin,safe,xu,freexuingame,totalxu) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(vin) + "</td>";

        rs += "<td>" + commaSeparateNumber(freeagent) + "</td>";
        rs += "<td>" + commaSeparateNumber(freeingame) + "</td>";
        rs += "<td>" + commaSeparateNumber(totalvin) + "</td>";
        rs += "<td>" + commaSeparateNumber(safe) + "</td>";
        rs += "<td>" + commaSeparateNumber(safe+totalvin) + "</td>";
        rs += "<td>" + commaSeparateNumber(xu) + "</td>";
        rs += "<td>" + commaSeparateNumber(freexuingame) + "</td>";
        rs += "<td>" + commaSeparateNumber(totalxu) + "</td>";
        rs += "<td>" + "<input type='button' id='updatecard' value='Mở đóng băng' class='button blueB'  onclick=\"opendongbang('" + nickname + "')\" >" + "</td>";
        rs += "</tr>";
        return rs;
    }
    function opendongbang(nickname) {
        if (!confirm('Bạn chắc chắn muốn mở đóng băng ?')) {
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/openfreezemoney1ajax')?>",
            data: {
                nickname: nickname,
            },

            dataType: 'text',
            success: function (result) {
                    var res = JSON.parse(result);

                $("#spinner").hide();
                if (res.errorCode == "0") {
                    $("#bsModal3").modal("show");
                    $("#statuspenđing").html("Bạn mở đóng băng thành công");
                    $("#resultsearch").html("");
                    result += resultSearchTransction(1, res.nickname, res.vin, res.freezeAgent, res.freezeInGame, res.vinTotal, res.safe,res.xu, res.freezeXuInGame, res.xuTotal);
                    $('#logaction').html(result);


                } else if (res.errorCode == 1001) {
                    $("#resultsearch").html("Hệ thống gián đoạn");
                }else if (res.errorCode == 1035) {
                    $("#resultsearch").html("Nickname không tồn tại");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#resultsearch").html("Hệ thống gián đoạn");
            }, timeout: 20000
        });


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
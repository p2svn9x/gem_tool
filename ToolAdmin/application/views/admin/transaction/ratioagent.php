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
        <div class="widget">
            <h5 id="resultsearch"style="color: red;margin-left: 20px"></h5>
            <div class="title">
                <h6>Tỉ lệ nhận thưởng vincard</h6>
            </div>

                <input type="button" id="updateall" class="blueB logMeIn" value="Cập nhật tất cả" style="margin-right: 370px">
            <div class="formRow">
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Đại lý</td>
                    <td>Tỉ lệ nhận thưởng vincard</td>
                    <td>Cập nhật</td>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p id="statuspenđing"></p>
                </div>
                <div class="modal-footer">
                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                           aria-hidden="true">
                </div>
            </div>
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
</div>
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.css">
<script>


    $(document).ready(function () {
        var oldPage = 0;
        var result = "";
        var arrNickname = [];
        var arrRatio = [];
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/ratioagentajax')?>",
            data: {},

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.listPercentBonus == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    $.each(result.listPercentBonus, function (index, value) {
                        result += resultSearchTransction(stt, value.nickName, value.percentBonusVincard);
                        stt++;

                    });
                    $('#logaction').html(result);

                    $(".rate").each(function (index, value) {
                        $("#txtratio" + index).keydown(function (e) {
                            // Allow: backspace, delete, tab, escape, enter and .
                            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                                    // Allow: Ctrl+A, Command+A
                                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                                    // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                                // let it happen, don't do anything
                                return;
                            }
                            // Ensure that it is a number and stop the keypress
                            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                            }
                        });

                        $(this).click(function () {

                            var rate = parseInt($("#txtratio" + (index + 1)).val());
                            var nickname = $("#nickname" + (index + 1)).text();
                            console.log(rate);
                            updateratio(nickname, rate)
                        });


                    });

                    $("#updateall").click(function(){
                        $(".rate").each(function (index, value) {
                            arrNickname.push($("#nickname" + (index + 1)).text());
                            arrRatio.push(parseInt($("#txtratio" + (index + 1)).val()));
                        });

                       updateratio(arrNickname.join(), arrRatio.join());
                    });




                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 40000
        });

        $(".form-control.ratio").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });

</script>
<script>


    function updateratio(nickname, ratio) {
        if (!confirm('Bạn chắc chắn muốn cập nhật tỉ lệ nhận thưởng vincard ?')) {
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/ratioajax')?>",
            data: {
                nickname: nickname,
                ratio: ratio

            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#resultsearch").html("");
                if (result.errorCode == 0) {
                    $("#bsModal3").modal("show");
                    $("#statuspenđing").css({"color": "blue"});
                    $("#statuspenđing").html("Bạn cập nhật tỉ lệ nhận thưởng vincard thành công");

                } else if (result.errorCode == 1044) {
                    $("#bsModal3").modal("show");
                    $("#statuspenđing").css({"color": "red"});
                    $("#statuspenđing").html("Số % đăng ký không đúng (số % đăng ký yêu cầu phải nằm trong khoảng 10 - 100");
                } else if (result.errorCode == 1045) {
                    $("#bsModal3").modal("show");
                    $("#statuspenđing").css({"color": "red"});
                    $("#statuspenđing").html("Nickname đại lý cấp 1 không có trong DB");
                }
                else if (result.errorCode == 1046) {
                    $("#bsModal3").modal("show");
                    $("#statuspenđing").css({"color": "red"});
                    $("#statuspenđing").html("Danh sách nick name và list percent gửi đến server không khớp nhau");
                }


            }, error: function () {
                $("#spinner").hide();
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 40000
        });
    }

    function resultSearchTransction(stt, nickname, ratio) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td id='nickname" + stt + "'>" + nickname + "</td>";
        rs += "<td>" + '<input class="form-control ratio" style="font-size: 18px;color:blue; width:200px;display:inline" id="txtratio' + stt + '" type="text" value="' + ratio + '">' + "<span style='color: #0000ff;margin-left: 10px'>%</span>" + "</td>";
        rs += "<td class='rate'>" + "<input type='button' id='updateratio' value='Cập nhật tỉ lệ' class='button blueB' style='margin-left: 70px'>" + "</td>";
        rs += "</tr>";
        return rs;
    }


</script>

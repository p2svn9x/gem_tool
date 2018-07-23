<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Thu hồi giftcode
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <label class="col-sm-4" style="color: red;word-break: break-all"
                                       id="errocode">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">Từ ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate" name="fromDate"
                                               value="<?php echo $this->input->post("fromDate") ?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">Đến ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate" name="toDate"
                                               value="<?php echo $this->input->post("toDate") ?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">Nguồn xuất:</label>

                                <div class="col-sm-2">
                                    <select id="nguonxuat" class="form-control">
                                        <option value="">Giftcode marketing</option>
                                        <?php foreach ($source as $row): ?>
                                            <option
                                                value="<?php echo $row->key ?>"><?php echo "--------" . $row->name ?></option>
                                        <?php endforeach; ?>
                                        <option value="">Giftcode vận hành</option>
                                        <?php foreach ($source as $row): ?>
                                            <option
                                                value="<?php echo $row->key ?>"><?php echo "--------" . $row->name ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label id="labelvin" class="col-sm-1 control-label">Mệnh giá</label>

                                <div class="col-sm-2" id="menhgiavin">
                                    <select name="menhgiavin" class="form-control" id="roomvin">
                                        <option value="">Chọn</option>
                                        <?php foreach ($listvin as $key => $row): ?>
                                            <option value="<?php echo $row ?>"><?php echo $row . ",000 Vin" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-1"><input type="button" value="Thu hồi" name="submit"
                                                             class="btn btn-primary pull-left" id="search_tran"></div>

                            </div>
                        </div>
                        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: #0000ff">Bạn thu hồi giftcode thành công</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                               aria-hidden="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
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
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });

    $("#search_tran").click(function () {

        if ($("#fromDate").val() == "") {
            $("#errocode").html("Bạn chưa chọn ngày  bắt đầu");
            return false;
        }
        if ($("#toDate").val() == "") {
            $("#errocode").html("Bạn chưa chọn ngày kết thúc");
            return false;
        }

        $("#spinner").show();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/delgiftcodeajax')?>",
            data: {
                nguonxuat: $("#nguonxuat").val(),
                roomvin: $("#roomvin").val(),
                fromdate: $("#fromDate").val(),
                todate: $("#toDate").val()

            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if (res.transactions.countGiftCode == 0) {
                    $("#errocode").html("Không tồn tại giftcode trong khoảng thời gian này. Vui lòng chọn lại thời gian");
                }else{
                    $("#errocode").html("");
                    $("#bsModal3").modal("show");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#errocode").html("Bạn chưa thu hồi được giftcode");
            }
        });


    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });

</script>

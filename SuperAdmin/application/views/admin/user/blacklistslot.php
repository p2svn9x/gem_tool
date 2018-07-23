<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Blacklist slot
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <label class="col-sm-4" style="color: red;word-break: break-all"
                                       id="errorcode">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-1 control-label">Tài khoản:</label>

                                <div class="col-sm-4">
                                    <input id="txtnickname" type="text" class="form-control">
                                </div>
                                <div class="col-sm-1"><input type="button" value="OK" class="btn btn-primary pull-left" id="blacklist"></div>
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
                                        <p style="color: #0000ff">Bạn cộng tiền thành công</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                               aria-hidden="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
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
    $("#blacklist").click(function () {
        if ($("#txtnickname").val() == "") {
            $("#errorcode").html("Bạn chưa nhập nickname");
            return false;
        }
        else {
            $("#spinner").show();
            var result = "";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/blacklistslotajax')?>",
                data: {
                    nickname: $("#txtnickname").val(),
                    ac : "w",
                    key : "slot_black_list"
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    $("#errorcode").html(res);

                }, error: function () {
                    $("#spinner").hide();
                    $("#errorcode").html("Hệ thống gián đoan . Vui lòng liên hệ 19006896");
                }
            });
        }
    });

    $(document).ready(function () {
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/blacklistslotajax')?>",
            data: {
                nickname: $("#txtnickname").val(),
                ac : "r",
                key : "slot_black_list"
            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                $("#txtnickname").val(res);
            }, error: function () {
                $("#spinner").hide();
                $("#errorcode").html("Hệ thống gián đoan . Vui lòng liên hệ 19006896");
            }
        });

    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        window.location.href = '<?php echo base_url("user/blacklistslot") ?>';
    });


    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

</script>

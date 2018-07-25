<?php $this->load->view('admin/usergame/head', $this->data) ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <input type="hidden" id="listnickname" value="<?php echo $listnn ?>">
    <input type="hidden" id="listgiftcode" value="<?php echo $listgc ?>">
    <div class="widget">
        <div class="title">
            <h6>Gửi mail giftcode tri ân</h6>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-4"></div>
                <label class="col-sm-4" style="color: red" id="errocode"><?php echo $error; ?>
                </label>

            </div>
        </div>
        <?php if ($this->input->post('ok')): ?>
            <?php if (isset($succes)) : ?>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>

                    </div>
                </div>
            <?php elseif (isset($error)) : ?>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>

                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <form action="<?php echo admin_url("mail/sendmailgctrian") ?>" id="fileinfo" name="fileinfo"
              enctype="multipart/form-data" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <label class="col-sm-1 control-label" for="exampleInputEmail1">Tài khoản:</label>

                    <div class="col-sm-2">
                        <input type="file" id="userfile" name="filexls"
                               value="<?php echo $this->input->post('filexls') ?>">
                    </div>
                    <div class="col-sm-1">
                        <input type="submit" class="btn btn-primary pull-left button blueB" id="upload" value="Upload"
                               name="ok">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <label class="col-sm-1 control-label" for="exampleInputEmail1">Mệnh giá:</label>

                    <div class="col-sm-2">
                       <select id="moneyvin">
                           <option value="10.000">
                               10K Vin
                           </option>
                           <option value="20.000">
                               20K Vin
                           </option>
                           <option value="50.000">
                               50K Vin
                           </option>
                           <option value="100.000">
                               100K Vin
                           </option>
                       </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Gửi mail" name="submit" class="button blueB" id="sendmail">
                    </div>
                </div>
            </div>
        </form>
        <div class="formRow">
            <div class="row">

            </div>
        </div>

        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn gửi mail thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<div class="clear mt30"></div>
<style>
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
<script>
    $("#sendmail").click(function () {
        if ($("#listnickname").val() == "" || $("#listgiftcode").val()== "" ) {
            $("#errocode").html("Không tồn tại file hoặc key Nickname , Giftcode viết sai");
        } else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('mail/sendmailgctrianajax')?>",
                data: {
                    nickname: $("#listnickname").val(),
                    giftcode: $("#listgiftcode").val(),
                    money: $("#moneyvin").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        if (res.nickName != "") {
                            $("#errocode").html("Nick name không tồn tại:" + res.nickName);
                        }
                    } else if (res.errorCode == 10001) {
                        $("#errocode").html("Nick name không tồn tại:" + res.nickName);

                    } else if (res.errorCode == 10002) {
                        $("#errocode").html("Số lượng nickname nhiều hơn số lượng giftcode vui lòng upload lại file");

                    } else if (res.errorCode == 10003) {
                        $("#errocode").html("Số lượng giftcode nhiều hơn số lượng nickname vui lòng upload lại file");

                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Bạn không gửi được gift code");
                }
            });
        }

    });

</script>
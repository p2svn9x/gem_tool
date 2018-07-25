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
    <div class="widget">
        <div class="title">
            <h6>Gửi mail tài khoản</h6>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-2"></div>
                <label class="col-sm-2" style="color: red" id="errocode">
                </label>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1"></div>
                <label class="col-sm-1">
                    Nickname:
                </label>

                <div class="col-sm-2">
                    <input type="text" id="nickname" class="form-control">
                </div>
                <label class="col-sm-4" style="color: #0000ff">
                   Nhập (*) gửi tất cả
                </label>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1"></div>
                <label class="col-sm-1">
                    Tiêu đề:
                </label>

                <div class="col-sm-2">
                    <input id="title" type="text" class="form-control">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1"></div>
                <label class="col-sm-1">
                    Nội dung:
                </label>

                <div class="col-sm-4">
                    <textarea id="content" row="100" class="form-control" style="height: 400px"></textarea>
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <input type="button" value="Gửi mail" name="submit" class="button blueB" id="sendmail">
                </div>

            </div>
        </div>

        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: red">Bạn gửi mail thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
<?php endif; ?>
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
   
    if($("#nickname").val() == ""){
        $("#errocode").html("Bạn chưa nhập nickname");
        return false;
    } if($("#title").val() == ""){
        $("#errocode").html("Bạn chưa nhập tiêu đề");
        return false;
    } if($("#content").val() == ""){
        $("#errocode").html("Bạn chưa nhập nội dung");
        return false;
    }
     if($("#toDate").val() == ""){
        $("#errocode").html("Bạn chưa nhập thời gian");
        return false;
    }
 $("#spinner").show();
                   $.ajax({
                       type: "POST",
                       url: "<?php echo admin_url('mail/sendmailajax')?>",
                       data: {
                           c:401,
                           nickname: $("#nickname").val(),
                            title: $("#title").val(),
                             content: $("#content").val()
                       },
                       dataType: 'json',
                       success: function (res) {
						    $("#spinner").hide();
                           if(res.errorCode == 10002){
                               $("#errocode").html("Nickname:  " + res.nickName+ "  không tồn tại");
                           }else{
                               $("#bsModal3").modal("show");
                                    $("#errocode").html("");
                           }
                       }, error: function () {
                           $("#spinner").hide();
                           $("#errocode").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                       },timeout : 20000
                   });
        });

</script>
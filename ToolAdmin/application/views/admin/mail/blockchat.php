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
            <h6>Mở khóa chat</h6>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-4"></div>
                <label class="col-sm-4" style="color: red" id="errocode">
                </label>

            </div>
        </div>
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <label class="col-sm-2 control-label">Tài khoản:</label>
                    <div class="col-sm-3">
                        <input type="text" id="nickname"  class="form-control" placeholder="Bạn cần nhập nickname">
                    </div>

                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 control-label" >
                        Thời gian:
                    </label>

                    <div class="col-sm-3">
                        <input type="text" id="timeblock"  class="form-control" placeholder="Bạn cần nhập số phút cấm chat">
                    </div>
                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-1">
                        <input type="button" value="Mở chat" name="submit" class="button blueB" id="openchat">
                    </div>
                    <div class="col-sm-1">
                        <input type="button" value="Khóa chat" name="submit" class="button blueB" id="block">
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
                        <p style="color: #0000ff">Bạn mở chat thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
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
                        <p style="color: #0000ff">Bạn khóa chat vĩnh viễn thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="bsModal5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn khóa chat thành công</p>
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
    $("#openchat").click(function () {
        if($("#nickname").val() == ""){
            $("#errocode").html("Bạn chưa nhập nickname");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('mail/blockchatajax')?>",
     
            data: {
                nickname: $("#nickname").val(),
                time: 0
            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if(res == 1){
                    $("#bsModal3").modal("show");
                    $("#errocode").html("");
                    $("#nickname").val("");
                    $("#timeblock").val("");
                }
            }
        });

    });
    $("#blockchat").click(function () {
        if($("#nickname").val() == ""){
            $("#errocode").html("Bạn chưa nhập nickname");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('mail/blockchatajax')?>",
        
            data: {
                nickname: $("#nickname").val(),
                time: -1
            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if(res == 1){
                    $("#bsModal4").modal("show");
                    $("#errocode").html("");
                    $("#nickname").val("");
                    $("#timeblock").val("");
                }
            }
        });
    });
        $("#block").click(function () {
            if($("#nickname").val() == ""){
                $("#errocode").html("Bạn chưa nhập nickname");
                return false;
            }
            if($("#timeblock").val() == ""){
                $("#errocode").html("Bạn chưa nhập thời gian");
                return false;
            }
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('mail/blockchatajax')?>",
          
                data: {
                    nickname: $("#nickname").val(),
                    time: 60*1000*$("#timeblock").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if(res == 1){
                        $("#bsModal5").modal("show");
                        $("#errocode").html("");
                        $("#nickname").val("");
                        $("#timeblock").val("");
                    }
                }
            });
    });


    $(document).ready(function () {
        $("#timeblock").keydown(function (e) {
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
</script>
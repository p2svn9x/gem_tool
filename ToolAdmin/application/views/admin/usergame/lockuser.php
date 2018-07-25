<?php $this->load->view('admin/usergame/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css"> 
    <?php if ($admin_info->Status == "A" || $admin_info->Status == "W" || $admin_info->Status == "S" || $admin_info->Status == "D" || $admin_info->Status == "Q")  : ?>

        <div class="widget">
            <div class="title">
                <h4>Khóa tài khoản <span style="color: #0000FF"><?php echo $nickname ?></span></h4>
            </div>
            <input type="hidden" id="nickname" value="<?php echo $nickname ?>">
            <input type="hidden" id="status" value="<?php echo $status ?>">
            <input type="hidden" id="daochuoi" value="<?php echo $daochuoi ?>">
            <input type="hidden" id="txtaction" value="">
            <div id="list_role">
                <div class="formRow">
                    <div class="row">
                        <label class="col-sm-1" style="width: 154px"> Cấm login</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="0">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chuyển tiền</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="3">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi sâm</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="8">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi ba cây</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="9">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi binh</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="10">
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">

                        <label class="col-sm-1" style="width: 154px"> Cấm đổi thưởng</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="1">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Login sandbox</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="2">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi tlmn</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="11">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi tá lả</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="12">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi liêng</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="13">
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi xì tố</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="14">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi xóc xóc</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="15">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi bài cào</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="16">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi poker</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="17">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi xi dzach</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="23">
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                       
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi caro</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="25">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi cờ tướng</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="26">
                        </div>
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi cờ vua</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="27">
                        </div>
						<label class="col-sm-1" style="width: 154px"> Cấm chơi PokerTour</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="28">
                        </div>
						 <label class="col-sm-1" style="width: 154px"> Cấm chơi Cờ Úp</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="29">
                        </div>
                    </div>
                </div>
				<div class="formRow">
                    <div class="row">
                       
                        <label class="col-sm-1" style="width: 154px"> Cấm chơi Hàm Cá Mập</label>

                        <div class="col-sm-1">
                            <input type="checkbox" name="role" value="30">
                        </div>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <label class="col-sm-1" style="width: 154px">Lý do khóa</label>
                    <div class="col-sm-2">
                        <input type="text"  id="txtlydo" class="form-control" placeholder="Nhập lý do khóa">
                    </div>
                    <div class="col-sm-1"><input type="button" id="openuser" value="Cập nhật" class="button blueB">
                    </div>
                </div>
            </div>
            <div class="formRow">
            </div>


        </div>
    <?php else: ?>
    <div class="widget">
        <div class="title">
            <h4>Bạn không được phân quyền</h4>
        </div>
    </div>
    <?php endif; ?>
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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var position = getpositiontostring('1', $("#daochuoi").val()).join(',');
        var res = position.split(",");
        $.each($("input[name='role']"), function () {
            for (var i = 0; i < res.length; i++) {
                if ($(this).val() == res[i]) {
                    $(this).attr('checked', 'checked');
                }
            }
        });
    });
    $("#openuser").click(function () {
        var lst_role = [];
        var lst_role_txt = [];
        var lst_role1 = [];


        $.each($("input[name='role']:checked"), function () {
            lst_role.push($(this).val());
            lst_role_txt.push(getlockuser($(this).val()));
        });

        $.each($("input:checkbox:not(:checked)"), function () {
            lst_role1.push($(this).val());
        });
        if($("#txtlydo").val() == ""){
            alert("Bạn chưa nhập lý do khóa");
            return false;
        }
        if (lst_role.length > 0) {
            $("#txtaction").val(lst_role_txt.join(','));
            updateStatusUser(lst_role.join(','), 1)
            var statuslock = 1;
        }else{
            var statuslock = 0;
        }

        if (lst_role1.length > 0) {
            updateStatusUser(lst_role1.join(','), 0)
        }

        $.ajax({
            url: "<?php echo admin_url('usergame/loglockuser') ?>",
            type: "POST",
            data: {
                txtlydo : $("#txtlydo").val(),
                nickname : $("#nickname").val(),
                txtaction : $("#txtaction").val(),
                statuslock : statuslock
            },
            dataType: "json"

        });


    });
    function updateStatusUser(action, type) {
        var request = $.ajax({
            url: "<?php echo admin_url('usergame/lockuserajax') ?>",
            type: "POST",
            data: {
                nickname : $("#nickname").val(),
                action: action,
                type: type
            },
            dataType: "json",
            success: function (result) {
                $.ajax({
                    url: "<?php echo admin_url('usergame/messlockuser') ?>",
                    type: "POST",
                    data: {
                    },
                    dataType: "json"

                });
            }

        });

        request.done(function (msg) {
            location.href = "<?php echo admin_url("usergame")  ?>";
        });


    }
    function getpositiontostring(substring, string) {
        var a = [], i = -1;
        while ((i = string.indexOf(substring, i + 1)) >= 0) a.push(i);
        return a;
    }
    function getlockuser(count) {
        var strresult="";
        switch (count) {
            case "0":
                strresult = " Cấm Login";
                break;
            case "1":
                strresult = "Cấm Đổi thưởng";
                break;
            case "2":
                strresult = "Login sandbox";
                break;
            case "3":
                strresult = "Cấm Chuyển tiền";
                break;
            case "8":
                strresult = "Cấm Chơi sâm";
                break;
            case "9":
                strresult = "Cấm Chơi ba cây";
                break;
            case "10":
                strresult = "Cấm Chơi binh";
                break;
            case "11":
                strresult = "Cấm Chơi tlmn";
                break;
            case "12":
                strresult = "Cấm Chơi tá lả";
                break;
            case "13":
                strresult = "Cấm Chơi liêng";
                break;
            case "14":
                strresult = "Cấm Chơi xì tố";
                break;
            case "15":
                strresult = "Cấm Chơi xóc xóc";
                break;
            case "16":
                strresult = "Cấm Chơi bài cào";
                break;
            case "17":
                strresult = "Cấm Chơi poker";
                break;
            case "23":
                strresult = "Cấm Chơi xì dzach";
                break;
           
            case "25":
                strresult = "Cấm Chơi caro";
                break;
            case "26":
                strresult = "Cấm Chơi cờ tướng";
                break;
            case "27":
                strresult = "Cấm Chơi cờ vua";
                break;
				  case "28":
                strresult = "Cấm Chơi PokerTour";
                break;
            case "29":
                strresult = "Cấm Chơi Cờ úp";
                break;
            case "30":
                strresult = "Cấm Chơi Hàm Cá Mập";
                break;
        }
        return strresult;
    }

</script>

<!-- head -->
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Cộng tiền</h5>

        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Cộng tiền cho tài khoản</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Tên nickname:<span class="req"></span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="" id="param_username" name="username"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Số tiền:<span class="req"></span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_money" name="money"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_cat" class="formLeft">Lý do:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="action" id="selectaction" class="left">
                            <option value=""> Chọn lý do</option>
                            <!-- kiem tra danh muc co danh muc con hay khong -->
                            <?php foreach ($action as $row): ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->action ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="autocheck" name="tag_autocheck"></span>
                        <div class="clear error" name="tag_error"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="formRow">
                        <label for="param_username" class="formLeft">Loại tiền:<span class="req"></span></label>
                        <div class="formRight">
                            <select id="selectmoney" name="moneyselect">
                                <option value="vin">Vin</option>
                                <option value="xu"> Xu</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <div id="regError" style=" color: Red; display: block;" align="center"></div>
                    </div>
                    <div class="formSubmit">
                        <input type="button" id="submittran" align="center" class="redB" value="Cộng trừ tiền">
                    </div>
            </fieldset>
        </form>
    </div>
</div>
<script>
    $("#submittran").click(function () {
        var e = document.getElementById("selectmoney");
        var strUser = e.options[e.selectedIndex].value;
        var a = document.getElementById("selectaction");
        var str = a.options[a.selectedIndex].text;
        var money = $("#param_money").val();
        $.ajax({
            type: "POST",
            url: "http://104.155.193.15:8082/api_backend",
            data: {c: 100, nn: $("#param_username").val(), mn: $("#param_money").val(), mt: strUser, rs:str},
            dataType: 'json',
            success: function (result) {
                if (result.errorCode == 0) {
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo tranfer_url(); ?>" + "/congtien/user_data_submit",
                        dataType: 'json',
                        data: {
                            money: money,
                            account_name: $("#param_username").val(),
                            money_type: strUser,
                            action: str
                        },
                        success: function (res) {

                        }
                    });
                    if (money > 0) {
                        $("#regError").html("Cộng tiền thành công");

                    }
                    else {
                        $("#regError").html("Trừ  tiền thành công");
                    }
                    document.getElementById("param_username").value = "";
                    document.getElementById("param_money").value = "";
                    document.getElementById("selectaction").value = "";
                }
                if (result.errorCode == 1001) {
                    $("#regError").html("Không tồn tại tài khoản");
                }
                if (result.errorCode == 1002) {
                    $("#regError").html("Tài khoản không đủ tiền");
                }
                if (result.errorCode == 1017) {
                    $("#regError").html("Tiền nhập không hợp lệ");
                }
            }
        });
    });
</script>
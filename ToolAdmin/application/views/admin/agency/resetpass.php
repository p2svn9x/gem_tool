<!-- head -->

<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Quản lý đại lý</h5>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Đổi mật khẩu</h6>
        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Nhập mật khẩu cũ:</label></td>
                    <td>
                        <span class="oneTwo"><input type="password" _autocheck="true" id="matkhaucu" value="" style="height: 30px;width: 200px" placeholder="Nhập mật khẩu cũ" name="matkhaucu"></span>
                    </td>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 20px;margin-bottom:7px;width: 200px"><span class="req" id="erroroldpass"></span></label>
                    </td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Nhập mật khẩu mới</label></td>
                    <td>
                        <span class="oneTwo"><input type="password" _autocheck="true" id="matkhaumoi" value="" style="height: 30px;width: 200px" placeholder="Nhập mật khẩu mới"
                                                    name="matkhaumoi"></span>
                    </td>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 20px;margin-bottom:7px;width: 200px"><span class="req" id="errornewpass"></span></label>
                    </td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="vinlabel"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Nhập lại mật khẩu mới:
                        </label></td>
                    <td>
                        <span class="oneTwo"><input type="password" _autocheck="true" id="rematkhau" value="" placeholder="Nhập lại mật khẩu mới:" style="height: 30px;width: 200px" name="rematkhau"></span>
                    </td>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 20px;margin-bottom:7px;width: 200px"><span class="req" id="renewpass"></span></label>
                    </td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Mã OTP:
                        </label></td>
                    <td>
                        <span class="oneTwo"><input type="text" _autocheck="true" id="maotp" value="" placeholder="Nhập mã otp" style="height: 30px;width: 200px"
                                                    name="maotp"></span>
                    </td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <span class="oneTwo"><input type="button" _autocheck="true" class="button blueB" id="resetpass" style="margin-left: 600px"
                                                    value="Đổi mật khẩu"></span>
                    </td>
                </tr>
            </table>

        </div>


    </div>
</div>

<script>
    $("#resetpass").click(function () {

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url("agency/resetpassajax") ?>",
            data: {oldpass: $("#matkhaucu").val(), newpass: $("#matkhaumoi").val(),renewpass: $("#rematkhau").val()},
            dataType: 'text',
            success: function (data) {
                    console.log(data);
                    if(data == 1){

                        $("#erroroldpass").html("Không được để trống");
                    }else if(data == 2){
                    $("#erroroldpass").html("Mật khẩu cũ không đúng");
                }else if(data == 3){
                        $("#errornewpass").html("Không được để trống");
                    }

            }
        });

    })


</script>







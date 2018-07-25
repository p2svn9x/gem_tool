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
            <h6>Chuyển vin tài khoản</h6>
        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Nhập nick name cần
                            chuyển:</label></td>
                    <td>
                 <span class="oneTwo"><input type="text" _autocheck="true" id="nametran" value="" style="height: 30px;width: 200px" placeholder="Nhập nick name" name="nametran"></span>
                    </td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Nhập lại nick name cần
                            chuyển:</label></td>
                    <td>
                        <span class="oneTwo"><input type="text" _autocheck="true" id="nametranre" value="" style="height: 30px;width: 200px" placeholder="Nhập lại nick name"
                                                    name="nametranre"></span>
                    </td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="vinlabel"
                               style="margin-left: 400px;margin-bottom:7px;width: 200px">Số vin chuyển:
                        </label></td>
                    <td>
                        <span class="oneTwo"><input type="text" _autocheck="true" id="vintran" value="" placeholder="Nhập số vin cần chuyển" style="height: 30px;width: 200px" name="vintran"></span>
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
                        <span class="oneTwo"><input type="button" _autocheck="true" class="button blueB" id="chuyenkhoan" style="margin-left: 600px"
                                                    value="Chuyển khoản"></span>
                    </td>
                </tr>
            </table>

        </div>


    </div>
</div>

<script>
    $("#chuyenkhoan").click(function () {


    })


</script>







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
        <?php if(isset($message) && $message):?>
           <input type="hidden" id="errorinput" value="<?php echo $message ?>">
        <?php endif; ?>


            <div class="title">
                <h6>Xuất thẻ nạp</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('report/exportbycard') ?>" method="post">
                    <?php if($this->input->post('ok')): ?>
                        <?php echo $error; ?>
                    <?php endif; ?>


                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $start_time ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>


                            </td>

                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Đến ngày: </label>
                            </td>
                            <td class="item">

                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" id="fromDate" name="fromDate"
                                           value="<?php echo $end_time ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>
                            </td>


                        </tr>
                    </table>
                </div>
                <div class="formRow">

                    <table>
                        <tr>
                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Loại thẻ:</label></td>
                            <td class="">
                                <select id="select_provider" name="select_provider"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option
                                        value="Viettel" <?php if ($this->input->post('select_provider') == "Viettel") {
                                        echo "selected";
                                    } ?>>Viettel
                                    </option>
                                    <option
                                        value="Mobifone" <?php if ($this->input->post('select_provider') == "Mobifone") {
                                        echo "selected";
                                    } ?>>Mobifone
                                    </option>
                                    <option
                                        value="Vinaphone" <?php if ($this->input->post('select_provider') == "Vinaphone") {
                                        echo "selected";
                                    } ?>>Vinaphone
                                    </option>
                                    <option value="Zing" <?php if ($this->input->post('select_provider') == "Zing") {
                                        echo "selected";
                                    } ?>>Zing
                                    </option>
                                    <option value="Vcoin" <?php if ($this->input->post('select_provider') == "Vcoin") {
                                        echo "selected";
                                    } ?>>Vcoin
                                    </option>
                                    <option value="Gate" <?php if ($this->input->post('select_provider') == "Gate") {
                                        echo "selected";
                                    } ?>>Gate
                                    </option>
                                    <option
                                        value="VietNamMobile" <?php if ($this->input->post('select_provider') == "VietNamMobile") {
                                        echo "selected";
                                    } ?>>VietNamMobile
                                    </option>
                                </select>
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Trạng thái:</label>
                            </td>
                            <td class="">
                                <select id="select_status" name="select_status"
                                        style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="0" <?php if ($this->input->post('select_status') == "0") {
                                        echo "selected";
                                    } ?>>Thành công
                                    </option>
                                    <option value="1" <?php if ($this->input->post('select_status') == "1") {
                                        echo "selected";
                                    } ?>>Thất bại
                                    </option>
                                    <option value="30" <?php if ($this->input->post('select_status') == "30") {
                                        echo "selected";
                                    } ?>>Đang xử lý
                                    </option>
                                    <option value="31" <?php if ($this->input->post('select_status') == "31") {
                                        echo "selected";
                                    } ?>>Thẻ đã nạp trước đó
                                    </option>
                                    <option value="32" <?php if ($this->input->post('select_status') == "32") {
                                        echo "selected";
                                    } ?>>Thẻ bị khóa
                                    </option>
                                    <option value="33" <?php if ($this->input->post('select_status') == "33") {
                                        echo "selected";
                                    } ?>>Thẻ chưa kích hoạt
                                    </option>
                                    <option value="34" <?php if ($this->input->post('select_status') == "34") {
                                        echo "selected";
                                    } ?>>Thẻ hết hạn
                                    </option>
                                    <option value="35" <?php if ($this->input->post('select_status') == "35") {
                                        echo "selected";
                                    } ?>>Sai mã thẻ
                                    </option>
                                    <option value="36" <?php if ($this->input->post('select_status') == "36") {
                                        echo "selected";
                                    } ?>>Mã serial không đúng
                                    </option>
                                </select>
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Mệnh giá:</label>
                            </td>
                            <td class="">
                                <select id="select_menhgia" name="select_menhgia"
                                        style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="10000" <?php if ($this->input->post('select_menhgia') == "10000") {
                                        echo "selected";
                                    } ?>>10,000
                                    </option>
                                    <option value="20000" <?php if ($this->input->post('select_menhgia') == "20000") {
                                        echo "selected";
                                    } ?>>20,000
                                    </option>
                                    <option value="30000" <?php if ($this->input->post('select_menhgia') == "30000") {
                                        echo "selected";
                                    } ?>>30,000
                                    </option>
                                    <option value="50000" <?php if ($this->input->post('select_menhgia') == "50000") {
                                        echo "selected";
                                    } ?>>50,000
                                    </option>
                                    <option value="100000" <?php if ($this->input->post('select_menhgia') == "100000") {
                                        echo "selected";
                                    } ?>>100,000
                                    </option>
                                    <option value="200000" <?php if ($this->input->post('select_menhgia') == "200000") {
                                        echo "selected";
                                    } ?>>200,000
                                    </option>
                                    <option value="300000" <?php if ($this->input->post('select_menhgia') == "300000") {
                                        echo "selected";
                                    } ?>>300,000
                                    </option>
                                    <option value="500000" <?php if ($this->input->post('select_menhgia') == "500000") {
                                        echo "selected";
                                    } ?>>500,000
                                    </option>
                                    <option value="1000000" <?php if ($this->input->post('select_menhgia') == "1000000") {
                                        echo "selected";
                                    } ?>>1,000,000
                                    </option>
                                    <option value="2000000" <?php if ($this->input->post('select_menhgia') == "2000000") {
                                        echo "selected";
                                    } ?>>2,000,000
                                    </option>
                                    <option value="5000000" <?php if ($this->input->post('select_menhgia') == "5000000") {
                                        echo "selected";
                                    } ?>>5,000,000
                                    </option>
									 <option value="10000000" <?php if ($this->input->post('select_menhgia') == "10000000") {
                                        echo "selected";
                                    } ?>>10,000,000
                                    </option>
                                    <option value="20000000" <?php if ($this->input->post('select_menhgia') == "20000000") {
                                        echo "selected";
                                    } ?>>20,000,000
                                    </option>
                                </select>
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tên bảng:</label>
                            </td>
                            <td class="">
                                <select id="select_table" name="select_table"
                                        style="margin-left: 20px;margin-bottom:-2px;width: 143px">

                                    <option value="1" <?php if ($this->input->post('select_table') == "1") {
                                        echo "selected";
                                    } ?>>dvt_recharge_by_card
                                    </option>
                                    <option value="2" <?php if ($this->input->post('select_table') == "2") {
                                        echo "selected";
                                    } ?>>dvt_recharge_by_sms
                                    </option>
                                    <option value="3" <?php if ($this->input->post('select_table') == "3") {
                                        echo "selected";
                                    } ?>>dvt_recharge_by_sms_plus
                                    </option>
                                    <option value="4" <?php if ($this->input->post('select_table') == "4") {
                                        echo "selected";
                                    } ?>>dvt_cash_out_by_card
                                    </option>
                                    <option value="5" <?php if ($this->input->post('select_table') == "5") {
                                        echo "selected";
                                    } ?>>dvt_cash_out_by_topup
                                    </option>
									<option value="6" <?php if ($this->input->post('select_table') == "6") {
                                        echo "selected";
                                    } ?>>ngan_luong_transaction
                                    </option>
                                </select>
                            </td>

                        </tr>
                    </table>
                </div>
                    <div class="formRow">
                        <table>
                            <tr>

                                <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Nhà cung cấp:</label>
                                </td>
                                <td class="">
                                    <select id="select_partner" name="select_partner"
                                            style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                        <option value="" <?php if ($this->input->post('select_partner') == "") {
                                            echo "selected";
                                        } ?>>Chọn
                                        </option>
                                        <option value="vtc" <?php if ($this->input->post('select_partner') == "vtc") {
                                            echo "selected";
                                        } ?>>VTC
                                        </option>
                                        <option value="epay" <?php if ($this->input->post('select_partner') == "epay") {
                                            echo "selected";
                                        } ?>>EPay
                                        </option>
                                        <option value="1pay" <?php if ($this->input->post('select_partner') == "1pay") {
                                            echo "selected";
                                        } ?>>1 Pay
                                        </option>
                                        <option value="dvt" <?php if ($this->input->post('select_partner') == "dvt") {
                                            echo "selected";
                                        } ?>>Dịch vụ thẻ
                                        </option>

                                    </select>
                                </td>

                                <td><label style="margin-left: 72px;margin-bottom:-2px;width: 120px">Thuê bao:</label>
                                </td>
                                <td class="">
                                    <select id="select_dichvu" name="select_dichvu"
                                            style="margin-left: -25px;margin-bottom:-2px;width: 143px">
                                        <option value="" <?php if ($this->input->post('select_dichvu') == "") {
                                            echo "selected";
                                        } ?>>Chọn
                                        </option>
                                        <option value="1" <?php if ($this->input->post('select_dichvu') == "1") {
                                            echo "selected";
                                        } ?>>Trả trước
                                        </option>
                                        <option value="2" <?php if ($this->input->post('select_dichvu') == "2") {
                                            echo "selected";
                                        } ?>>Trả sau
                                        </option>

                                    </select>
                                </td>
                                <td style="">
                                    <input type="submit" id="search_tran" value="Xuất Excel" class="button blueB"  name="ok"
                                           style="margin-left: 50px">
                                </td>
                            </tr>
                        </table>
                    </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p style="color: red">Không tồn tại dữ liệu</p>
                </div>
                <div class="modal-footer">
                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });

    if($("#errorinput").val() == 1){
        $("#bsModal3").modal("show");
    }
</script>


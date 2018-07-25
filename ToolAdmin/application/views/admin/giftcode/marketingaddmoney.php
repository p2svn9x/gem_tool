<?php $this->load->view('admin/giftcode/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Cộng tiền marketing</h6>
        </div>
        <div class="formRow">
            <span id="errogift" style="font-size: 14px;margin-left: 591px; color: red"></span>
            <?php if ($this->input->post('ok')): ?>
                <span id="error" style="font-size: 14px; color: red"><?php echo $error; ?></span>
            <?php endif; ?>
            <form action="<?php echo admin_url("giftcode/marketingaddmoney") ?>" id="fileinfo" name="fileinfo"
                  enctype="multipart/form-data" method="post">
                <table>
                    <tr>
                        <td><label id="labeluserfile" style="margin-left: 30px;margin-bottom:-2px;width: 120px;">Danh
                                sách tài khoản:</label></td>
                        <td><input type="file" id="userfile" name="filexls"
                                   value="<?php echo $this->input->get('filexls') ?>" style="margin-left: 20px"></td>
                        <td>
                            <input type="submit" id="upload" value="Upload" name="ok" class="button blueB"
                                   style="margin-left: 20px"></td>
                        <td><label id="labelvin" style="margin-left: 30px;margin-bottom:-2px;width: 60px;">Mệnh
                                giá</label></td>
                        <td><select id="menhgiavin" name="menhgiavin"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px;">
                                <option value="10000">10,000 Vin</option>
                                <option value="20000">20,000 Vin</option>
                                <option value="50000">50,000 Vin</option>
                                <option value="100000">100,000 Vin</option>
                            </select></td>
                        <td><label id="labelxu" style="margin-left: 30px;margin-bottom:-2px;width: 60px;display: none">Mệnh
                                giá</label></td>
                        <td><select id="menhgiaxu" name="menhgiaxu"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px;display: none">
                                <option value="1000000">1,000,000 Xu</option>
                                <option value="3000000">3,000,000 Xu</option>
                                <option value="5000000">5,000,000 Xu</option>
                                <option value="9000000">9,000,000 Xu</option>
                                <option value="10000000">10,000,000 Xu</option>
                            </select></td>
                        <td>
                            <label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
                        <td class="item">
                            <select id="money" name="money"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                                <option value="1">Vin</option>
                                <option value="0">Xu</option>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Cộng tiền marketing" class="button blueB"
                                   style="margin-left: 20px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('giftcode/add') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/ajax-loader.gif') ?>" alt="Loading"/>
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
    function processSelectedFiles(fileInput) {
        var files = fileInput.files;

        for (var i = 0; i < files.length; i++) {
            $("#userfile").val();
            alert(files[i].name);
        }
    }
    $("#search_tran").click(function () {
        $("#spinner").bind("ajaxSend", function () {
            $(this).show();
        }).bind("ajaxStop", function () {
            $(this).hide();
        }).bind("ajaxError", function () {
            $(this).hide();
        });
        +
            $("#error").css("display", "none");
        var check = true;
        $.ajax({
            url: "<?php echo admin_url("giftcode/upload") ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, value) {

                    if (value.dup == 1) {
                        $("#errogift").html("Tài khoản:   " + value.nickname + "  trùng vui lòng upload lại file");
                        return false;
                    } else if (value.dup == 0) {
                        if ($("#money").val() == 1) {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo $linkapi?>",
                                data: {
                                    c: 310,
                                    nn: value.nickname,
                                    vin: $("#menhgiavin").val(),
                                    xu: 0
                                },
                                dataType: 'json',
                                success: function (result) {
                                    if (result.errorCode == 10001) {
                                        $("#errogift").html("Tài khoản  " + result.message + "   không tồn tại vui lòng upload lại file");
                                    } else if (result.errorCode == 0) {
                                        $("#errogift").html("Cộng tiền thành công");
                                    }

                                }
                            });
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo $linkapi?>",
                                data: {
                                    c: 310,
                                    nn: value.nickname,
                                    vin: $("#menhgiaxu").val(),
                                    xu: 0
                                },
                                dataType: 'json',
                                success: function (result) {
                                    if (result.errorCode == 10001) {
                                        $("#errogift").html("Tài khoản  " + result.message + "   không tồn tại vui lòng upload lại file");
                                    }
                                    else if (result.errorCode == 0) {
                                        $("#errogift").html("Cộng tiền thành công");
                                    }

                                }
                            });
                        }

                    }

                });

            }
        });
    });
    $(document).ready(function () {

        $('#money').change(function () {
            var val = $("#money option:selected").val();
            if (val == 1) {
                $("#labelvin").css("display", "block");
                $("#menhgiavin").css("display", "block");
                $("#labelxu").css("display", "none");
                $("#menhgiaxu").css("display", "none");
            } else if (val == 0) {
                $("#labelxu").css("display", "block");
                $("#menhgiaxu").css("display", "block");
                $("#labelvin").css("display", "none");
                $("#menhgiavin").css("display", "none");
            }
        });
    });
</script>

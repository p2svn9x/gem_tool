<?php $this->load->view('admin/giftcode/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Thêm giftcode</h6>
        </div>
        <div class="formRow">
            <span id="errogift" style="font-size: 14px;margin-left: 591px; color: red"></span>
            <form class="list_filter form" action="" method="get">
                <table>
                    <tr>
                        <td><label  id = "labelvin" style="margin-left: 30px;margin-bottom:-2px;width: 60px;">Mệnh giá</label></td>
                        <td><select id="menhgiavin" name="menhgiavin"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px;">
                                <option value="10">10,000 Vin</option>
                                <option value="20">20,000 Vin</option>
                                <option value="50">50,000 Vin</option>
                                <option value="100">100,000 Vin</option>
                            </select></td>
                        <td><label  id = "labelxu" style="margin-left: 30px;margin-bottom:-2px;width: 60px;display: none">Mệnh giá</label></td>
                        <td><select id="menhgiaxu" name="menhgiaxu"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px;display: none">
                                <option value="3">3,000,000 Xu</option>
                                <option value="5">5,000,000 Xu</option>
                                <option value="9">9,000,000 Xu</option>
                                <option value="10">10,000,000 Xu</option>
                            </select></td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px;">Số lượng:</label></td>
                        <td class="">
                            <input name="soluong"
                                   value="<?php echo $this->input->get('soluong') ?>"
                                   id="soluong" type="text"/>
                        </td>
                        <td>
                            <label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Nguồn xuất:</label></td>
                        <td class="item">
                            <select id="nguonxuat" name="nguonxuat"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                                <option value="">Chọn</option>
                                <?php foreach($list as $row): ?>
                                <option value="<?php echo $row->Key?>"><?php echo $row->FullName ?></option>
                                <?php endforeach; ?>

                            </select>
                        </td>
                        <td>
                            <label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Đợt phát hành:</label></td>
                        <td class="item">
                            <select id="phathanh" name="phathanh"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                                <option value="">Chọn</option>
                                <option value="1">Đợt 1</option>
                                <option value="2">Đợt 2</option>
                                <option value="3">Đợt 3</option>
                                <option value="4">Đợt 4</option>
                                <option value="5">Đợt 5</option>
                                <option value="6">Đợt 6</option>
                            </select>
                        </td>
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
                            <input type="button" id="search_tran" value="Thêm giftcode" class="button blueB"
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
    $("#search_tran").click(function () {
        if($("#soluong").val() == ""){
            $("#errogift").html("Bạn phải nhập số lượng giftcode");
            return false;
        }else if($("#nguonxuat").val()== ""){
            $("#errogift").html("Bạn phải chọn nguồn xuất giftcode");
            return false;
        }else if($("#phathanh").val()== ""){
            $("#errogift").html("Bạn phải chọn đợt phát hành giftcode");
            return false;
        }
        $("#spinner").bind("ajaxSend", function () {
            $(this).show();
        }).bind("ajaxStop", function () {
            $(this).hide();
        }).bind("ajaxError", function () {
            $(this).hide();
        });
        if($("#money").val()==1){

        $.ajax({
            type: "POST",
            url: "<?php echo $linkapi?>",
            data: {
                c: 301,
                gp: $("#menhgiavin").val(),
                gq: $("#soluong").val(),
                gs: $("#nguonxuat").val(),
                gl: $("#phathanh").val(),
                mt: $("#money").val()
            },
            dataType: 'json',
            success: function (result) {
                if(result.errorCode == 0){
                    $("#errogift").html("Bạn xuất giftcode thành công");
                }else if(result.errorCode = 1003){
                    $("#errogift").html("Bạn nhập số lượng giftcode lớn hơn trong kho");
                }
            }
        })
    }else if($("#money").val()==0){
            $.ajax({
                type: "POST",
                url: "<?php echo $linkapi?>",

                data: {
                    c: 301,
                    gp: $("#menhgiaxu").val(),
                    gq: $("#soluong").val(),
                    gs: $("#nguonxuat").val(),
                    gl: $("#phathanh").val(),
                    mt: $("#money").val()
                },
                dataType: 'json',
                success: function (result) {
                    if(result.errorCode == 0){
                        $("#errogift").html("Bạn xuất giftcode thành công");
                    }else if(result.errorCode = 1003){
                        $("#errogift").html("Bạn nhập số lượng giftcode lớn hơn trong kho");
                    }
                }
            })
        }
    });


    $(document).ready(function() {
        $("#soluong").keydown(function (e) {
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

        $('#money').change(function() {
            var val = $("#money option:selected").val();
           if(val == 1){
               $("#labelvin").css("display","block");
               $("#menhgiavin").css("display","block");
               $("#labelxu").css("display","none");
               $("#menhgiaxu").css("display","none");
           }else if(val == 0){
               $("#labelxu").css("display","block");
               $("#menhgiaxu").css("display","block");
               $("#labelvin").css("display","none");
               $("#menhgiavin").css("display","none");
           }
        });
    });
</script>

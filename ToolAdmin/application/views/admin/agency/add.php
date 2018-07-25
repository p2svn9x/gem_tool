<!-- head -->
<?php $this->load->view('admin/agency/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
<div class="widget">
<div class="title">
    <h6>Thêm đại lý</h6>
</div>
<form method="post" action="" class="list_filter form">
<fieldset>
    <div class="formRow">
        <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" style="width: 250px;"
                                                    placeholder="Nhập nick name"
                                                    value="<?php echo $this->input->get('name') ?>" name="name"></span>
            <span class="autocheck" name="name_autocheck"></span>

            <div class="submitdaily">
                <input type="submit" value="Tìm kiếm" id="submit" class="button blueB"
                       style="margin-left: -270px;">
                <input type="reset"
                       onclick="window.location.href = '<?php echo admin_url('agency/add') ?>'; "
                       value="Reset" class="basic">
            </div>
        </div>
        <div class="clear"></div>
    </div>
</fieldset>

</form>
<?php if ($this->input->post()) { ?>
    <?php if ($status == "A") { ?>
        <?php if ($info == false) {
            ?>
            <div id="showinfo">
                <div class="formRow">
                    <div class="formRight">
                        <?php echo $str ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        <?php } else { ?>
            <?php foreach ($info as $us): ?>
                <input type="hidden" name="username" id="username" value="<?php echo $us->user_name ?>">
                <input type="hidden" name="password" id="password" value="<?php echo $us->password ?>">
                <input type="hidden" name="nickname" id="nickname" value="<?php echo $us->nick_name ?>">
                <input type="hidden" name="mobile" id="mobile" value="<?php echo $us->mobile ?>">
                <input type="hidden" name="email" id="email" value="<?php echo $us->email ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $us->id ?>">

                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 300px;margin-bottom:-2px;width: 100px"> Tên đăng
                                    nhập:</label></td>
                            <td>
                                <span class="req" id="usernamespan"><?php echo $us->user_name ?></span>
                            </td>
                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Nick name: </label>
                            </td>
                            <td><span class="req"><?php echo $us->nick_name ?></span></td>
                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Số vin dư: </label>
                            </td>
                            <td> <span
                                    class="req"><?php echo number_format($us->vin_total) ?></span></td>
                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser" style="margin-left: 300px;margin-bottom:-2px;width: 100px"> Tên đại lý:<span class="req">*</span></label></td>
                            <td>
                                <input  id="namedaily" type="text" style="height: 25px;width: 200px"> <span id="errorname" class="req"></span>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser" style="margin-left: 300px;margin-bottom:-2px;width: 100px"> Số điện thoại:<span class="req">*</span></label></td>
                            <td>
                                <input  id="phonedaily" type="text" style="height: 25px;width: 200px"> <span id="errorphone" class="req"></span>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser" style="margin-left: 300px;margin-bottom:-2px;width: 100px"> Địa chỉ:<span class="req">*</span></label></td>
                            <td>
                                <input  id="addressdaily" type="text" style="height: 25px;width: 200px"> <span id="erroradd" class="req"></span>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser" style="margin-left: 300px;margin-bottom:-2px;width: 100px"> Facebook:</label></td>
                            <td>
                                <input  id="facebookdaily" type="text" style="height: 25px;width: 200px">
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" style="margin-left: 300px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Set đại lý cấp 1:
                                </label>
                            <td>
                                <input type="button"
                                       id="setdaily1"
                                       name="setdaily1"
                                       value="<?php echo $daily1 ?>"
                            </td>

                        </tr>
                    </table>
                </div>

            <?php endforeach; ?>
        <?php } ?>
    <?php } else if ($status == "D") { ?>
        <?php if ($infodaily == false) {
            ?>
            <div id="showinfo">
                <div class="formRow">
                    <div class="formRight">
                        <?php echo $str ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        <?php } else { ?>
            <?php foreach ($infodaily as $us): ?>
                <input type="hidden" name="username" id="username" value="<?php echo $us->user_name ?>">
                <input type="hidden" name="nickname" id="nickname" value="<?php echo $us->nick_name ?>">
                <input type="hidden" name="mobile" id="mobile" value="<?php echo $us->mobile ?>">
                <input type="hidden" name="email" id="email" value="<?php echo $us->email ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $us->id ?>">

                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" style="margin-left: 400px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Nick name: </label>
                            </td>
                            <td><span class="req"><?php echo $us->nick_name ?></span></td>
                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Set đại lý cấp 2:
                                </label>
                            </td>
                            <td><input type="button"
                                       id="setdaily2"
                                       name="setdaily2"
                                       value="<?php echo $daily2 ?>"></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php } ?>
    <?php } ?>
    <div class="title">
        <h6>Lịch sử giao dịch hệ thống</h6>
    </div>
    <div class="formRow">
        <form class="list_filter form" action="<?php echo admin_url('transaction') ?>" method="get">
            <table>
                <tr>
                    <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
                    <td class="">
                        <select id="money_type" name="money"
                                style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                            <option value="vin">Vin</option>
                            <option value="xu">Xu</option>
                        </select>
                    </td>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                    <td class="item"><input name="created"
                                            value="<?php echo $this->input->get('created') ?>"
                                            id="toDate" type="text" class="datepicker"/></td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Đến ngày: </label>
                    </td>
                    <td class="item"><input name="created_to"
                                            value="<?php echo $this->input->get('created_to') ?>"
                                            id="fromDate" type="text" class="datepicker-input"/></td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Tên game: </label>
                    </td>
                    <td class="item"><select id="servicename" name="servicename"
                                             style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                            <option value="">Tên Game</option>
                            <option value="Sam">Sâm</option>
                            <option value="BaCay">Ba cây</option>
                            <option value="Binh">Binh</option>
                            <option value="Tlml">TLML</option>
                            <option value="VQMM">VQMM</option>
                            <option value="TaiXiu">Tài Xỉu</option>
                            <option value="MiniPoker">Mini Poker</option>
                            <option value="CaoThap">Cao Thấp</option>
                            <option value="BauCua">Bầu Cua</option>
                            <option value="Safe Money">Safe Money</option>
                            <option value="Top Up">Top Up</option>
                            <option value="Internet Banking">Internet Banking</option>
                            <option value="Cash Out">Cash Out</option>
                            <option value="Transfer Money">Transfer Money</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </td>
                    <td style="">
                        <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                               style="margin-left: 20px">
                    </td>
                    <td>
                        <input type="reset"
                               onclick="window.location.href = '<?php echo admin_url('transaction') ?>'; "
                               value="Reset" class="basic" style="margin-left: 20px">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
        <thead>
        <tr style="height: 20px;">
            <td>Ngày tạo</td>
            <td>Hành động</td>
            <td>Mô tả</td>
            <td style="width:100px;">Vin hiện có</td>
            <td>Vin thay đổi</td>
            <td>Nick name</td>
            <td>Tên game</td>
        </tr>
        </thead>
        <tbody id="logaction">
        </tbody>
    </table>
    <div class="pagination">
        <div id="pagination"></div>
    </div>

<?php } else { ?>
    <div id="showinfo" style="display: none">
    </div>

<?php } ?>


</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#setdaily1").click(function () {
            if($("#namedaily").val() == ""){
                $("#errorname").html("Tên đại lý không được để trống");
                return false;
            }else  if($("#phonedaily").val() == ""){
                $("#errorphone").html("Số điện thoại không được để trống");
                $("#errorname").html("");
                return false;
            }else  if($("#addressdaily").val() == ""){
                $("#erroradd").html("Địa chỉ không được để trống");
                $("#errorphone").html("");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url(); ?>" + "/agency/daily1",
                dataType: 'json',
                data: {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    email: $("#email").val(),
                    nickname: $("#nickname").val(),
                    id: $("#id").val(),
                    namedaily : $("#namedaily").val(),
                    phonedaily : $("#phonedaily").val(),
                    addressdaily: $("#addressdaily").val(),
                    facebookdaily: $("#facebookdaily").val()

                },
                success: function (response) {
                    alert(response);
                    window.location.href = "<?php admin_url("agency") ?>";
                }
            });
        });
        $("#setdaily2").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url(); ?>" + "/agency/daily2",
                dataType: 'json',
                data: {
                    username: $("#username").val(),
                    mobile: $("#mobile").val(),
                    email: $("#email").val(),
                    nickname: $("#nickname").val(),
                    id: $("#id").val()
                },
                success: function (response) {
                    alert(response);
                    window.location.href = "<?php admin_url("agency") ?>";
                }
            });
        });
    });
    $("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#search_tran").click(function () {
        var from = $("#fromDate").datepicker('getDate');
        var to = $("#toDate").datepicker('getDate');
        if (to > from) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    $("#search_tran").click(function () {
        var result = "";
        $.ajax({
            type: "POST",
            url: "http://104.155.193.15:8082/api_backend",
            data: {
                c: 3,
                nn: $("#nickname").val(),
                ts: $("#toDate").val(),
                te: $("#fromDate").val(),
                mt: $("#money_type").val()
            },
            dataType: 'json',
            success: function (result) {
                $.each(result, function (index, value) {
                    result += resultSearchTransction(value.transactionTime, value.actionName, value.description, value.currentMoney, value.moneyExchange, value.nickName, value.serviceName)
                });
                $('#logaction').html(result);
                Pagging();
            }
        })
    });
    function resultSearchTransction(transactionTime, actionName, description, currentMoney, moneyExchange, nickName, serviceName) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + transactionTime + "</td>";
        rs += "<td>" + actionName + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + currentMoney + "</td>";
        rs += "<td>" + moneyExchange + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + serviceName + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        var result = "";
        $.ajax({
            type: "POST",
            url: "http://104.155.193.15:8082/api_backend",
            data: {
                c: 3,
                nn: $("#nickname").val(),
                ts: $("#toDate").val(),
                te: $("#fromDate").val(),
                mt: $("#money_type").val()
            },

            dataType: 'json',
            success: function (result) {
                $.each(result, function (index, value) {
                    result += resultSearchTransction(value.transactionTime, value.actionName, value.description, value.currentMoney, value.moneyExchange, value.nickName, value.serviceName)
                });
                $('#logaction').html(result);
                Pagging();
            }
        })

    });

</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function Pagging() {
        var items = $("#checkAll tbody tr");
        var numItems = items.length;
        var perPage = 10;
        // only show the first 2 (or "first per_page") items initially
        items.slice(perPage).hide();

        // now setup pagination
        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function (pageNumber) { // this is where the magic happens
                // someone changed page, lets hide/show trs appropriately
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
            }
        });
    }
</script>
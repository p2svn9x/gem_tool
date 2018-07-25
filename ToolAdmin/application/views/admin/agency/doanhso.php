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
            <h6>Giao dịch đại lý</h6>
        </div>
        <div class="formRow">
            <form class="list_filter form" action="<?php echo admin_url('agency/doanhso')."/".$username ?>"
                  method="get">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 250px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
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
                        <td style="">
                            <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB" style="margin-left: 20px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('agency/doanhso')."/".$username ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td><h3 style="margin-left: 50px">Doanh số</h3></td>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 258px;margin-bottom:-2px;width: 100px"> Tổng bán:</label></td>
                    <td>
                        <span class="req" id="usernamespan"><?php echo $totalban; ?></span>
                    </td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Tổng mua: </label>
                    </td>
                    <td><span class="req"><?php echo $totalmua; ?></span></td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Tổng mua bán:</label>
                    </td>
                    <td>  <span
                            class="req"><?php echo $totalban + $totalmua; ?></span></td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 400px;margin-bottom:-2px;width: 100px"> Tổng vin bán:</label>
                    </td>
                    <td>
                        <span class="req" id="usernamespan"><?php echo number_format($totalbanmoney) ?></span>
                    </td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Tổng vin mua: </label>
                    </td>
                    <td><span class="req"><?php echo number_format($totalmuamoney) ?></span></td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 106px;margin-bottom:-3px;"
                               class="formLeft"> Tổng vin mua bán:</label>
                    </td>
                    <td>  <span
                            class="req"><?php echo number_format($totalbanmoney + $totalmuamoney) ?></span></td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td><h3 style="margin-left: 50px">Phí giao dịch</h3></td>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 226px;margin-bottom:-2px;width: 100px"> Phí vin bán:</label>
                    </td>
                    <td>
                        <span class="req" id="usernamespan"><?php echo number_format($totalbanmoney - $totalmoneyrece) ?></span>
                    </td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Phí vin mua: </label>
                    </td>
                    <td><span class="req"><?php echo number_format($totalmuamoney - $totalmoneyrecemua) ?></span></td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 131px;margin-bottom:-3px;"
                               class="formLeft"> Tổng phí vin mua bán:</label>
                    </td>
                    <td>  <span
                            class="req"><?php echo number_format($totalbanmoney + $totalmuamoney - $totalmoneyrecemua - $totalmoneyrece) ?></span></td>
                </tr>
            </table>

        </div>
        <div class="formRow">
            <table>
                <tr>
                    <td><h3 style="margin-left: 50px">Hoàn phí và thưởng</h3></td>
                    <td>
                        <label for="param_name" style="margin-left: 159px;width: 100px;margin-bottom:-3px;"
                               class="formLeft">Phí hoàn trả:</label>
                    </td>
                    <td>  <span
                            class="req"><?php echo number_format(($totalbanmoney + $totalmuamoney - $totalmoneyrecemua - $totalmoneyrece)/2) ?></span></td>
                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft">Thưởng:</label>
                    </td>
                    <td>
                        <?php if(($totalbanmoney + $totalmuamoney)< 500000000): ?>
                        <span class="req"><?php echo "0" ?></span>
                        <?php elseif(($totalbanmoney + $totalmuamoney) >= 500000000 && ($totalbanmoney + $totalmuamoney) < 1000000000 ): ?>
                        <span class="req"><?php echo number_format("2000000") ?></span>
                        <?php elseif(($totalbanmoney + $totalmuamoney) >= 1000000000 && ($totalbanmoney + $totalmuamoney) < 3000000000 ): ?>
                        <span class="req"><?php echo number_format("5000000") ?></span>
                        <?php elseif(($totalbanmoney + $totalmuamoney) >= 3000000000 ): ?>
                        <span class="req"><?php echo number_format("10000000") ?></span>
                        <?php endif ;?>
                    </td>
                </tr>
            </table>

        </div>

    </div>
</div>
<div class="pagination">
    <div id="pagination"></div>
</div>
<input type="hidden" id="tranussername" value="<?php echo $username ?>">
<script>
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


</script>




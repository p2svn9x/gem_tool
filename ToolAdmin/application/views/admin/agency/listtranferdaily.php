<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Lich sử chuyển nhận tiền đại lý</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Lich sử chuyển nhận tiền dại lý</h6>
<!--            <div  class="num f12">Tổng tiền bán: <b >--><?php //echo number_format($totalbanmoney) ?><!--</b></div>-->
<!--            <div  class="num f12">Tổng tiền mua: <b >--><?php //echo number_format($totalmuamoney) ?><!--</b></div>-->
<!--            <div  class="num f12">Tổng tiền mua bán <b>--><?php //echo number_format($totalmuamoney+$totalbanmoney) ?><!--</b></div>-->
            <div  class="num f12">Tổng bán: <b><?php echo $numtran?></b></div>
            <div  class="num f12">Tổng mua: <b><?php echo $numrece?></b></div>
            <div  class="num f12">Tổng mua bán <b id ="num"></b></div>
            <input type="hidden" name="daily" id="daily" value="<?php echo $username ?>">
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable " id="checkAll">
            <thead class="filter">
            <tr>
                <td colspan="13">
                        <form class="list_filter form" action="<?php echo admin_url('agency/listtranferdaily')."/".$username ?>"
                              method="get">
                            <table>
                                <tr>
                                    <td>
                                        <label for="param_name" class="formLeft" id="nameuser"
                                               style="margin-left: 400px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
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
                                               onclick="window.location.href = '<?php echo admin_url('agency/listtranferdaily')."/".$username ?>'; "
                                               value="Reset" class="basic" style="margin-left: 20px">
                                    </td>
                                </tr>
                            </table>
                    </form>
                </td>
            </tr>
            </thead>
            <thead>
            <tr style="height: 20px;">
                <td style="width:80px;">STT</td>
                <td>Ngày tạo</td>
                <td>Tài khoản chuyển vin</td>
                <td>Tài khoản nhận vin</td>
                <td>Số vin chuyển</td>
                <td>Số vin nhận</td>
                <td>Lý do chuyển</td>
            </tr>
            </thead>
            <tbody id="logdongbang">
            <?php $i = 1; ?>
            <?php foreach($list as $row):?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td><?php echo $row->timestamp ?></td>
                    <td class="nametf"> <a id="tranfer<?php echo $i;?>" href="<?php echo admin_url('agency/listransacdaily/' . $row->nick_name_tranfer)?>" >
                            <?php echo $row->nick_name_tranfer ?>
                        </a></td>
                    <td class="namedl"><a id="receive<?php echo $i;?>" href="<?php echo admin_url('agency/listransacdaily/' . $row->nick_name_receive)?>" >
                           <?php echo $row->nick_name_receive ?>
                        </a></td>
                    <td><?php echo $row->money ?></td>
                    <td><?php echo $row->money_receive ?></td>
                    <td><?php echo $row->reason ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <div id="pagination"></div>
    </div>
    <div class="widget">
        <div class="title">
            <h6>Danh sách đại lý cấp 2 trực thuộc</h6>

        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter">

            </thead>
            <thead>
            <tr>
                <td style="width:80px;">STT</td>
                <td>Nick name</td>
                <td>Mail</td>
                <td>Số điện thoại</td>
                <td>Giao dịch</td>
                <td style="width:100px;">Hành động</td>
            </tr>
            </thead>
            <tbody>
            <?php if($status == "A") :?>
            <?php $i = 1; ?>
            <?php foreach ($list1 as $row): ?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td><span title="<?php echo $row->FullName ?>" class="tipS">
							  <a href="<?php echo admin_url('agency/listtranferdaily/' . $row->FullName) ?>" style="color: #37ca1e">
                                  <?php echo $row->FullName ?>
                              </a>
						</span></td>
                    <td><span title="<?php echo $row->Email ?>" class="tipS">
							<?php echo $row->Email ?>
						</span></td>
                    <td><span title="<?php echo $row->Phone ?>" class="tipS">
							<?php echo $row->Phone ?>
						</span></td>
                    <td class="option">
                        <a href="<?php echo admin_url('agency/doanhso/' . $row->FullName) ?>">
                            Chi tiết
                        </a>
                    </td>
                    <td class="option">
                        <a href="<?php echo admin_url('agency/delete/' . $row->ID) ?>" title="Xóa"
                           class="tipS verify_action">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                        </a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php else: ?>
            <?php foreach ($list2 as $row): ?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td><span title="<?php echo $row->FullName ?>" class="tipS">
							  <a href="<?php echo admin_url('agency/listtranferdaily/' . $row->FullName) ?>" style="color: #37ca1e">
                                  <?php echo $row->FullName ?>
                              </a>
						</span></td>
                    <td><span title="<?php echo $row->Email ?>" class="tipS">
							<?php echo $row->Email ?>
						</span></td>
                    <td><span title="<?php echo $row->Phone ?>" class="tipS">
							<?php echo $row->Phone ?>
						</span></td>
                    <td class="option">
                        <a href="<?php echo admin_url('agency/doanhso/' . $row->FullName) ?>">
                            Chi tiết
                        </a>
                    </td>
                    <td class="option">
                        <a href="<?php echo admin_url('agency/delete/' . $row->ID) ?>" title="Xóa"
                           class="tipS verify_action">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                        </a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#search_tran").click(function(){
        var from=$("#fromDate").datepicker('getDate');
        var to =$("#toDate").datepicker('getDate');
        if(to>from)
        {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    $("#search_tran").click(function(){
        Pagging();
    });
    $(document).ready(function () {

        $(".namedl").each(function(index) {
            $receive =$.trim(($("#receive"+(index+1)).html()));
            $namedl=$("#daily").val();

            if($receive==$namedl)
            {

                $("#receive"+(index+1)).css( "color", "#37ca1e" );
            }
        });
        $(".nametf").each(function(index) {
            $tranfer =$.trim(($("#tranfer"+(index+1)).html()));
            $nametf=$("#daily").val();

            if($tranfer==$nametf)
            {

                $("#tranfer"+(index+1)).css( "color", "#37ca1e" );
            }
        });
        function commaSeparateNumber(val){
            while (/(\d+)(\d{3})/.test(val.toString())){
                val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
            }
            return val;
        }
        Pagging();

    });
    function Pagging(){
        var items = $("#checkAll #logdongbang tr");
        var numItems = items.length;
        $("#num").html(numItems) ;
        var perPage = 10;
        // only show the first 2 (or "first per_page") items initially
        items.slice(perPage).hide();
        // now setup pagination
        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function(pageNumber) { // this is where the magic happens
                // someone changed page, lets hide/show trs appropriately
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
            }
        });
    }
</script>
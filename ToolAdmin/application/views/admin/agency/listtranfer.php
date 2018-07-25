<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Lich sử chuyển nhận tiền</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Lich sử chuyển nhận tiền</h6>
            <div  class="num f12">Tổng số: <b id ="num"></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter">
            <tr>
                <td colspan="13">
                    <form class="list_filter form" action="<?php echo admin_url('agency/listtranfer') ?>" method="get">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                            <tr>
                                <td style="..." class="label"><label for="filter_id"></label></td>
                                <td style="..." class="label"><label for="filter_id"></label></td>
                                <td style="..." class="label"><label for="filter_id">Tài khoản chuyển tiền</label></td>
                                <td style="..." class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name"></td>
                                <td style="..." class="label"><label for="filter_id">Tài khoản nhận tiền</label></td>
                                <td style="..." class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('namece') ?>" name="namece"></td>
                                <td class="label" style="width:60px;"><label for="filter_created">Từ ngày</label></td>
                                <td class="item"><input name="created" value="<?php echo $this->input->get('created') ?>" id="toDate" type="text" class="datepicker"/></td>
                                <td class="label"><label for="filter_created_to">Đến ngày</label></td>
                                <td class="item"><input name="created_to" value="<?php echo $this->input->get('created_to') ?>" id="fromDate"  type="text"  class="datepicker-input" /></td>
                                <td style="">
                                    <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"></td>
                                <td>
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('agency/listtranfer') ?>'; " value="Reset"  class="basic">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
            </thead>
            <thead>
            <tr style="height: 20px;">
                <td style="width:80px;">STT</td>
                <td>Ngày tạo</td>
                <td>Tài khoản chuyển tiền</td>
                <td>Tài khoản nhận tiền/td>
                <td>Số tiền chuyển</td>
                <td>Số tiền nhận</td>
                <td>Lý do chuyển</td>
            </tr>
            </thead>
            <tbody id="logdongbang">
            <?php $i = 1; ?>
            <?php foreach($list as $row):?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td><?php echo $row->timestamp ?></td>
                    <td><?php echo $row->nick_name_tranfer ?></td>
                    <td><?php echo $row->nick_name_receive ?></td>
                    <td><?php echo $row->money ?></td>
                    <td><?php echo $row->money_receive ?></td>
                    <td><?php echo $row->reason ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="pagination">
    <div id="pagination"></div>
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
        var perPage = 50;
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
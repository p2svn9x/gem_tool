<!-- head -->
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Hành động admin</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách hành động admin</h6>
            <div class="num f12">Tổng số: <b><?php echo count($list) ?></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr>
                <td style="width:80px;">STT</td>
                <td>Ngày tạo</td>
                <td>Tên hành động</td>
                <td style="width:100px;">Số tiền cộng trừ</td>
                <td>Nick game</td>
                <td>Tài khoản admin</td>
                <td>Loại tiền</td>
            </tr>
            </thead>
            <tbody id="logdongbang">
            <?php $stt = 1; ?>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->id ?>">
                    <td class="textC"><?php echo $stt ?></td>
                    <td>
						<span title="<?php echo $row->timestamp ?>" class="tipS">
							<?php echo $row->timestamp ?>
						</span>
                    </td>
                    <td>
						<span title="<?php echo $row->action ?>" class="tipS">
							<?php echo $row->action ?>
						</span>
                    </td>
                    <td>
						<span title="<?php echo $row->money ?>" class="tipS">
							<?php echo $row->money ?>
						</span>
                    </td>
                    <td>
						<span title="<?php echo $row->account_name ?>" class="tipS">
							<?php echo $row->account_name ?>
						</span>
                    </td>
                    <td>
						<span title="<?php echo $row->username ?>" class="tipS">
							<?php echo $row->username ?>
						</span>
                    </td>
                    <td>
						<span title="<?php echo $row->money_type ?>" class="tipS">
							<?php echo $row->money_type ?>
						</span>
                    </td>
                </tr>
                <?php $stt++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="pagination">
    <div id="pagination"></div>
</div>
<div class="clear mt30"></div>

<script>
    $(document).ready(function () {

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
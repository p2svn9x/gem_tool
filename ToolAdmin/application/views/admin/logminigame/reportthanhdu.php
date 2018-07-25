<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Sự kiện thánh dự</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Lịch sử thánh dự</h6>
            <div  class="num f12">Tổng số: <b id ="num"></b></div>
        </div>
        <div class="formRow">
            <form class="list_filter form" action="<?php echo admin_url('logminigame/reportthanhdu') ?>" method="get">
                <table>
                    <tr>
                        <td ><label style="margin-left: 50px;margin-bottom:-2px;width: 100px" >Nick name:</label></td>
                        <td ><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"  id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name"></td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Kết quả:</label></td>
                        <td class="">
                            <select id="result_type" name="result" style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                                <option value="0" <?php if ($this->input->get('result') == "0"){echo 'selected';}?>>Thua liên tiếp</option>
                                <option value="1"<?php if ($this->input->get('result') == "1"){echo 'selected';}?>>Thắng liên tiếp</option>
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
                                                value="<?php echo $this->input->get('created_to')?>"
                                                id="fromDate" type="text" class="datepicker-input"/></td>
                        <td style="">
                            <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB" style="margin-left: 20px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('logminigame/reportthanhdu') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                        <td>
                            <input type="button" id="exportexl" value="Export Exel">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td style="width:80px;">STT</td>
                <td>Ngày tạo</td>
                <td>Nick name</td>
                <td>Tổng vin</td>
                <td>Tổng số ván</td>
                <td>Phiên gần nhất</td>
                <td>Tổng phiên</td>
            </tr>
            </thead>
            <tbody id="logdongbang">
            <?php $i = 1; ?>
            <?php foreach($list as $row): ?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td><?php echo $row->last_update ?></td>
                    <td><?php echo $row->user_name ?></td>
                    <td><?php echo number_format($row->total_betting) ?></td>
                    <td><?php echo $row->number ?></td>
                    <td><?php echo $row->last_reference ?></td>
                    <td><?php echo $row->references ?></td>
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
<?php echo $str; ?>
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
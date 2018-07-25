<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Log game tài xỉu</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>  <a href="<?php echo tranfer_url('setcau/setcauadd')?>" title="Thêm mới" class="tipS lightbox" >
                        <img src="<?php echo public_url('admin') ?>/images/add-icon.png"/>
                        <span>Thêm cầu tài xỉu</span>
                    </a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Set cầu tài xỉu</h6>
            <div class="num f12">Tổng xiu: <b><?php echo $countxiu ?></b></div>
            <div class="num f12">Tổng tài: <b><?php echo $counttai ?></b></div>
            <div class="num f12">Tổng cầu: <b id="num"></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Cầu</td>
                <td style="width:100px;">Hành động</td>
            </tr>
            </thead>
            <tbody id="logdongbang">
            <?php foreach ($list as $key => $value): ?>

                <tr>
                    <td width="1000"><span title="" class="tipS">
                            <?php $string = $value;
                            $string = str_replace(0, "<img style=\"width:20px\" src=\"../public/admin/images/sp_xiu.png\" title=\"Xỉu\">", $string);
                            $string = str_replace(1, "<img style=\"width:20px\" src=\"../public/admin/images/sp_tai.png\" title=\"Tài\">", $string);
                            echo $string;
                            ?>
						</span></td>
                    <td class="option">
                        <a href="<?php echo tranfer_url('setcau/setcauadd') ?>" title="Thêm mới"
                           class="tipS lightbox">
                            <img src="<?php echo public_url('admin') ?>/images/add-icon.png"/>
                        </a>
                        <a title="Sửa cầu" class="tipS lightbox"
                           href="<?php echo tranfer_url('setcau/setcauedit/' . $key) ?>">
                            <img src="<?php echo public_url('admin/images') ?>/edit-icon.png">
                        </a>
                        <a href="<?php echo tranfer_url('setcau/delete/' . $key) ?>" title="Xóa"
                           class="tipS verify_action">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <div id="pagination"></div>
    </div>

</div>
<div class="clear mt30"></div>
<script>
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
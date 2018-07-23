
<?php if($role == false): ?>
<section class="content-header">
    <h1>
        Bạn không được phân quyền
    </h1>
</section>
<?php else: ?>
<section class="content-header">
    <h1>
       Sét cầu xóc đĩa
    </h1>
    <a  class="ajax" href="<?php echo base_url('xocdia/setcauadd') ?>"><input type="button" class="btn btn-primary pull-right" value="Thêm cầu xóc đĩa" style="margin-right: 10px; margin-bottom: 10px"></a>
    <label class="pull-right">Tổng chẵn: <b style="color: red;margin-right: 10px"><?php echo $countxiu ?></b></b></label>
    <label class="pull-right">Tổng lẻ: <b style="color: red;margin-right: 10px"><?php echo $counttai ?></b></b></label>
    <label class="pull-right">Tổng cầu: <b id="num" style="color: red;margin-right: 10px"><?php echo $counttai ?></b></b></label>

</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="col-sm-12">

                        <?php if (isset($message) && $message): ?>
                            <?php echo $message ?>
                        <?php endif; ?>

                    </div>
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Cầu xóc đĩa</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody id="logaction">
                            <?php $i = 1; ?>
                            <?php foreach ($list as $key => $value): ?>

                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td width="1000"><span>
                            <?php $string = $value;
                            $string = str_replace(0, '<img style="width:20px" src="public/admin/images/sp_xiu.png" title="Chẵn">', $string);
                            $string = str_replace(1, '<img style="width:20px" src="public/admin/images/sp_le.png" title="Lẻ">', $string);
                            echo $string;
                            ?>
						</span></td>
                                    <td class="option">
                                        <a title="Sửa cầu" class="ajax"
                                           href="<?php echo base_url('xocdia/setcauedit/' . $key) ?>">
                                            <img src="<?php echo public_url('admin/images') ?>/edit.png">
                                        </a>
                                        <a href="<?php echo base_url('xocdia/delete/' . $key) ?>" title="Xóa"
                                           class="verify_action">
                                            <img src="<?php echo public_url('admin') ?>/images/delete.png"/>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>
                    <div id="pagination" style="float: right"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<script>
    $(document).ready(function () {
        $(".ajax").colorbox({iframe:true, innerWidth:1000, innerHeight:300});

        function commaSeparateNumber(val){
            while (/(\d+)(\d{3})/.test(val.toString())){
                val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
            }
            return val;
        }
        Pagging();

    });

    $("a.verify_action").click(function(event){
        if(!confirm('Bạn chắc chắn muốn xóa ?'))
        {
            return false;
        }
    })
    function Pagging(){
        var items = $("#example2 #logaction tr");
        var numItems = items.length;
        $("#num").html(numItems) ;
        var perPage = 100;
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
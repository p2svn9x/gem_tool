
<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
<section class="content-header">
    <h1>
        Danh sách log hành động admin
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <form action="<?php echo base_url('logaction') ?>" method="post">
                    <div class="form-group">
                        <div class="row">

                            <label class="col-sm-1 control-label">Tài khoản admin</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="name" value="<?php echo $this->input->post('name')?>">
                            </div>
                            <label class="col-sm-1 control-label">Hành động admin</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="action" value="<?php echo $this->input->post('action')?>">
                            </div>

                        </div>

                    </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-1 control-label">Từ ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate" name="fromDate" value="<?php echo $this->input->post('fromDate')?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Đến ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate" name="toDate" value="<?php echo $this->input->post('toDate')?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"  onclick="window.location.href = '<?php echo base_url('logaction') ?>'; "></div>
                                </div>
                            </div>
                        </form>
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hành động</th>
                                <th>Nick name admin đại lý</th>
                                <th>Nick name đại lý </th>
                                <th>Số lượng giftcode hoặc tài khoản</th>
                                <th>Mệnh giá</th>
                                <th>Tiền</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody id="logdongbang">
                            <?php $stt = 1; ?>
                            <?php foreach ($list as $row): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td>
						                <?php echo $row->action ?>
                                    </td>
                                    <td>
                                        <?php echo $row->username ?>
                                    </td>
                                    <td class="col-sm-4" style="word-break: break-all">
                                        <?php echo $row->account_name ?>
                                    </td>
                                    <td>
                                        <?php echo $row->quantity ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row->money) ?>
                                    </td>
                                    <td>
                                        <?php echo $row->money_type ?>
                                    </td>
                                    <td>
                                        <?php echo $row->timestamp ?>
                                    </td>
                                </tr>
                                <?php $stt++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div id="pagination" style="float: right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<script>

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
    $(document).ready(function () {

        Pagging();

    });
    function Pagging(){
        var items = $("#example2 #logdongbang tr");
        var numItems = items.length;
        $("#num").html(numItems) ;
        var perPage = 20;
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
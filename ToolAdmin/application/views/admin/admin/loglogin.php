<!-- head -->
<?php $this->load->view('admin/action/head', $this->data) ?>
<div class="line"></div>
<?php if ($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
    <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
    <div class="wrapper">

        <div class="widget">
            <?php if(empty($list)):?>
                <h4 id="resultsearch" style="color: red;margin-left: 20px"><?php echo "Không tìm thấy kết quả"; ?></h4>
            <?php endif; ?>
            <div class="title">
                <h6>Log login admin</h6>
            </div>

            <form class="list_filter form" action="<?php echo admin_url('actionadmin/loglogin') ?>" method="post">
                <div class="formRow">

                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $this->input->post('toDate') ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>


                            </td>

                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Đến ngày: </label>
                            </td>
                            <td class="item">

                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" id="fromDate" name="fromDate"
                                           value="<?php echo $this->input->post('fromDate') ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>
                            </td>

                        </tr>

                    </table>

                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Username:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtusername" value="<?php echo $this->input->post('username') ?>" name="username">
                            </td>
                            <td>
                                <label for="param_name" style="width: 100px;margin-bottom:-3px;margin-left: 43px;"
                                       class="formLeft">Nickname: </label>
                            </td>
                            <td><input type="text" style="margin-left: 27px;margin-bottom:-2px;width: 150px"
                                       id="txtnickname" value="<?php echo $this->input->post('nickname') ?>"
                                       name="nickname"></td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Ip:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtip" value="<?php echo $this->input->post('txtip') ?>" name="txtip">
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Trạng thái:</label></td>
                            <td class="">
                                <select id="ststatus" name="ststatus"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">

                                    <option value ="0" <?php if ($this->input->post('ststatus') == "0") {
                                        echo "selected";
                                    } ?>>Thành công
                                    </option>
                                    <option value="1" <?php if($this->input->post('ststatus') == "1") {
                                        echo "selected";
                                    } ?>>Thất bại
                                    </option>
                                </select>
                            </td>
                            <td style="">
                                <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>

                        </tr>
                    </table>
                </div>

                <div class="formRow">
                </div>
            </form>
            <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover" id="checkAll">
                <thead>
                <tr>
                    <td style="width:80px;">STT</td>
                    <td>Username</td>
                    <td>Nickname</td>
                    <td>Ip</td>
                    <td>Thiết bị</td>
                    <td>Mô tả</td>
                    <td>Trạng thái</td>
                    <td>Tool</td>
                    <td>Ngày tạo</td>
                </tr>
                </thead>
                <tbody id="logdongbang">
                <?php $stt = 1; ?>
                <?php foreach ($list as $row): ?>
                    <tr class="row_<?php echo $row->id ?>">
                        <td class="textC"><?php echo $stt ?></td>
                        <td>
                            <?php echo $row->username ?>
                        </td>
                        <td style="word-break: break-all;">
                            <?php echo $row->nickname ?>
                        </td>
                        <td>
                            <?php echo $row->ip ?>
                        </td>
                        <td>
                            <?php echo $row->agent ?>
                        </td>
                        <td>
                            <?php echo $row->action ?>
                        </td>
                        <td>
                            <?php if ($row->status == 0): ?>
                                <?php echo "Thành công" ?>
                            <?php elseif ($row->status == 1): ?>
                                <?php echo "Thất bại" ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo $row->tool ?>
                        </td>
                        <td>
                            <?php echo $row->createdate ?>
                        </td>
                    </tr>
                    <?php $stt++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="pagination">
            <div id="pagination"></div>
        </div>
    </div>
<?php endif; ?>
<div class="clear mt30"></div>
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo public_url()?>/admin/css/simplePagination.css" media="screen" />
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });
    $(document).ready(function () {

        Pagging();

    });
    function Pagging(){
        var items = $("#checkAll #logdongbang tr");
        var numItems = items.length;
        console.log(numItems);
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
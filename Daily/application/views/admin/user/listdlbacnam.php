

<?php if ($admin_info->nickname == $dlmb || $admin_info->nickname == $dlmn || $admin_info->nickname == $dlmt) : ?>

<section class="content-header">
    <h1>
        Danh sách đại lý cấp 1 trực thuộc
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <?php if (isset($message) && $message): ?>
                                <?php echo $message ?>
                            <?php endif; ?>

                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                                    <thead>
                                    <tr>
                                            <th>STT</th>
                                            <th>Tên đại lý</th>
                                            <th>Nick name</th>
                                            <th>Điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Số dư vin</th>
                                            <th>Két sắt</th>
                                            <th>Vippoint</th>
                                            <th>Vippoint tích lũy</th>
                                            <th>Tổng vin</th>
                                            <th>Doanh số</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $list1; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php else: ?>

    <section class="content-header">
        <h1>
            Bạn không được phân quyền
        </h1>
    </section>
<?php endif;?>


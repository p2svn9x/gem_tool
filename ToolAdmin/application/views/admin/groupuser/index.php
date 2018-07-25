<!-- head -->
<?php $this->load->view('admin/groupuser/head', $this->data) ?>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <?php if ($list != null) : ?>
            <div class="title">
                <h6>Danh sách nhóm người dùng</h6>
                <div class="num f12">Tổng số: <b><?php echo $total ?></b></div>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr>
                    <td style="width:80px;">STT</td>
                    <td>Tên nhóm</td>
                    <td>Ghi chú</td>
                    <td style="width:100px;">Thao tác</td>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1; ?>
                <?php foreach ($list as $row): ?>
                    <tr>
                        <td class="textC"><?php echo $stt ?></td>
                        <td>
						<span title="<?php echo $row->Name ?>" class="tipS">
							<?php echo $row->Name ?>
						</span></td>
                        <td>
						<span title="<?php echo $row->Description ?>" class="tipS">
							<?php echo $row->Description ?>
						</span></td>
                        <td class="option">
                            <a href="<?php echo admin_url('groupuser/edit/' . $row->Id) ?>" title="Chỉnh sửa"
                               class="tipS ">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                            </a>
                            <a href="<?php echo admin_url('groupuser/delete/' . $row->Id) ?>" title="Xóa"
                               class="tipS verify_action">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                            </a>
                        </td>
                    </tr>
                    <?php $stt++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif ?>
        <?php if ($list == null): ?>
            Bạn không có quyền truy cập
        <?php endif ?>
    </div>
</div>
<?php endif ?>
<div class="clear mt30"></div>

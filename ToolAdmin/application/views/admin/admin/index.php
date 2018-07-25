<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data) ?>
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
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="widget">
            <?php if ($admin_info->Status == "A"): ?>
                <div class="title">
                    <h6>Danh sách admin</h6>

                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">

                    <thead>
                    <tr>
                        <td style="width:80px;">STT</td>
                        <td>Username</td>
                        <td>Nickname</td>
                        <td>Nhóm</td>
                        <td style="width:100px;">Hành động</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($list as $row): ?>
                        <tr>
                            <td class="textC"><?php echo $i; ?></td>
                            <td>
						<span title="<?php echo $row->UserName ?>" class="tipS">
							<?php echo $row->UserName ?>
						</span></td>
                            <td><span title="<?php echo $row->FullName ?>" class="tipS">
							<?php echo $row->FullName ?>
						</span></td>
                            <td><span class="tipS">
                            	<?php echo $row->Name ?>
						</span></td>

                            <td class="option">
                                <a href="<?php echo admin_url('admin/edit/' . $row->ID) ?>" title="Chỉnh sửa"
                                   class="tipS ">
                                    <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                                </a>
                                <a href="<?php echo admin_url('admin/delete/' . $row->ID.'/'.$row->FullName) ?>" title="Xóa"
                                   class="tipS verify_action">
                                    <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="title">
                    <h6>Bạn không được phân quyền</h6>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<div class="clear mt30"></div>

<script>
    $('a.verify_action').click(function () {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    });
</script>
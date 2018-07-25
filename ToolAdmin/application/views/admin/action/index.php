<!-- head -->
<?php $this->load->view('admin/action/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách hành động</h6>
            <div class="num f12">Tổng số: <b><?php echo count($list) ?></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr>
                <td style="width:80px;">Mã số</td>
                <td>Tên danh mục</td>
                <td style="width:100px;">Hành động</td>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="7">
                    <div class='pagination'>
                    </div>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->id ?>">
                    <td class="textC"><?php echo $row->id ?></td>
                    <td>
						<span title="<?php echo $row->action ?>" class="tipS">
							<?php echo $row->action ?>
						</span>
                    </td>
                    <td class="option">
                        <a href="<?php echo admin_url('action/edit/' . $row->id) ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="clear mt30"></div>

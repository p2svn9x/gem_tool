<!-- head -->
<?php $this->load->view('admin/menu/head', $this->data) ?>
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
        <div class="title">
            <h6>Danh sách menu</h6>
            <div class="num f12">Tổng số: <b><?php echo $total ?></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr>
                <td style="width:80px;">STT</td>
                <td>Tên nhóm</td>
				<td>Thứ tự</td>
                <td style="width:100px;">Thao tác</td>
            </tr>
            </thead>
            <tbody>
            <?php echo $list; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<div class="clear mt30"></div>

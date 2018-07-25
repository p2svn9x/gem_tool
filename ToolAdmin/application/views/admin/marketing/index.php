<!-- head -->
<?php $this->load->view('admin/marketing/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách url</h6>
            <div class="num f12">Tổng số: <b><?php echo $total ?></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr>
                <td style="width:80px;">STT</td>
                <td>Tên chiến dịch</td>
                <td>Link </td>
                <td style="width:100px;">Thao tác</td>
            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->id ?>">
                    <td class="textC"><?php echo $i ?></td>
                    <td class="textC"><?php echo $row->utm_campaign ?></td>
                    <td class="textC"><?php echo $row->url_generate?></td>
                    <td class="option">
                        <a href="<?php echo admin_url('marketing/edit/' . $row->id) ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                        </a>
                        <a href="<?php echo admin_url('marketing/delete/' . $row->id) ?>" title="Xóa"
                           class="tipS verify_action">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                        </a>
                    </td>
                </tr>
                <?php $i++;?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="clear mt30"></div>

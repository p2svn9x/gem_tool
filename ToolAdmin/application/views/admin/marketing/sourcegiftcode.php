<?php $this->load->view('admin/marketing/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách nguồn giftcode </h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td style="width:80px;">STT</td>
                <td>Key</td>
                <td>Tên</td>
                <td>Nguồn</td>
                <td>Hành động</td>
            </tr>
            </thead>
            <tbody id="logdongbang">
            <?php $i = 1; ?>
            <?php foreach($list as $row): ?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td><?php echo $row->key ?></td>
                    <td><?php echo $row->name ?></td>
                    <?php if($row->type == 1): ?>
                    <td> Giftcode Marketing </td>
                    <?php elseif($row->type == 2): ?>
                        <td> Giftcode Minigame </td>
                        <?php elseif($row->type == 3): ?>
                        <td> Giftcode vận hành </td>
                        <?php else:?>
                        <td>  </td>
                    <?php endif; ?>
                    <td class="option">
                        <a href="<?php echo admin_url('marketing/editsourcegiftcode/' . $row->id) ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                        </a>
                        <a href="<?php echo admin_url('marketing/deletesourcegiftcode/' . $row->id) ?>" title="Xóa"
                           class="tipS verify_action">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                        </a>
                    </td>

                </tr>
                <?php $i++; ?>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<script>
</script>
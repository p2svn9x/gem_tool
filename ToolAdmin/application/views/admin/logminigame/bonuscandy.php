<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Log vòng quay may mắn</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>

                <li><a href="<?php echo admin_url('logminigame/logvqmm')?>">
                        <img src="<?php echo public_url('admin')?>/images/icons/control/16/list.png">
                        <span>Lịch sử vòng quay</span>
                    </a></li>
                <li>  <a href="<?php echo admin_url('logminigame/bonuscandy')?>" title="Danh sách" >
                        <img src="<?php echo public_url('admin')?>/images/icons/control/16/list.png">
                        <span>Danh sách lượt quay slot free</span>
                    </a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>

    <div class="widget">
        <div class="title">
            <h6>Danh sách candy slot free</h6>
            <div id="errordate" style="color: red" align="center"></div>

        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td style="width:80px;">STT</td>
                <td>Ngày tạo</td>
                <td>Nick name</td>
                <td>Tên game</td>
                <td>Số lượt quay free</td>
                <td>Số tiền thưởng tối đa</td>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td class="textC"><?php echo $i; ?></td>
                    <td>
						<span title="<?php echo $row->update_time ?>" class="tipS">
							<?php echo $row->update_time ?>
						</span></td>
                    <td>
						<span title="<?php echo $row->nick_name?>" class="tipS">
							<?php echo $row->nick_name ?>
						</span></td>

                    <td><span title="<?php echo $row->game_name ?>" class="tipS">
							<?php echo $row->game_name ?>
						</span></td>
                    <td><span title="<?php echo $row->rotate_free ?>" class="tipS">
							<?php echo $row->rotate_free ?>
						</span></td>
                    <td><span title="<?php echo $row->max_winning ?>" class="tipS">
							<?php echo $row->max_winning ?>
						</span></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <?php echo $this->pagination->create_links() ?>
    </div>
</div>
<div class="clear mt30"></div>
<script>
    $("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#search").click(function(){
        var from=$("#fromDate").datepicker('getDate');
        var to =$("#toDate").datepicker('getDate');
        if(to>from)
        {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
</script>

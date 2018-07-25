<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <?php if($admin_info->Status == "A"): ?>
        <div class="title">
            <h6>Cập nhật thông tin quản trị viên</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>

                <div class="formRow">
                    <label for="param_username" class="formLeft">Username:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->UserName ?>" readonly id="param_username" name="username"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('username') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Nickname:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $info->FullName ?>" readonly name="name"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('name') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Bộ phận:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"> <select for="inputEmail3" id="selectchucnang" name="typeaccount">
                                <option value="W" <?php if($info->Status == "W"){echo "selected";} ?>>Vận hành</option>
								 <option value="LM" <?php if($info->Status == "LM"){echo "selected";} ?>>Leader Maketing</option>
                                <option value="M" <?php if($info->Status == "M"){echo "selected";} ?>>Maketing</option>
                                <option value="S" <?php if($info->Status == "S"){echo "selected";} ?>>Chăm sóc khách hàng</option>
                                <option value="L" <?php if($info->Status == "L"){echo "selected";} ?>>Lãnh đạo</option>
                                <option value="D" <?php if($info->Status == "D"){echo "selected";} ?>>Chăm sóc đại lý</option>
                                <option value="Q" <?php if($info->Status == "Q"){echo "selected";} ?>>Quản lý chung</option>
                                <option value="K" <?php if($info->Status == "K"){echo "selected";} ?>>Kế toán</option>
                                <option value="C" <?php if($info->Status == "C"){echo "selected";} ?>>Developer</option>
                                <option value="A" <?php if($info->Status == "A"){echo "selected";} ?>>Admin</option>

                            </select></span>
                        <div class="clear error" name="name_error"><?php echo form_error('typeaccount') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_phone" class="formLeft">Phân quyền:<span class="req"></span></label>
                    <div class="formRight">
                        <a href="<?php echo admin_url('admin/role/' . $info->ID) ?>" title="Phân quyền" class="tipS">
                            Phân quyền
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="submit" class="redB" value="Cập nhật">
                </div>
            </fieldset>
        </form>
        <?php else: ?>
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- head -->
<?php $this->load->view('admin/menu/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Hiệu chỉnh menu</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $info->Name ?>" name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('name') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Số thứ tự:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->Param ?>" id="param_param" name="param"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('param') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Đường dẫn:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->Link ?>" id="param_link" name="link"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('link') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Danh mục cha:<span class="req">*</span></label>
                    <div class="formRight">
                        <?php echo $list; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Tài khoản:<span class="req">*</span></label>
                    <div class="formRight">
                        <span style="width: 150px;float: left">
                            <input type="checkbox" id="tkthuong" name="isThuong" value="<?php echo $info->isThuong ?>" <?php if($info->isThuong == 1 ) {echo "checked"; }?>> Tài khoản thường
                             <input type="hidden" name="displaytkthuong" id="displaytkthuong" value="">
                        </span>
                        <span style="width: 150px;float: left">
                            <input type="checkbox" id="tksuper" name="tksuper"  value="<?php echo $info->isSuper ?>" <?php if($info->isSuper == 1 ) {echo "checked"; }?>> Super Admin
                            <input type="hidden" name="displaytksuper" id="displaytksuper" value="">
                        </span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('description') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Hiển thị:<span class="req">*</span></label>
                    <div class="formRight">
                        <span style="width: 150px;float: left">
                            <input type="checkbox" id="status" name="Status" checked="checked">
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="submit" class="redB" value="Cập nhật">
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $("#displaytkthuong").val($('#tkthuong').val());
        $("#displaytksuper").val($('#tksuper').val());
    });
    $('#tkthuong').on('change', function(){
        this.value = this.checked ? 1 : 0;
        $("#displaytkthuong").val(this.value);
    }).change();
    $('#tksuper').on('change', function(){
        this.value = this.checked ? 1 : 0;
        $("#displaytksuper").val(this.value);
    }).change();
</script>
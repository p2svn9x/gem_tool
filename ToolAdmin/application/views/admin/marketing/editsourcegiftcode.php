<!-- head -->
<?php $this->load->view('admin/marketing/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Cập nhật nguồn giftcode</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Key giftcode:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->key ?>"  maxlength="3" name="keygiftcode"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Tên nguồn giftcode:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->name ?>"   name="sourcegiftcode"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Loại giftcode:<span class="req">*</span></label>

                    <div class="formRight">
                        <span class="oneTwo"><select id="typegiftcode" name="typegiftcode">
                                <option value="1" <?php if($info->type == 1){echo "selected";}  ?>>Giftcode marketing</option>
                                <option value="2" <?php if($info->type == 2){echo "selected";}  ?>>Giftcode minigame</option>
                                <option value="3" <?php if($info->type == 3){echo "selected";}  ?>>Giftcode vận hành</option>
                            </select>
                        </span>
                        <span class="autocheck" name="name_autocheck"></span>

                        <div class="clear error" name="name_error"><?php echo form_error('typegiftcode') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Hiển thị:<span class="req">*</span></label>
                    <div class="formRight">
                        <span style="width: 150px;float: left">
                             <input type="checkbox" id="statusgc" name="statusgc  value="<?php echo $info->display ?>" <?php if($info->display == 1 ) {echo "checked"; }?>>
                             <input type="hidden" name="displaygc" id="displaygc" value="">
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
        $("#displaygc").val($('#statusgc').val());
    });
    $('#statusgc').on('change', function(){
        this.value = this.checked ? 1 : 0;
        $("#displaygc").val(this.value);
    }).change();
</script>
<!-- head -->
<?php $this->load->view('admin/marketing/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Thêm mới nguồn giftcode</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Key giftcode:<span class="req">*</span></label>

                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="keygiftcode"
                                                    value="<?php echo set_value('keygiftcode') ?>" name="keygiftcode"
                                                    maxlength="3"></span>
                        <span class="autocheck" name="name_autocheck"></span>

                        <div class="clear error" name="name_error"><?php echo form_error('keygiftcode') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Tên nguồn giftcode:<span class="req">*</span></label>

                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="sourcegiftcode"
                                                    value="<?php echo set_value('sourcegiftcode') ?>"
                                                    name="sourcegiftcode"></span>
                        <span class="autocheck" name="name_autocheck"></span>

                        <div class="clear error" name="name_error"><?php echo form_error('sourcegiftcode') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Loại giftcode:<span class="req">*</span></label>

                    <div class="formRight">
                        <span class="oneTwo"><select id="typegiftcode" value="<?php echo set_value('typegiftcode') ?>"
                                                     name="typegiftcode">
                                <option value="1">Giftcode marketing</option>
                                <option value="2">Giftcode minigame</option>
                                <option value="3">Giftcode vận hành</option>
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
                             <input type="checkbox" id="statusgc" name="statusgc" value="0">
                             <input type="hidden" name="displaygc" id="displaygc" value="">
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
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
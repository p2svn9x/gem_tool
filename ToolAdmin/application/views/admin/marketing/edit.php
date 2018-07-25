<!-- head -->
<?php $this->load->view('admin/marketing/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Thêm mới chiến dịch</h6>
        </div>
        <form id="form_marketing" class="form" enctype="multipart/form-data" method="post" action="">

            <fieldset>
                <div class="formRow">
                    <label for="param_name" class="formLeft">URL của trang web :<span class="req">*</span></label>

                    <div class="formRight">
                        <span class="oneTwo"><input type="text" id="url_web" name="url_web" _autocheck="true" value="<?php echo $info->url_web ?>"></span>
                        <span style="width: 100%;float: left;">(ví dụ: http://www.urchin.com/download.html)</span>

                        <div class="clear error" ><?php echo form_error('url_web')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Nguồn chiến dịch :<span class="req">*</span></label>

                    <div class="formRight">

                        <select name="utm_source"  value="<?php echo set_value('utm_source')?>" class="left">
                            <option value=""></option>
                            <?php foreach ($utm_source as $row): ?>
                                <option value="<?php echo $row->name ?>" <?php if($info->utm_source == $row->name){echo "selected";} ?>><?php echo $row->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span
                            style="width: 100%;float: left;">(Liên kết giới thiệu: google, citysearch, newsletter4)</span>
                        <div class="clear error" id="utm_source_error"><?php echo form_error('utm_source')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Phương tiện chiến dịch :<span class="req">*</span></label>

                    <div class="formRight">
                        <select name="utm_medium"  value="<?php echo set_value('utm_source')?>" class="left">
                            <option value=""></option>
                            <?php foreach ($utm_medium as $row): ?>
                                <option value="<?php echo $row->name ?>" <?php if($info->utm_medium == $row->name){echo "selected";} ?>><?php echo $row->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span style="width: 100%;float: left;">(Phương tiện tiếp thị: cpc, biểu ngữ, email)</span>

                        <div class="clear error" id="utm_medium_error"><?php echo form_error('utm_medium')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Từ khóa chiến dịch :</label>

                    <div class="formRight">
                        <span class="oneTwo"><input type="text" id="utm_term" name="utm_term" _autocheck="true" value="<?php echo $info->utm_term ?>"></span>
                        <span style="width: 100%;float: left;">Nnhận dạng các từ khóa phải trả tiền)</span>

                        <div class="clear error" id="utm_term_error"><?php echo form_error('utm_term')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Nội dung chiến dịch :</label>

                    <div class="formRight">
                        <span class="oneTwo"><input type="text" id="utm_content" name="utm_content" _autocheck="true" value="<?php echo $info->utm_content ?>"></span>
                        <span style="width: 100%;float: left;">(Sử dụng để phân biệt quảng cáo)</span>

                        <div class="clear error" id="utm_content_error"><?php echo form_error('utm_content')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Tên chiến dịch :<span class="req">*</span></label>

                    <div class="formRight">

                        <select name="utm_campaign"  value="<?php echo set_value('utm_source')?>" class="left">
                            <option value=""></option>
                            <?php foreach ($utm_campain as $row): ?>
                                <option value="<?php echo $row->name ?>" <?php if($info->utm_campaign == $row->name){echo "selected";} ?>><?php echo $row->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span style="width: 100%;float: left;">(Sản phẩm, mã khuyến mại hoặc khẩu hiệu)</span>

                        <div class="clear error" id="utm_campaign_error"><?php echo form_error('utm_campaign')?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input type="submit" class="redB" id="btnCreate" name="btnCreate" value="Tạo url">
                </div>
            </fieldset>
        </form>
    </div>
</div>

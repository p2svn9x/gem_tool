<?php $this->load->view('admin/head') ?>
<section class="content-header">
    <h1>
        Sửa cầu xóc đĩa
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <input id="keyid" type=hidden value="<?php echo $key ?>" name="key">
                                <?php $string = $list;
                                $string = str_replace(0, "<img width='20' src='../../public/admin/images/sp_xiu.png' title='Chẵn'>", $string);
                                $string = str_replace(1, "<img width='20' src='../../public/admin/images/sp_le.png' title='Lẻ'>", $string);
                                echo $string;
                                ?>
                            </div>
                         </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label class="control-label">Kết quả cầu:</label>
                            </div>
                            <div class="col-sm-8"><input type="text" id="settaixiu" name="code" maxlength="100" class="form-control" value="<?php echo $list ?>" onkeypress="return isNumberKey(event)"  ></div>
                            <div class="col-sm-1"><input type="button" id="submittran" align="center" class="btn btn-primary" value="Cập nhật"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $("#submittran").click(function () {
        $.ajax({
            url: "<?php echo base_url('xocdia/getcauedit'); ?>",
            type: 'POST',
            data: {key: $("#keyid").val(), code: $("#settaixiu").val()},
            dataType: 'json',
            success: function (result) {
                alert(result);
               var baseurl = "<?php echo base_url('xocdia') ?>";
                parent.window.location = baseurl;
            }
        });


    });

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode <48 ||charCode>49 )
            return false;
        return true;
    }
</script>
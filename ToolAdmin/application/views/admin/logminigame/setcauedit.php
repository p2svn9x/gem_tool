<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/jquery.min.js"></script>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {

        });
    })(jQuery);
</script>
<style>
    .list_product_info {
        width: 480px;
        float: left;
    }
    .list_product_info li {
        width: 230px;
        float: left;
    }
    .action {
        float: right;
        padding-top: 15px;
    }
    .settaixiu input[type="text"] {
        margin-top: 10px;
        height: 30px;
        width: 70%;
        font-size: 20px;

    }
    .setaction {
        float: right;
        position: relative;
        top: -31px;
    }
</style>
<form id="form" class="form" enctype="multipart/form-data" method="post" action="">
    <div class="widget mg0 form_load" id="main_popup">
        <div class="title">
            <h6>Sửa cầu tài xỉu</h6>
        </div>
        <div class="body">
            <input id="keyid" type=hidden value="<?php echo $key ?>" name="key">
            <?php $string = $list;
            $string = str_replace(0, "<img width=\"20\" src=\"../../public/admin/images/sp_xiu.png\" title=\"Xỉu\">", $string);
            $string = str_replace(1, "<img  width=\"20\" src=\"../../public/admin/images/sp_tai.png\" title=\"Tài\">", $string);
            echo $string;
            ?>
            <div class="settaixiu">Kết quả cầu : <input type="text" id="settaixiu" name="code" maxlength="100"  value="<?php echo $list ?>" onkeypress="return isNumberKey(event)"  ></div>
            <div class="setaction">
                <a href="" id="capnhattaixiu" class="button blueB mr5">
                    <input type="submit" id="submittran" align="center" class="redB" value="Cập nhật">
                </a>
            </div>
        </div>
    </div>
</form>
<script>
    $("#submittran").click(function () {
        $.ajax({
            url: "<?php echo admin_url(); ?>" + "/logminigame/getcauedit",
            type: 'POST',
            data: {key: $("#keyid").val(), code: $("#settaixiu").val()},
            success: function (result) {
                alert(result);
                location.reload("<?php echo admin_url(); ?>" + "/logminigame/setcau");
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
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
            <h6>Thêm cầu tài xỉu</h6>
        </div>
        <div class="body">
            <div class="settaixiu">Kết quả cầu : <input type="text" id="settaixiu" name="code" maxlength="100"  value="" onkeypress="return isNumberKey(event)"></div>
            <div class="setaction">
                <a href="" id="capnhattaixiu" class="button blueB mr5">
                    <input type="submit" id="submittran" align="center" class="redB" value="Thêm mới">
                </a>
            </div>
        </div>
    </div>
</form>
<script>
    $("#submittran").click(function () {
        $.ajax({
            url: "<?php echo tranfer_url(); ?>" + "/setcau/getcauadd",
            type: 'POST',
            data: {code: $("#settaixiu").val()},
            success: function (result) {
                alert(result);
                location.reload("<?php echo tranfer_url(); ?>" + "/setcau/index");
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
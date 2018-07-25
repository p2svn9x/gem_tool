<?php $this->load->view('admin/config/head', $this->data) ?>
<div class="line"></div>

<div class="wrapper">
<p id="message" style="color: #0000FF"></p>
<input type="hidden" id="configpf" value="<?php echo $plat ?>">
<input type="hidden" id="nmconfig" value="<?php echo $namecf ?>">
<input type="hidden" id="idconfig" value="<?php echo $id ?>">

<div class="widget">
    <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php if ($admin_info->Status == "A" || $admin_info->Status == "C"): ?>
    <div class="title">
        <h4>Sửa config <span style="color: #0000FF"><?php echo $plat ?></span></h4>
    </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                        <option value="game_bai">Game Bài</option>
                        <option value="i2b">I2b</option>
                        <option value="nganluong">Ngân Lượng</option>
                        <option value="admin">Admin</option>
                        <option value="vippoint_event">Vippoint Event</option>
                        <option value="vin_plus">Vin Plus</option>
                        <option value="lucky_vip">Lucky Vip</option>
                        <option value="agent">Agent</option>
                        <option value="sms_plus">Sms Plus</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB">
                </div>
            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-4">
                <textarea id="myTextArea" cols=100 rows=30 style="color: #0000ff;font-size: 20px"></textarea>
                    </div>

            </div>
        </div>

    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p style="color: #0000ff">Bạn sửa config thành công</p>
                </div>
                <div class="modal-footer">
                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                           aria-hidden="true">
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="title">
        <h4>Bạn không được phân quyền</h4>
    </div>
<?php endif; ?>
</div>
</div>
<style>.spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>

<script>

$("#search_tran").click(function () {

    var data = $("#myTextArea").val();

    var myJSONString = data.replace(/\n/g,' ').replace(/\t/g,' ').replace(/  +/g, "");
    if(isValidJSON(myJSONString) == false){
        $("#message").html("");
        $("#resultsearch").html("Không phải dữ liệu json");
        return false;

    }
    $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('confignew/successeditajax')?>",
                data: {
                    idconfig: $("#idconfig").val(),
                    valueconfig: myJSONString,
                    versionconfig: $("#txtversionconfig").val(),
                    configpf: $("#configpf").val()
                }, dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
                    console.log(result);
                    $("#resultsearch").html("");
                    if (result.errorCode == 0) {

                        $.ajax({
                            type: "POST",
                            url: "<?php echo admin_url('confignew/configajax')?>",
                            data: {}, dataType: 'json'
                        });
                       
                        $("#bsModal3").modal("show");
                      
                        //$("#message").html("Bạn cập nhật dữ liệu thành công !!")
                    } else {
                        $("#resultsearch").html("Bạn cập nhật dữ liệu không thành công !!")
                    }

                },error: function (xhr) {

                    window.location='<?php echo admin_url('login') ?>';
                }

            });

});
$('#bsModal3').on('hidden.bs.modal', function () {
    location.reload();
});
$(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/editajax')?>",
            data: {
                configpf: $("#configpf").val(),
                nmconfig: $("#nmconfig").val()
            },
            dataType: 'json',
            success: function (result) {

                $("#txtnameconfig").val(result.gameconfig[0].name);
                $("#txtversionconfig").val(result.gameconfig[0].version);
                $("#txtplatform").val(result.gameconfig[0].platform);
                obj = JSON.parse(result.gameconfig[0].value);
                var str = JSON.stringify(obj, undefined,40);
                document.getElementById('myTextArea').innerHTML = str;
            }
        })
});

function isValidJSON(string) {
    try {
        JSON.parse(string);
    } catch (e) {
        return false;
    }

    return true;
}
</script>
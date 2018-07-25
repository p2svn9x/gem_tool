<?php $this->load->view('admin/config/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
<p id="message" style="color: #0000FF"></p>
<div class="widget">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="title">
    <h6>Thêm mới config</h6>
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
            <select id="txtplatform">
                <option value="ios">Ios</option>
                <option value="ad">Android</option>
                <option value="web">Web</option>
                <option value="wp">Windown Phone</option>
            </select>

        </div>
        <div class="col-sm-1">
            <label>Is tcp:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtistcp">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Version:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtversion">
        </div>
        <div class="col-sm-1">
            <label>Update:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtupdate">
                <option value="0">Not Update</option>
                <option value="1">Recommend Update</option>
                <option value="2">Force Update</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Url update:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txturlupdate">
        </div>
        <div class="col-sm-1">
            <label>Message update:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtmesupdate">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status minigame:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatusmini">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip minigame:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipmini">
        </div>
        <div class="col-sm-1">
            <label>Port minigame:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportmini">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status sâm:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatussam">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip sâm:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipsam">
        </div>
        <div class="col-sm-1">
            <label>Port sâm:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportsam">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status ba cây:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatusbacay">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip ba cây:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipbacay">
        </div>
        <div class="col-sm-1">
            <label>Port ba cây:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportbacay">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status binh:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatusbinh">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip binh:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipbinh">
        </div>
        <div class="col-sm-1">
            <label>Port binh:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportbinh">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status tlmn:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatustlmn">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip tlmn:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtiptlmn">
        </div>
        <div class="col-sm-1">
            <label>Port tlmn:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtporttlmn">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status bài cào:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatusbc">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip bài cào:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipbc">
        </div>
        <div class="col-sm-1">
            <label>Port bài cào:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportbc">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status liêng:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatuslieng">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip liêng:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtiplieng">
        </div>
        <div class="col-sm-1">
            <label>Port liêng:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportlieng">
        </div>
    </div>
</div>

<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status poker:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatuspoker">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip poker:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtippoker">
        </div>
        <div class="col-sm-1">
            <label>Port poker:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportpoker">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status tá lả:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatustala">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip tá lả:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtiptala">
        </div>
        <div class="col-sm-1">
            <label>Port tá lả:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtporttala">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status xì tố:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatusxito">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip xì tố:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipxito">
        </div>
        <div class="col-sm-1">
            <label>Port xì tố:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportxito">
        </div>
    </div>
</div>

<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Status xóc xóc:</label>
        </div>
        <div class="col-sm-2">
            <select id="txtstatusxoc">
                <option value="0">Running</option>
                <option value="1">Maintain</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Ip xóc xóc:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtipxoc">
        </div>
        <div class="col-sm-1">
            <label>Port xóc xóc:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtportxoc">
        </div>
    </div>
</div>
<div class="formRow">
    <div class="row">
        <div class="col-sm-1">
            <label>Url help:</label>
        </div>
        <div class="col-sm-2">
            <textarea class="form-control" rows="3" id="txturlhelp"></textarea>
        </div>
        <div class="col-sm-1">
            <label>Phone:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtphone">
        </div>
        <div class="col-sm-1">
            <label>Facebook:</label>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="txtfacebook">
        </div>
        <div class="col-sm-1">
            <input type="button" id="search_tran" value="Thêm config" class="button blueB" style="margin-left: 123px">
        </div>
    </div>
</div>
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
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url(); ?>" + "/config/getdata",
            dataType: 'text',
            data: {
                txtnameconfig: $("#txtnameconfig").val(),
                txtversionconfig:$("#txtversionconfig").val(),
                txtplatform: $("#txtplatform").val(),
                txtversion:  $("#txtversion").val(),
                txtupdate: $("#txtupdate").val(),
                txturlupdate:$("#txturlupdate").val(),
                txtmesupdate: $("#txtmesupdate").val(),
                txtistcp: $("#txtistcp").val(),
                txtstatusmini: $("#txtstatusmini").val(),
                txtipmini: $("#txtipmini").val(),
                txtportmini:$("#txtportmini").val(),
                txtstatussam: $("#txtstatussam").val(),
                txtipsam:   $("#txtipsam").val(),
                txtportsam: $("#txtportsam").val(),
                txtstatusbacay:$("#txtstatusbacay").val(),
                txtipbacay: $("#txtipbacay").val(),
                txtportbacay:$("#txtportbacay").val(),
                txtstatusbinh:$("#txtstatusbinh").val(),
                txtipbinh:  $("#txtipbinh").val(),
                txtportbinh: $("#txtportbinh").val(),
                txtstatustlmn: $("#txtstatustlmn").val(),
                txtiptlmn: $("#txtiptlmn").val(),
                txtporttlmn: $("#txtporttlmn").val(),
                txtstatusbc: $("#txtstatusbc").val(),
                txtipbc: $("#txtipbc").val(),
                txtportbc:$("#txtportbc").val(),
                txtstatuslieng:$("#txtstatuslieng").val(),
                txtiplieng:$("#txtiplieng").val(),
                txtportlieng: $("#txtportlieng").val(),
                txtstatuspoker:  $("#txtstatuspoker").val(),
                txtippoker: $("#txtippoker").val(),
                txtportpoker:$("#txtportpoker").val(),
                txtstatustala: $("#txtstatustala").val(),
                txtiptala: $("#txtiptala").val(),
                txtporttala:  $("#txtporttala").val(),
                txtstatusxito: $("#txtstatusxito").val(),
                txtipxito: $("#txtipxito").val(),
                txtportxito: $("#txtportxito").val(),
                txtstatusxoc: $("#txtstatusxoc").val(),
                txtipxoc: $("#txtipxoc").val(),
                txtportxoc:  $("#txtportxoc").val(),
                txturlhelp: $("#txturlhelp").val(),
                txtphone: $("#txtphone").val(),
                txtfacebook: $("#txtfacebook").val()
            },
            success: function (res) {
                $("#spinner").hide();
                $.ajax({
                    type: "POST",
                    url: "<?php echo $linkapi?>",
                    data: {
                        c: 602,
                        gv: res,
                        v: $("#txtversionconfig").val(),
                        gn: "game_config",
                        pf: $("#txtplatform").val()
                    }, dataType: 'json',
                    success: function (result) {
                        if(result.errorCode == 0){
                            $("#message").html("Bạn thêm dũ liệu thành công !!!!!!");
                        }
                    }
                })
            }
        });

    });

    $(document).ready(function () {

    });
</script>

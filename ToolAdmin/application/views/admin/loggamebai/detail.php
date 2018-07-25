<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Log game bài detail</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">
    <div class="widget" style="width: 70%; margin-left: 100px">
        <table cellpadding="0" cellspacing="0" width="100%" style="font-size: 18px"
               class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="line-height: 30px">
                <td>Vị trí</td>
                <td>Tên người chơi</td>
                <td>Hành động</td>
                <td>Nội dung</td>
            </tr>
            </thead>
            <tbody id="logbai">

            </tbody>
        </table>
        <input type="hidden" id="sid" value="<?php echo $sid ?>">
        <input type="hidden" id="gamename" value="<?php echo $gamename ?>">
        <input type="hidden" id="createtime" value="<?php echo $createtime ?>">

        <div class="formRow" style="line-height: 30px">
            <h3 id="ketthuc"></h3>
        </div>
    </div>
</div>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
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
<script>
$(document).ready(function () {
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('loggamebai/detailajax')?>",
        data: {
            sid: $("#sid").val(),
            namegame: $("#gamename").val(),
            time: $("#createtime").val()
        },
        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            var detail = result.logDetail;
            var abc = new GameLog(detail);
            abc.printToScreen();
        }
    })
})

var mapObj = {
    c: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/co.png')?>\"/>",
    t: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/tep.png')?>\"/>",
    r: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/ro.png')?>\"/>",
    b: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/bich.png')?>\"/>"
};

var mapcaro = {
    0: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/o_co.png')?>\"/>",
    1: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/x.png')?>\"/>",
    2: "<img style=\"width :10px\" src=\"<?php echo public_url('admin/images/o.png')?>\"/>"
};

var mapcotuong = {

    bx0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz4: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz4: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>"

};
var mapcotuong1 = {
    bx0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz4o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz4o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>",
    o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/o_co_ tuong.png')?>\"/>",
    s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/song1.png')?>\"/>",

    bx0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz4s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz4s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>",
    s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/song2.png')?>\"/>",
    bx0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz4s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz4s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>"

};

var mapcoup = {

    bx2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz5: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz6: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz7: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz8: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz9: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp3: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz5: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz6: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz7: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz8: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz9: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>"


};
var mapcoup1 = {
    bx2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz5o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz6o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz7o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz8o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz9o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz5o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz6o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz7o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz8o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz9o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>",

    bx0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bx1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bm0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bm1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bt0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bt1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bs0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bs1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bp0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bp1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz4o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    rx0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    rx1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rm0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rm1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rt0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rt1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rs0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rs1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rp0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz0o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz1o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz2o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz3o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz4o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    o: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/o_co_ tuong.png')?>\"/>",
    s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/song1.png')?>\"/>",

    bx2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz5s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz6s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz7s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz8s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz9s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz5s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz6s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz7s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz8s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz9s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>",
    bx0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bx1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bm0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bm1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bt0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bt1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bs0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bs1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bp0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bp1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz4s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    rx0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    rx1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rm0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rm1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rt0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rt1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rs0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rs1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rp0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz0s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz1s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz2s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz3s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz4s1: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/song2.png')?>\"/>",
    bx2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bx3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_den.png')?>\"/>",
    bm2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bm3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_den.png')?>\"/>",
    bt2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bt3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_den.png')?>\"/>",
    bs2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bs3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_den.png')?>\"/>",
    bp2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bp3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_den.png')?>\"/>",
    bz5s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz6s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz7s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz8s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bz9s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_den.png')?>\"/>",
    bg0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_den.png')?>\"/>",
    rx2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rx3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/xe_do.png')?>\"/>",
    rm2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rm3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/ma_do.png')?>\"/>",
    rt2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rt3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tinh_do.png')?>\"/>",
    rs2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rs3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/si_do.png')?>\"/>",
    rp2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rz5s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz6s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz7s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz8s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rz9s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tot_do.png')?>\"/>",
    rg0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/tuong_do.png')?>\"/>",
    bx0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bx1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bm0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bm1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bt0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bt1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bs0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bs1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bp0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bp1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    bz4s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    rx0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-den-up.png')?>\"/>",
    rx1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rm0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rm1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rt0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rt1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rs0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rs1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rp0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/phao_do.png')?>\"/>",
    rp1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz0s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz1s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz2s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz3s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>",
    rz4s2: "<img style=\"width :30px\" src=\"<?php echo public_url('site/images/boco/Quan-do-up.png')?>\"/>"

};

var printToScreen;
var fullNameCard = "";
var moneyType = "";
var nickName = "";

var listmc = new Array();
var listbdmc = new Array();
var Listimgc = new Array();

var listName = [8];
for (var i = 0; i < 5; i++) {
    listName[i] = "";
}
function GameAction(str) {
    var name = null;
    var detail = null;
    var fullName = null;
    var data = null;
    var list = str.split("<");


    if (list !== null) {
        this.name = list[0];
        this.detail = list[1];
    }
    this.printToScreen = function () {
        $("#title").html(this.fullName);
        this.data.printToScreen();
    }
}
function GameLog(str) {
    var listAction = new Array();
    var data = str.split(">");
    console.log(data);
    if (data != null) {
        $.each(data, function (key, d) {
            if (d != "" || d != null) {
                var action = new GameAction(d);
                if (action.name == 'BD') {
                    var danhsachbatdau = new DanhSachBatDau(action.detail);
                    action.data = danhsachbatdau;
                    action.fullName = 'Bắt đầu ván chơi';
                    listAction.push(action);
                }
                if (action.name == 'DD') {
                    var didau = new DiDau(action.detail);
                    //Dua bao danh sach\
                    action.data = didau;
                    listAction.push(action);
                }
                if (action.name == 'CB') {
                    var chiabai = new ChiaBai(action.detail);
                    //Dua bao danh sach\
                    action.data = chiabai;
                    listAction.push(action);
                }
                if (action.name == 'DB') {
                    var danhbai = new DanhBai(action.detail);
                    //Dua bao danh sach\
                    action.data = danhbai;
                    listAction.push(action);
                }
                if (action.name == 'KT') {
                    var ketthuc = new KetThuc(action.detail);
                    //Dua bao danh sach\
                    action.data = ketthuc;
                    listAction.push(action);
                }
                if (action.name == 'BS') {
                    var baosam = new BaoSam(action.detail);
                    //Dua bao danh sach\
                    action.data = baosam;
                    listAction.push(action);
                }
                if (action.name == 'CS') {
                    var chonsam = new ChonSam(action.detail);
                    //Dua bao danh sach\
                    action.data = chonsam;
                    listAction.push(action);
                }
                if (action.name == 'DIS') {
                    var matketnoi = new MatKetNoi(action.detail);
                    //Dua bao danh sach\
                    action.data = matketnoi;
                    listAction.push(action);
                }
                if (action.name == 'RE') {
                    var quaylai = new QuayLai(action.detail);
                    //Dua bao danh sach\
                    action.data = quaylai;
                    listAction.push(action);
                }

                if (action.name == 'MC') {
                    var moicuoc = new MoiCuoc(action.detail);
                    //Dua bao danh sach\
                    action.data = moicuoc;
                    listAction.push(action);
                }
                if (action.name == 'DC') {
                    var datcuoc = new DatCuoc(action.detail);
                    //Dua bao danh sach\
                    action.data = datcuoc;
                    listAction.push(action);
                }
                if (action.name == 'VG') {
                    var vaoga = new VaoGa(action.detail);
                    //Dua bao danh sach\
                    action.data = vaoga;
                    listAction.push(action);
                }
                if (action.name == 'KC') {
                    var kecua = new KeCua(action.detail);
                    //Dua bao danh sach\
                    action.data = kecua;
                    listAction.push(action);
                }
                if (action.name == 'SL') {
                    var solo = new SoLo(action.detail);
                    //Dua bao danh sach\
                    action.data = solo;
                    listAction.push(action);
                }

                if (action.name == 'SD') {
                    var selectdealer = new SelectDealer(action.detail);
                    //Dua bao danh sach\
                    action.data = selectdealer;
                    listAction.push(action);
                }
                if (action.name == 'TT') {
                    var taketurn = new TakeTurn(action.detail);
                    //Dua bao danh sach\
                    action.data = taketurn;

                    listAction.push(action);
                }
                if (action.name == 'PC') {
                    var publiccard = new PublicCard(action.detail);
                    //Dua bao danh sach\
                    action.data = publiccard;
                    listAction.push(action);
                }
                if (action.name == 'NR') {
                    var newround = new NewRound(action.detail);
                    //Dua bao danh sach\
                    action.data = newround;
                    listAction.push(action);
                }

                if (action.name == 'EG') {
                    var endgame = new EndGame(action.detail);
                    //Dua bao danh sach\
                    action.data = endgame;
                    listAction.push(action);
                }

                if (action.name == 'RB') {
                    var rutbai = new RutBai(action.detail);
                    //Dua bao danh sach\
                    action.data = rutbai;
                    listAction.push(action);
                }

                if (action.name == 'SB') {
                    var danhsachsobai = new DanhSachSoBai(action.detail);
                    action.data = danhsachsobai;
                    listAction.push(action);
                }
                if (action.name == 'CT') {
                    var congtien = new CongTien(action.detail);
                    action.data = congtien;
                    listAction.push(action);
                }

                if (action.name == 'DQ') {
                    var danhquan = new DanhQuan(action.detail);
                    action.data = danhquan;
                    listAction.push(action);
                }
                if (action.name == 'HC') {
                    var hetco = new HetCo(action.detail);
                    action.data = hetco;
                    listAction.push(action);
                }
                if (action.name == 'XDBD') {
                    var batdauxd = new BatDauXD(action.detail);
                    action.data = batdauxd;
                    listAction.push(action);
                }
                if (action.name == 'XDDC') {
                    var datcuocxd = new DatCuaXD(action.detail);
                    action.data = datcuocxd;
                    listAction.push(action);
                }
                if (action.name == 'XDMBC') {
                    var muabancua = new MuaBanCua(action.detail);
                    action.data = muabancua;
                    listAction.push(action);
                }
                if (action.name == 'XDHT') {
                    var hoantien = new HoanTien(action.detail);
                    action.data = hoantien;
                    listAction.push(action);
                }
                if (action.name == 'XDKQ') {
                    var ketquaxd = new KetQua(action.detail);
                    action.data = ketquaxd;
                    listAction.push(action);
                }
                if (action.name == 'XDTT') {
                    var trathuong = new TraThuong(action.detail);
                    action.data = trathuong;
                    listAction.push(action);
                }

                if (action.name == 'XDTL') {
                    var tralai = new TraLai(action.detail);
                    action.data = tralai;
                    listAction.push(action);
                }
                if (action.name == 'XDDDC') {
                    var dungdatcuoc = new DungDatCuoc(action.detail);
                    action.data = dungdatcuoc;
                    listAction.push(action);
                }
                if (action.name == 'XDDHT') {
                    var dunghoantien = new DungHoanTien(action.detail);
                    action.data = dunghoantien;
                    listAction.push(action);
                }
            }

        });
    }
    this.printToScreen = function () {
        $.each(listAction, function (key, value) {
            value.printToScreen();
        })
    }
}
function DanhSachBatDau(str) {
    var listds = new Array();
    var data = str.split(";");

    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new BatDau(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function BatDau(str) {
    var chair = null;
    var listbd = str.split("/");
    console.log(listbd);
    if (listbd !== null) {
        if (listbd[1] != null) {
            this.chair = listbd[1];
            this.nickname = listbd[0];
            listName[this.chair] = this.nickname;
        } else {
            listbdmc.push(listbd[0]);
            if (listbdmc[0] == 1) {
                moneyType = "vin";
            } else {
                moneyType = "xu";
            }
        }
    }
    this.printToScreen = function () {
        if (listbd[1] == null) {
            if ((listbdmc.length > 1)) {
                $("#logbai").html(tableName(listbdmc[2], listName[listbdmc[2]], "Chương", "Mức cược:" + listbdmc[1] + "  " + moneyType));
            } else if (listbdmc.length == 1) {
                $("#logbai").append(tableName("", "Loại tiền", moneyType, ""));
            }
        } else {
            $("#logbai").append(tableName(this.chair, this.nickname, "Bắt đầu", ""));
        }

    }


}
function MoiCuoc(str) {
    var listds = new Array();
    var data = str.split(";");

    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new MoiCuocdt(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();

        })
    }

}

function MoiCuocdt(str) {
    var chair = null;
    var name = null;
    var moneytype = null;
    var muccuoc = null;
    var chuban = null;
    var listbd = str.split("/");


    if (listbd !== null) {
        if (listbd[1] != null) {
            this.chair = listbd[1];
            this.name = listbd[0]
            listName[this.chair] = this.name;

        } else {
            listmc.push(listbd[0]);

            if (listmc[2] == 1) {
                moneyType = "vin";
            } else {
                moneyType = "xu";
            }
        }
    }
    this.printToScreen = function () {
        if (listbd[1] != null) {

            if (listmc[1] == listbd[1]) {

                $("#logbai").append(tableName(this.chair, this.name, "Mời cược", "Chương, mức cược: " + listmc[0] + " " + moneyType));
            }
            else {
                $("#logbai").append(tableName(this.chair, this.name, "", ""));
            }
        }
    }
}
function DatCuoc(str) {
    var chair = null;
    var cuoc = null;
    var data = str.split("/");
    if (data !== null) {
        this.chair = data[0];
        this.cuoc = data[1];
    }
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Đặt cược", "x " + this.cuoc));
    }

}

function VaoGa(str) {
    var chair = null;
    var cuoc = null;
    var data = str.split("/");
    if (data !== null) {
        this.chair = data[0];
        this.cuoc = data[1];
    }
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Vào gà", "x " + this.cuoc));
    }

}
function KeCua(str) {
    var chair = null;
    var cuoc = null;
    var rate = null
    var data = str.split(";");

    if (data !== null) {
        this.chair = data[0];
        this.cuoc = data[1];
        this.rate = data[2]
    }
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Ké cửa", listName[this.cuoc] + " " + "x" + " " + this.rate));
    }
}
function SoLo(str) {
    var chair = null;
    var cuoc = null;
    var rate = null
    var data = str.split(";");

    if (data !== null) {
        this.chair = data[0];
        this.cuoc = data[1];
        this.rate = data[2]
    }
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Sô lô", listName[this.cuoc] + " " + "x" + " " + this.rate));
    }
}

function DiDau(str) {
    var chair = null;
    var cards = null;
    var data = str.split(";");

    this.chair = data[1];
    this.cards = data[2];
    this.cards = data[2].substr(4, data[2].length - 5);
    this.cards = this.cards.replace(/c|r|t|b/gi, function (matched) {
        return mapObj[matched];
    });
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Đi đầu", ""));
    }
}
function ChiaBai(str) {
    var data = str.split(";");
    var listcb = new Array();
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new ChiaBaiDt(value);
            listcb.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listcb, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function ChiaBaiDt(str) {
    var html = "";
    var chair = null;
    var bai = null;
    var type = null;
    var listdt = str.split("/");
    console.log(listdt);
    if (listdt !== null) {
        this.chair = listdt[0];
        this.bai = listdt[1].substring(listdt[1].indexOf(":") + 1, listdt[1].indexOf("$"));
        this.bai = this.bai.replace(/c|r|t|b/gi, function (matched) {
            return mapObj[matched];
        });
        this.type = listdt[2];
    }
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Chia bài", this.bai));
    }
}
function DanhBai(str) {
    var chair = null;
    var auto = null;
    var boluot = null;
    var cards = null;
    var data = str.split(";");
    this.chair = data[0];
    this.auto = data[1];
    this.boluot = data[2];
    this.cards = data[3].substr(3, data[3].length - 4);
    this.cards = this.cards.replace(/c|r|t|b/gi, function (matched) {
        return mapObj[matched];
    });
    this.printToScreen = function () {
        if (this.auto == 1) {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Tự động đánh", this.cards));
        } else if (this.boluot == 1) {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Bỏ lượt", ""));
        } else {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Đánh bài", this.cards));
        }

    }
}
function KetThuc(str) {
    var data = str.split(";");
    var listkt = new Array();
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new KetThucDt(value);
            listkt.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listkt, function (key, ds) {
            ds.printToScreen();
        })
    }

}


function KetThucDt(str) {
    var chair = null;
    var money = null;
    var card = null;
    var data = str.split("/");
    console.log(data);

    this.chair = data[0];
    this.money = data[1];
    if (data[2] != null) {
        this.card = data[2].substring(data[2].indexOf(":") + 1, data[2].indexOf("$"));

    }
    this.printToScreen = function () {
        if (data[1] == null) {

        }
        else {
            if (this.money >= 0) {
                $("#logbai").append(tableName(this.chair, listName[this.chair], "Kết thúc", "Thắng: " + this.money + " " + moneyType + " " + this.card.replace(/c|r|t|b/gi, function (matched) {
                    return mapObj[matched];
                })))
            } else {
                $("#logbai").append(tableName(this.chair, listName[this.chair], "Kết thúc", "Thua: " + this.money + " " + moneyType + " " + this.card.replace(/c|r|t|b/gi, function (matched) {
                    return mapObj[matched];
                })))

            }
        }
    }
}
function BaoSam(str) {
    var chair = null;
    this.chair = str;
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Báo sâm", ""));
    }
}
function ChonSam(str) {
    var chair = null;
    this.chair = str;
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Chọn sâm", ""));
    }
}
function QuayLai(str) {
    var chair = null;
    this.chair = str;
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Kết nối lại", ""));
    }
}
function MatKetNoi(str) {
    var chair = null;
    this.chair = str;
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Mất kết nối", ""));
    }
}
function SelectDealer(str) {
    var listsd = new Array();
    var data = str.split(";");
    console.log(data);
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new SelectDealerdt(value);
            listsd.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listsd, function (key, ds) {
            ds.printToScreen();

        })
    }
}
function SelectDealerdt(str) {
    var chair = null;
    var select = null;
    var data = str.split("/");
    this.chair = data[1];
    this.select = data[0];
//    if(data[2] != null){
//        this.card = data[2].substring(data[2].indexOf(":") + 1, data[2].indexOf("$"));
//
//    }
    if (this.select == 'dl') {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "SelectDealer", "Dealer"));
        }
    } else if (this.select == 'sb') {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "SelectDealer", "Small Blind"));
        }
    } else if (this.select == 'bb') {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "SelectDealer", "Big Blind"));
        }
    }
}
function TakeTurn(str) {
    var chair = null;
    var action = null;
    var money = null;
    var data = str.split(";");
    console.log(data);
    this.chair = data[0];
    this.action = data[1];
    this.money = data[2];
    if (this.action == 0) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Take Turn", "FOLD: " + this.money));
        }
    } else if (this.action == 1) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Take Turn", "CHECK: " + this.money));
        }
    } else if (this.action == 2) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Take Turn", "CALL: " + this.money));
        }
    }
    else if (this.action == 3) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Take Turn", "RAISE: " + this.money));
        }
    }
    else if (this.action == 4) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Take Turn", "ALLIN: " + this.money));
        }
    }
}

function PublicCard(str) {
    var bai = null;
    this.bai = str.substring(str.indexOf(":") + 1, str.indexOf("$"));
    this.bai = this.bai.replace(/c|r|t|b/gi, function (matched) {
        return mapObj[matched];
    });
    this.printToScreen = function () {
        $("#logbai").append(tableName("", "", "Public Card", this.bai));
    }
}

function NewRound(str) {
    var action = null;
    var bai = null;
    var data = str.split(";");
    this.bai = data[1].substring(data[1].indexOf(":") + 1, str.indexOf("$"));
    this.bai = this.bai.replace(/c|r|t|b/gi, function (matched) {
        return mapObj[matched];
    });
    this.action = data[0];
    if (this.action == 0) {
        this.printToScreen = function () {
            $("#logbai").append(tableName("", "", "New Round", "PRE_FLOP: " + this.bai));
        }
    } else if (this.action == 1) {
        this.printToScreen = function () {
            $("#logbai").append(tableName("", "", "New Round", "FLOP: " + this.bai));
        }
    }
    else if (this.action == 2) {
        this.printToScreen = function () {
            $("#logbai").append(tableName("", "", "New Round", "TURN : " + this.bai));
        }
    }
    else if (this.action == 3) {
        this.printToScreen = function () {
            $("#logbai").append(tableName("", "", "New Round", "RIVER: " + this.bai));
        }
    }

}
function EndGame(str) {
    var data = str.split(";");
    var chair = null;
    var money = null;
    var content = null;
    var subcontent = null;
    this.chair = data[0];
    this.money = data[1];
    this.content = data[2].split("|");
    var result = "";
    for (var i = 0; i < this.content.length; i++) {
        this.content[i] = this.content[i].replace(/\,/g, ' ');
        this.content[i] = this.content[i].replace(/0|1|2/gi, function (matched) {
            return mapcaro[matched];
        });
        console.log(this.content[i]);

        result += displaycaro(this.content[i]);

    }

    if (data[2] != "" || data[2] != null) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Tiền thắng: " + this.money, result));
        };
    } else {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Tiền thắng: " + this.money, ""));
        };
    }

}
function RutBai(str) {
    var chair = null;
    var bai = null;
    var data = str.split("/");
    this.chair = data[0];
    this.bai = data[1];
    this.bai = data[1].substring(data[1].indexOf(":") + 1, data[1].indexOf("$"));
    this.bai = this.bai.replace(/c|r|t|b/gi, function (matched) {
        return mapObj[matched];
    });
    this.printToScreen = function () {
        $("#logbai").append(tableName(this.chair, listName[this.chair], "Rút bài", this.bai));
    };
}
function DanhSachSoBai(str) {
    var listds = new Array();
    var data = str.split(";");

    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new SoBai(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function SoBai(str) {
    var chair = null;
    var bai = null;
    var data1 = str.split("/");
    console.log(data1);
    if (data1[1] != null) {
        this.chair = data1[0];
        this.bai = data1[1];
        this.bai = data1[1].substring(data1[1].indexOf(":") + 1, data1[1].indexOf("$"));
        this.bai = this.bai.replace(/c|r|t|b/gi, function (matched) {
            return mapObj[matched];

        });

        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "So Bài", this.bai));
        };
    } else {
        this.printToScreen = function () {

        };
    }


}
function CongTien(str) {
    var chair = null;
    var money = null;
    var data1 = str.split("/");
    this.chair = data1[0];
    this.money = data1[1].replace(";", "");
    if (this.money != 0) {
        this.printToScreen = function () {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Cộng tiền", this.money));
        };
    } else {
        this.printToScreen = function () {

        };
    }

}

function DanhQuan(str) {
    var data = str.split(";");
    var chair = null;
    var co = null;
    var co1 = null;
    this.chair = data[0];
    if ($("#gamename").val() == "CoTuong") {
        this.co = data[1].replace(/bx0|bx1|bm0|bm1|bt0|bt1|bs1|bs0|bp0|bp1|bz0|bz1|bz2|bz3|bz4|bg0|rx0|rx1|rm0|rm1|rt0|rt1|rs0|rs1|rp0|rp1|rz0|rz1|rz2|rz3|rz4|rg0/gi, function (matched) {
            return mapcotuong[matched];
        });
        if (data[7] != null) {
            this.co1 = data[6].replace(/bx0|bx1|bm0|bm1|bt0|bt1|bs0|bs1|bp0|bp1|bz0|bz1|bz2|bz3|bz4|bg0|rx0|rx1|rm0|rm1|rt0|rt1|rs0|rs1|rp0|rp1|rz0|rz1|rz2|rz3|rz4|rg0/gi, function (matched) {
                return mapcotuong[matched];
            });
        }

        if (data[7] != 2) {
            this.printToScreen = function () {
                $("#logbai").append(tableName(this.chair, listName[this.chair], "Đi quân", this.co + "  từ vị trí:  " + data[2] + data[3] + " đến vị trí  " + data[4] + data[5]));
            };
        } else {
            this.printToScreen = function () {
                $("#logbai").append(tableName(this.chair, listName[this.chair], "Đi quân", this.co + "  từ vị trí:  " + data[2] + data[3] + " đến vị trí  " + data[4] + data[5] + " ăn quân  " + this.co1));
            };
        }
    } else if ($("#gamename").val() == "CoUp") {
        this.co = data[1].replace(/bx2|bx3|bm2|bm3|bt2|bt3|bs2|bs3|bp2|bp3|bz5|bz6|bz7|bz8|bz9|bg0|rx2|rx3|rm2|rm3|rt2|rt3|rs2|rs3|rp2|rp3|rz5|rz6|rz7|rz8|rz9|rg0/gi, function (matched) {
            return mapcoup[matched];
        });
        if (data[7] != null) {
            this.co1 = data[6].replace(/bx2|bx3|bm2|bm3|bt2|bt3|bs2|bs3|bp2|bp3|bz5|bz6|bz7|bz8|bz9|bg0|rx2|rx3|rm2|rm3|rt2|rt3|rs2|rs3|rp2|rp3|rz5|rz6|rz7|rz8|rz9|rg0/gi, function (matched) {
                return mapcoup[matched];
            });
        }

        if (data[7] != 2) {
            this.printToScreen = function () {
                $("#logbai").append(tableName(this.chair, listName[this.chair], "Đi quân", this.co + "  từ vị trí:  " + data[2] + data[3] + " đến vị trí  " + data[4] + data[5]));
            };
        } else {
            this.printToScreen = function () {
                $("#logbai").append(tableName(this.chair, listName[this.chair], "Đi quân", this.co + "  từ vị trí:  " + data[2] + data[3] + " đến vị trí  " + data[4] + data[5] + " ăn quân  " + this.co1));
            };
        }
    }

}

function HetCo(str) {
    var data = str.split(";");
    var chair = null;
    var money = null;
    var kq = null;
    this.chair = data[1];
    this.money = data[2];
    this.kq = data[4].split("/");

    var result = "";
    if ($("#gamename").val() == "CoTuong") {
        for (var i = 0; i < this.kq.length; i++) {
            if (i == 4) {
                this.kq[4] = this.kq[i].replace(/\,/g, 's1');
                this.kq[4] = this.kq[4].replace(/bx0s1|bx1s1|bm0s1|bm1s1|bt0s1|bt1s1|bs0s1|bs1s1|bp0s1|bp1s1|bz0s1|bz1s1|bz2s1|bz3s1|bz4s1|bg0s1|rx0s1|rx1s1|rm0s1|rm1s1|rt0s1|rt1s1|rs0s1|rs1s1|rp0s1|rp1s1|rz0s1|rz1s1|rz2s1|rz3s1|rz4s1|rg0s1|s1/gi, function (matched) {
                    return mapcotuong1[matched];
                });
            }
            else if (i == 5) {
                this.kq[5] = this.kq[i].replace(/\,/g, 's2');
                this.kq[5] = this.kq[5].replace(/bx0s2|bx1s2|bm0s2|bm1s2|bt0s2|bt1s2|bs0s2|bs1s2|bp0s2|bp1s2|bz0s2|bz1s2|bz2s2|bz3s2|bz4s2|bg0s2|rx0s2|rx1s2|rm0s2|rm1s2|rt0s2|rt1s2|rs0s2|rs1s2|rp0s2|rp1s2|rz0s2|rz1s2|rz2s2|rz3s2|rz4s2|rg0s2|s2/gi, function (matched) {
                    return mapcotuong1[matched];
                });
            } else {
                this.kq[i] = this.kq[i].replace(/\,/g, 'o');
                this.kq[i] = this.kq[i].replace(/bx0o|bx1o|bm0o|bm1o|bt0o|bt1o|bs0o|bs1o|bp0o|bp1o|bz0o|bz1o|bz2o|bz3o|bz4o|bg0o|rx0o|rx1o|rm0o|rm1o|rt0o|rt1o|rs0o|rs1o|rp0o|rp1o|rz0o|rz1o|rz2o|rz3o|rz4o|rg0o|o/gi, function (matched) {
                    return mapcotuong1[matched];
                });
            }

            result += displaycaro(this.kq[i]);
        }
    } else if ($("#gamename").val() == "CoUp") {
        for (var i = 0; i < this.kq.length; i++) {
            if (i == 4) {
                this.kq[4] = this.kq[i].replace(/\,/g, 's1');
                this.kq[4] = this.kq[4].replace(/bx0s1|bx1s1|bm0s1|bm1s1|bt0s1|bt1s1|bs0s1|bs1s1|bp0s1|bp1s1|bz0s1|bz1s1|bz2s1|bz3s1|bz4s1|bg0s1|rx0s1|rx1s1|rm0s1|rm1s1|rt0s1|rt1s1|rs0s1|rs1s1|rp0s1|rp1s1|rz0s1|rz1s1|rz2s1|rz3s1|rz4s1|rg0s1|s1|bx2s1|bx3s1|bm2s1|bm3s1|bt2s1|bt3s1|bs2s1|bs3s1|bp2s1|bp3s1|bz5s1|bz6s1|bz7s1|bz8s1|bz9s1|rx2s1|rx3s1|rm2s1|rm3s1|rt2s1|rt3s1|rs2s1|rs3s1|rp2s1|rp3s1|rz5s1|rz6s1|rz7s1|rz8s1|rz9s1/gi, function (matched) {
                    return mapcoup1[matched];
                });
            }
            else if (i == 5) {
                this.kq[5] = this.kq[i].replace(/\,/g, 's2');
                this.kq[5] = this.kq[5].replace(/bx0s2|bx1s2|bm0s2|bm1s2|bt0s2|bt1s2|bs0s2|bs1s2|bp0s2|bp1s2|bz0s2|bz1s2|bz2s2|bz3s2|bz4s2|bg0s2|rx0s2|rx1s2|rm0s2|rm1s2|rt0s2|rt1s2|rs0s2|rs1s2|rp0s2|rp1s2|rz0s2|rz1s2|rz2s2|rz3s2|rz4s2|rg0s2|s2|bx2s2|bx3s2|bm2s2|bm3s2|bt2s2|bt3s2|bs2s2|bs3s2|bp2s2|bp3s2|bz5s2|bz6s2|bz7s2|bz8s2|bz9s2|rx2s2|rx3s2|rm2s2|rm3s2|rt2s2|rt3s2|rs2s2|rs3s2|rp2s2|rp3s2|rz5s2|rz6s2|rz7s2|rz8s2|rz9s2/gi, function (matched) {
                    return mapcoup1[matched];
                });
            } else {
                this.kq[i] = this.kq[i].replace(/\,/g, 'o');
                this.kq[i] = this.kq[i].replace(/bx0o|bx1o|bm0o|bm1o|bt0o|bt1o|bs0o|bs1o|bp0o|bp1o|bz0o|bz1o|bz2o|bz3o|bz4o|bg0o|rx0o|rx1o|rm0o|rm1o|rt0o|rt1o|rs0o|rs1o|rp0o|rp1o|rz0o|rz1o|rz2o|rz3o|rz4o|rg0o|o|bx2o|bx3o|bm2o|bm3o|bt2o|bt3o|bs2o|bs3o|bp2o|bp3o|bz5o|bz6o|bz7o|bz8o|bz9o|rx2o|rx3o|rm2o|rm3o|rt2o|rt3o|rs2o|rs3o|rp2o|rp3o|rz5o|rz6o|rz7o|rz8o|rz9o/gi, function (matched) {
                    return mapcoup1[matched];
                });
            }

            result += displaycaro(this.kq[i]);
        }
    }


    this.printToScreen = function () {
        if (data[0] == 6) {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Tiền thắng: " + this.money + "  Lý do thắng: đối thủ hết giờ", result));
        } else if (data[0] == 7) {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Tiền thắng: " + this.money + "  Lý do thắng: đối thủ xin thua", result));
        } else if (data[0] == 1) {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Ván này hòa, số tiền bị trừ: " + this.money, result));
        }
        else {
            $("#logbai").append(tableName(this.chair, listName[this.chair], "Tiền thắng: " + this.money, result));
        }

    };

}


function BatDauXD(str) {
    var listds = new Array();
    var data = str.split(";");

    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new BatDauXDCT(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function BatDauXDCT(str) {
    var listbd = str.split("/");
    if (listbd !== null) {
        if (listbd[1] != null) {
            this.chair = listbd[1];
            this.nickname = listbd[0];
            listName[this.chair] = this.nickname;
        } else {
            listbdmc.push(listbd[0]);
            if (listbdmc[0] == 1) {
                moneyType = "vin";
            } else {
                moneyType = "xu";
            }
        }
    }
    this.printToScreen = function () {
        if (listbd[1] == null) {

        } else {

            if (listbd[1] == 0) {
                $("#logbai").append(tableName("", this.nickname, "Bắt đầu", ""));
            } else {
                $("#logbai").append(tableName("", this.nickname, "Bắt đầu", "Nhà cái : " + commaSeparateNumber(listbd[2]) + " " + moneyType));
            }
        }

    }


}


function DatCuaXD(str) {
    var listds = new Array();
    var data = str.split(";");
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new DatCuocXDCT(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function DatCuocXDCT(str) {
    var listbd = str.split("/");

    this.printToScreen = function () {
        if (listbd[3] == 1) {
            $("#logbai").append(tableName("", listbd[0], "Đặt cược", "Gấp đôi: " + commaSeparateNumber(listbd[2])));
        } else if (listbd[3] == 2) {
            $("#logbai").append(tableName("", listbd[0], "Đặt cược", "Tất tay cửa " + potxd(listbd[1]) + " " + commaSeparateNumber(listbd[2])));

        } else if (listbd[3] == 0) {
            $("#logbai").append(tableName("", listbd[0], "Đặt cược", potxd(listbd[1]) + ": " + commaSeparateNumber(listbd[2])));
        }

    }


}

function MuaBanCua(str) {


    var listds = new Array();
    var data = str.split(";");
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new MuaBanCuaDT(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function MuaBanCuaDT(str) {
    var listbd = str.split("/");
    console.log(listbd);
    if(listbd != null){
        this.printToScreen = function () {
            $("#logbai").append(tableName("", listbd[0], bancuaxd(listbd[1]), commaSeparateNumber(listbd[2])));
        }
    }else{
        this.printToScreen = function () {

        }
    }

}
function HoanTien(str) {
    var listds = new Array();
    var data = str.split(";");
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new HoanTienCT(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function HoanTienCT(str) {
    var listbd = str.split("/");

    if(listbd != null) {
        this.printToScreen = function () {
            $("#logbai").append(tableName("", listbd[1], "Hoàn tiền", potxd(listbd[0]) + ": " + commaSeparateNumber(listbd[2])));

        }
    }


}
function KetQua(str) {
    var listbd = str.split(";");
    console.log(kqpot(listbd[0]));
    var trang = 0;
    var den = 0;
    for (var i = 0; i < 4; ++i) {
        if (listbd[i] == 0) {
            trang++;
        }
        if (listbd[i] == 1) {
            den++;
        }
    }

    this.printToScreen = function () {
        $("#logbai").append(tableName("", "Kết quả", kqpot(listbd[0]) + " ," + kqpot(listbd[1]) + " ," + kqpot(listbd[2]) + " ," + kqpot(listbd[3]), kqpotkq(trang, den)));

    }


}


function TraThuong(str) {
    var listds = new Array();
    var data = str.split(";");
    $.each(data, function (key, value) {
        if (value != "" || value == null) {
            var bd = new TraThuongDT(value);
            listds.push(bd);
        }
    });
    this.printToScreen = function () {
        $.each(listds, function (key, ds) {
            ds.printToScreen();
        })
    }
}
function TraLai(str) {
    var listbd = str.split("/");
    this.printToScreen = function () {
        if (listbd[1] == 1) {
            $("#logbai").append(tableName("", listbd[0], "Nhà cái cân tất", commaSeparateNumber(listbd[2].replace(";", ""))));
        } else if (listbd[1] == 2) {
            $("#logbai").append(tableName("", listbd[0], "Nhà cái trả lại", commaSeparateNumber(listbd[2].replace(";", ""))));
        }
    }
}
function TraThuongDT(str) {
    var listbd = str.split("/");
    console.log(listbd);
    this.printToScreen = function () {
        if (listbd[2] != "") {
            $("#logbai").append(tableName("", listbd[0], "Trả thưởng", commaSeparateNumber(listbd[1]) + " " + trathuongeror(listbd[2])));
        } else {
            $("#logbai").append(tableName("", listbd[0], "Trả thưởng", commaSeparateNumber(listbd[1])));
        }
    }
}

function DungDatCuoc(str) {
    var listbd = str.split(";");
    var listbd1 = listbd[0].split("/");
    var listbd2 = listbd[1].split("/");
    var listbd3 = listbd[2].split("/");
    var listbd4 = listbd[3].split("/");
    var listbd5 = listbd[4].split("/");
    var listbd6 = listbd[5].split("/");

    this.printToScreen = function () {
        $("#logbai").append(tableName("", "", "Dừng đặt cược", potxd(listbd1[0]) + ": " + commaSeparateNumber(listbd1[1]) + " , " + potxd(listbd2[0]) + ": " + commaSeparateNumber(listbd2[1]) + " , " + potxd(listbd3[0]) + ": " + commaSeparateNumber(listbd3[1]) + " , " + potxd(listbd4[0]) + ": " + commaSeparateNumber(listbd4[1]) + " , " + potxd(listbd5[0]) + ": " + commaSeparateNumber(listbd5[1]) + " , " + potxd(listbd6[0]) + ": " + commaSeparateNumber(listbd6[1])));
    }
}

function DungHoanTien(str) {
    var listbd = str.split(";");
    var listbd1 = listbd[0].split("/");
    var listbd2 = listbd[1].split("/");
    var listbd3 = listbd[2].split("/");
    var listbd4 = listbd[3].split("/");
    var listbd5 = listbd[4].split("/");
    var listbd6 = listbd[5].split("/");

    this.printToScreen = function () {
        $("#logbai").append(tableName("", "", "Dừng hoàn  tiền", potxd(listbd1[0]) + ": " + commaSeparateNumber(listbd1[1]) + " , " + potxd(listbd2[0]) + ": " + commaSeparateNumber(listbd2[1]) + " , " + potxd(listbd3[0]) + ": " + commaSeparateNumber(listbd3[1]) + " , " + potxd(listbd4[0]) + ": " + commaSeparateNumber(listbd4[1]) + " , " + potxd(listbd5[0]) + ": " + commaSeparateNumber(listbd5[1]) + " , " + potxd(listbd6[0]) + ": " + commaSeparateNumber(listbd6[1])));
    }
}
function replaceAt(string, index, replace) {
    return string.substring(0, index) + replace + string.substring(index + 1);
}
function displaycaro(str) {
    var html = "";
    html += "<span  style='text-align: center;'>" + str + "</span><br>";
    return html;

}
function tableName(chair, name, action, des) {
    var html = "";
    html += "<tr>";
    html += "<td  style='text-align: center;'>" + chair + "</td>";
    html += "<td  style='text-align: center;'>" + name + "</td>";
    html += "<td  style='text-align: center;'>" + action + "</td>";
    html += "<td  style='text-align: center;'>" + des + "</td>";
    html += "<tr>";
    return html;
}

function resultWintype(count) {
    var strresult;
    switch (count) {
        case 1:
            strresult = "Không chơi";
            break;
        case 2:
            strresult = "Thắng thông";
            break;
        case 3:
            strresult = "Thắng sâm";
            break;
        case 4:
            strresult = "Thắng chặn sâm";
            break;
        case 5:
            strresult = "Thắng bắt treo";
            break;
        case 6:
            strresult = "50,000 Vin";
            break;
        case 7:
            strresult = "Thắng trắng tứ 2";
        case 8:
            strresult = "Thắng trắng 5 đôi";
            break;
        case 9:
            strresult = "300,000 Xu";
            break;
        case 10:
            strresult = "500,000 Xu";
            break;
        case 11:
            strresult = "1,000,000 Xu";
            break;
        case 12:
            strresult = "2,000,000 Xu";
            break;
        case 13:
            strresult = "5,000,000 Xu";
            break;
        case 14:
            strresult = "1 lượt quay Candy Slot";
        case 15:
            strresult = "2 lượt quay Candy Slot";
            break;
        case 16:
            strresult = "Trượt rồi";
            break;
    }
    return strresult;
}
function actiontt(count) {
    var strresult = "";
    switch (count) {
        case 0:
            strresult = "FOLD";
            break;
        case 1:
            strresult = "CHECK";
            break;
        case 2:
            strresult = "CALL";
            break;
        case 3:
            strresult = "RAISE";
            break;
        case 4:
            strresult = "ALLIN";
            break;
    }
    return strresult;
}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return val;
}


function potxd(count) {
    var strresult = "";
    if (count == 0) {
        strresult = "chẵn";
    } else if (count == 1) {
        strresult = "lẻ";
    }
    else if (count == 2) {
        strresult = "4 trắng";
    }
    else if (count == 3) {
        strresult = "4 đen";
    }
    else if (count == 4) {
        strresult = "1 trắng";
    }
    else if (count == 5) {
        strresult = "1 đen";
    }

    return strresult;
}

function kqpot(count) {
    var strresult = "";
    if (count == 0) {
        strresult = "trắng";
    } else if (count == 1) {
        strresult = "đen";
    }
    return strresult;
}
function kqpotkq(trang, den) {

    var strresult = "";
    if (trang == 4 && den == 0) {
        strresult = "chẵn , 4 trắng";
    } else if (trang == 3 && den == 1) {
        strresult = "lẻ, 1 đen";
    }
    else if (trang == 2 && den == 2) {
        strresult = "chẵn";
    }
    else if (trang == 1 && den == 3) {
        strresult = "lẻ, 1 trắng";
    }
    else if (trang == 0 && den == 4) {
        strresult = "chẵn, 4 đen";
    }
    return strresult;
}

function trathuongeror(count) {

    var strresult = "";
    if (count == 0) {
        strresult = "thành công";
    } else if (count == 1001) {
        strresult = "system error";
    }
    else if (count == 1030) {
        strresult = " hazelcast error";
    }
    else if (count == 1031) {
        strresult = "rmq error";
    }
    else if (count == 1003) {
        strresult = "sessionId not  exist";
    }
    return strresult;
}

function bancuaxd(count) {

    var strresult = "";
    if (count == 1) {
        strresult = "Nhà cái cân tất";
    } else if (count == 2) {
        strresult = "Nhà cái bán chẵn";
    }
    else if (count == 3) {
        strresult = "Nhà cái bán lẻ";
    }
    else if (count == 4) {
        strresult = "Người chơi mua cửa";
    }
    return strresult;
}
</script>
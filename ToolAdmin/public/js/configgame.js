$('#form').submit(function () {
    $.ajax({
        url: this.action,
        type: this.method,
        data: $(this).serialize(),
        success: function (result) {
            $.ajax({
                type: "POST",
                url: "http://104.155.193.15:8081/api",
                data: {c: 7},
                dataType: 'json',
                success: function (result) {

                }
            });
            alert("Cập nhật thành công");
        },
        error: function (result) {
            alert('Post was not successful!');
        }
    });
    return false;
});


$("#editios").click(function () {
    $("#url_update_ios").removeAttr("readonly");
    $("#update_ios").attr('disabled', false);
    $("#submitios").attr('disabled', false);
    $("#version_ios").removeAttr("readonly");
});
$("#editandroid").click(function () {
    $("#url_update_android").removeAttr("readonly");
    $("#update_android").attr('disabled', false);
    $("#submitandroid").attr('disabled', false);
    $("#version_android").removeAttr("readonly");
});
$("#editwp").click(function () {
    $("#url_update_wp").removeAttr("readonly");
    $("#update_wp").attr('disabled', false);
    $("#submitwp").attr('disabled', false);
    $("#version_wp").removeAttr("readonly");
});
$("#editweb").click(function () {
    $("#url_update_web").removeAttr("readonly");
    $("#update_web").attr('disabled', false);
    $("#submitweb").attr('disabled', false);
    $("#version_web").removeAttr("readonly");
});
$("#editminigame").click(function () {
    $("#server_minigame").removeAttr("readonly");
    $("#port_minigame").removeAttr("readonly");
    $("#status_minigame").attr('disabled', false);
    $("#submitminigame").attr('disabled', false);
});
$("#editsam").click(function () {
    $("#server_sam").removeAttr("readonly");
    $("#port_sam").removeAttr("readonly");
    $("#status_sam").attr('disabled', false);
    $("#submitsam").attr('disabled', false);
});
$("#editbacay").click(function () {
    $("#server_bacay").removeAttr("readonly");
    $("#port_bacay").removeAttr("readonly");
    $("#status_bacay").attr('disabled', false);
    $("#submitbacay").attr('disabled', false);
});
$("#editbinh").click(function () {
    $("#server_binh").removeAttr("readonly");
    $("#port_binh").removeAttr("readonly");
    $("#status_binh").attr('disabled', false);
    $("#submitbinh").attr('disabled', false);
});
$("#edittlmn").click(function () {
    $("#server_tlmn").removeAttr("readonly");
    $("#port_tlmn").removeAttr("readonly");
    $("#status_tlmn").attr('disabled', false);
    $("#submittlmn").removeAttr('disabled');
});

$("#editphone").click(function () {
    $("#phone").removeAttr("readonly");
    $("#facebook").removeAttr("readonly");
    $("#submitphone").removeAttr('disabled');
});
$("#editurl").click(function () {
    $("#urlhelp").removeAttr("readonly");
    $("#submiturl").removeAttr('disabled');
});

$("#update_ios").change(function () {
    $("#hdnios").val($(this).val());

});
$("#update_android").change(function () {
    $("#hdnadroid").val($(this).val());

});
$("#update_wp").change(function () {
    $("#hdnwp").val($(this).val());

});
$("#update_web").change(function () {
    $("#hdnweb").val($(this).val());

});
$("#status_minigame").change(function () {
    $("#hdnminigame").val($(this).val());

});
$("#status_sam").change(function () {
    $("#hdnsam").val($(this).val());

});
$("#status_bacay").change(function () {
    $("#hdnbacay").val($(this).val());

});
$("#status_binh").change(function () {
    $("#hdnbinh").val($(this).val());

});
$("#status_tlml").change(function () {
    $("#hdntlmn").val($(this).val());

});
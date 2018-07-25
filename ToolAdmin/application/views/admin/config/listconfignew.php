<!-- head -->
<?php $this->load->view('admin/config/head', $this->data) ?>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="wrapper">
        <div class="widget">
            <?php if($admin_info ->Status == "A" || $admin_info ->Status == "C"): ?>
                <div class="title">
                    <h6>Danh sách game config new</h6>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Tên config</td>
                        <td>Platform</td>
                        <td>Hành động</td>
                    </tr>
                    </thead>
                    <tbody id="logaction">

                    </tbody>
                </table>
            <?php else: ?>
                <div class="title">
                    <h6>Bạn không được phân quyền</h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif;?>
<div class="clear mt30"></div>

<script>
    function resultSearchTransction(id, name, platform) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + id + "</td>";
        rs += "<td>" + name + "</td>";
        rs += "<td>" + platform + "</td>";
        rs += "<td>"+ "<a href='<?php echo admin_url('confignew/edit') ?>"+"/"+name+"/"+platform+"/"+id+"'>" +"<img src='<?php echo public_url('admin') ?>/images/icons/color/edit.png'/>"+"</a>"+ "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/listconfigajax')?>",
// url: "http://192.168.0.251:8082/api_backend",
            data: {
            },
            dataType: 'json',
            success: function (result) {
                $.each(result.gameconfig, function (index, value) {
                    result += resultSearchTransction(value.id, value.name,value.platform);
                });
                $('#logaction').html(result);

            }
        })

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

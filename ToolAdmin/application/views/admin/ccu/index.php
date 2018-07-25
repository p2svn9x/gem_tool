<?php $this->load->view('admin/ccu/head', $this->data) ?>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
<link rel="stylesheet"
      href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
<script
    src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
<div class="line"></div>
<?php if ($role == false): ?>
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

            <div class="formRow">
                <form class="list_filter form" action="<?php echo admin_url('logminigame') ?>" method="get">
                    <table>
                        <tr>

                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item"><input name="created"
                                                    value="<?php echo $this->input->get('created') ?>"
                                                    id="toDate" type="text" class="datepicker"/></td>
                            <td>
                                <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                       class="formLeft"> Đến ngày: </label>
                            </td>
                            <td class="item"><input name="created_to"
                                                    value="<?php echo $this->input->get('created_to') ?>"
                                                    id="fromDate" type="text" class="datepicker-input"/></td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 20px">
                            </td>

                        </tr>
                    </table>
                </form>
            </div>

            <div class="formRow">
                <h4>Tổng CCU : <span id="sumccu" style="color: #0000ff"></span></h4>
            </div>
                <!--<table class="table table-bordered table-striped" id="checkAll">
                    <thead>
                    <tr>
                        <td style="width: 14.15%">
                            Web
                        </td>
                        <td style="width: 14.15%">
                            Android
                        </td>
                        <td style="width: 14.15%">
                            Ios
                        </td>
                        <td style="width: 14.15%">
                            Winphone
                        </td>
                        <td style="width: 14.15%">
                            App Facebook
                        </td>
                        <td style="width: 14.15%">
                            Desktop
                        </td>
                        <td style="width: 14.15%">
                            Other
                        </td>

                    </tr>
                    </thead>
                    <tbody id="logccu">
                    </tbody>
                </table>-->



            <div class="formRow">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
           <!-- <div class="formRow">
                <div id="chartcontainer" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div> -->
        </div>
    </div>
<?php endif; ?>
<script src="<?php echo public_url() ?>/site/bootstrap/highcharts.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/exporting.js"></script>
<script>
$(document).ready(function () {
    $("#toDate").val(moment().subtract('minutes', 15).format('YYYY-MM-DD HH:mm:ss'));
    $("#fromDate").val(moment().format('YYYY-MM-DD HH:mm:ss'));
    window.setTimeout(function () {
        document.location.reload(true);
    }, 30000);
    //load ccu hien tai
    getCcu();
});
$("#search_tran").click(function () {
    getCcu();
});
$(function () {
    $('#toDate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#fromDate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss '
    });

});

function getCcu() {
    var result = "";
    var newlabels = [];
    var ccu = [];
    var Web = [];
    var Android = [];
    var Ios = [];
    var Winphone = [];
    var Facebook = [];
    var Destkop = [];
    var Other = [];

    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('ccu/indexajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val()
        },
        dataType: 'json',
        success: function (data) {
            var count = 0;
            $.each(data.transactions, function (i, item) {
                newlabels.push(item.ts);
                ccu.push(item.ccu);
                Web.push(item.web);
                Android.push(item.ad);
                Ios.push(item.ios);
                Winphone.push(item.wp);
                Facebook.push(item.fb);
                Destkop.push(item.dt);
                Other.push(item.ot);
                count++;

            });

            result += resultccu(Web[count - 1], Android[count - 1], Ios[count - 1], Winphone[count - 1], Facebook[count - 1], Destkop[count - 1], Other[count - 1]);
            $('#logccu').html(result);
            $('#sumccu').html(ccu[count-1]);
            $(function () {
                $('#container').highcharts({
                    title: {
                        text: 'Tổng CCU',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
                    },
                    chart: {
                        zoomType: 'x'
                    },
                    rangeSelector: {
                        selected: 1
                    },
                    xAxis: {
                        categories: newlabels
                    },

                    yAxis: {
                        title: {
                            text: 'ccu'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        },

                        ]
                    },
                    tooltip: {
                        valueSuffix: ''
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [{
                        name: 'CCU',
                        data: ccu
                    }]
                });
            });


            chart(Web, Android, Ios, Winphone, Facebook, Destkop, Other, newlabels);
        }
    });
}

function chart(web, android, ios, winphone, facebook, destkop, other, date) {
    Highcharts.chart('chartcontainer', {
        title: {
            text: 'CCU từng thiết bị',
            x: -20 //center
        },
        xAxis: {
            categories: date,
        },
        yAxis: {
            title: {
                text: 'Tổng User'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]

        },
        chart: {
            zoomType: 'x'

        },
        tooltip: {
            valueSuffix: 'User'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Web',
            data: web
        }, {
            name: 'Android',
            data: android

        }, {
            name: 'IOS',
            data: ios

        },
            {
                name: 'Winphone',
                data: winphone,
                visible: false

            },
            {
                name: 'App Facebook',
                data: facebook,
                visible: false

            },
            {
                name: 'Destkop',
                data: destkop,
                visible: false

            },
            {
                name: 'Other',
                data: other,
                visible: false

            }]
    });

}
function resultccu(web, android, ios, winphone, facebook, destkop, other) {
    var rs = "";
    rs += "<tr>";
    rs += "<td style='color: #0000ff'>" + web + "</td>";
    rs += "<td style='color: #0000ff'>" + android + "</td>";
    rs += "<td style='color: #0000ff'>" + ios + "</td>";
    rs += "<td style='color: #0000ff'>" + winphone + "</td>";
    rs += "<td style='color: #0000ff'>" + facebook + "</td>";
    rs += "<td style='color: #0000ff'>" + destkop + "</td>";
    rs += "<td style='color: #0000ff'>" + other + "</td>";
    rs += "</tr>";
    return rs;
}
</script>



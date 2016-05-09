<?php
//Obtain User language
$idiom = 'portuguese';
//Load of language file
$this->lang->load('statistics_lang', $idiom);
?>

<script type="text/javascript">
    var data = [
        { label: "IE",  data: 19.5, color: "#4572A7"},
        { label: "Safari",  data: 4.5, color: "#80699B"},
        { label: "Firefox",  data: 36.6, color: "#AA4643"},
        { label: "Opera",  data: 2.3, color: "#3D96AE"},
        { label: "Chrome",  data: 36.3, color: "#89A54E"},
        { label: "Other",  data: 0.8, color: "#3D96AE"}
    ];

    $(document).ready(function () {
        $.plot($("#flot-pie-chart"), data, {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                labelBoxBorderColor: "none"
            }
        });
    });
</script>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Gráfico Exemplo
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->
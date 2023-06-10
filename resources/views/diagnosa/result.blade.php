@extends('layouts.master')

@section('pagetitle', 'Mulai Diagnosa')

@section('content')
    <section class="content-header">
        <h1>
            Hasil Diagnosa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hasil Diagnosa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Hasil Diagnosa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        @foreach($data["kerusakan"] as $key => $value)
                            @if(in_array($value["kode"], $data["kode_kerusakan"]))
                                <strong><i class="fa fa-pencil margin-r-5"></i> {{ $value["nama"] }}</strong>
                                <ul>
                                    @foreach($data["gejala"] as $row => $item)
                                        @if($value["kode"] == $item["kode_kerusakan"])
                                            <li>{{ $item['solusi'] }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('diagnosa.create') }}" class="btn btn-success pull-right">Diagnosa Baru ?</a>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
@endsection

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        $(function () {
            var dataChart = <?php echo json_encode($data["chart"]); ?>;
            console.log(dataChart);

            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Persentase Diagnosa Kerusakan'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: dataChart
                }]
            });
        });
    </script>
@endsection

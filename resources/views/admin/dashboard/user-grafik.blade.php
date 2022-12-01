@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Grafik</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Langkah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">BMI</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script>
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(231,233,237)'
        };

        var ctx = document.getElementById("canvas").getContext("2d"),
            data = {!! json_encode($grafik) !!},
            label = [],
            data_langkah = [];

        console.log(data)

        $.each(data, function(k, v) {
            label.push(`Hari ${v.hari}`)
            data_langkah.push(v.langkah)
        })

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label,
                datasets: [{
                    label: 'Dataset 1',
                    borderColor: window.chartColors.red,
                    borderWidth: 2,
                    fill: false,
                    data: data_langkah
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    // text: 'Chart.js Drsw Line on Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: true
                },
                annotation: {
                    annotations: [{
                        type: 'line',
                        mode: 'horizontal',
                        scaleID: 'y-axis-0',
                        value: 2225,
                        endValue: 0,
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 4,
                        label: {
                            enabled: true,
                            content: 'Trendline',
                            yAdjust: -16,
                        }
                    }]
                }
            }
        });
    </script> --}}
    <script>
        $(function() {
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d'),
                data = {!! json_encode($grafik) !!},
                label = [],
                data_langkah = [];

            $.each(data, function(k, v) {
                label.push(`${v.hari}`)
                data_langkah.push(v.langkah)
            })

            var areaChartData = {
                labels: label,
                datasets: [{
                    label: '',
                    backgroundColor: '',
                    borderColor: '#dc3545',
                    // pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: data_langkah
                }, ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                        }
                    }]
                }
            }

            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d'),
                data = {!! json_encode($bmi) !!},
                label = [],
                data_bb = [],
                data_tb = [];

            $.each(data, function(k, v) {
                label.push(`${v.hari}`)
                data_bb.push(v.berat_badan)
                data_tb.push(v.tinggi_badan)
            })

            var lineChartData = {
                labels: label,
                datasets: [{
                        label: 'Tinggi Badan',
                        backgroundColor: '',
                        borderColor: 'rgba(60,141,188,0.8)',
                        // pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: data_bb
                    },
                    {
                        label: 'Berat Badan',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: '#00B9C6',
                        // pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: data_tb
                    },
                ]
            }

            var lineChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                        }
                    }]
                }
            }

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })
        })
    </script>
@endsection

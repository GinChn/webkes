@extends('user.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-6 col-md-4 m-0">
                    <h1>
                        <?php
                        setlocale(LC_ALL, 'IND');
                        $date = strftime('%A, %d %b %Y');
                        echo $date;
                        ?>
                    </h1>
                </div>
                <div class="col-md m-0">
                    <h1>
                        <span class="info-box-number time_interval"></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        </div>

        <!-- GRAFIK -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- END GRAFIK -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Report</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example3" class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Jumlah Langkah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $item)
                                        <tr>
                                            <td>{{ $item->langkah }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div> --}}
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('script')
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

            var check_bolong = {!! json_encode($check_bolong) !!};
            console.log(check_bolong)

            if (check_bolong.ada >= 3) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    showCloseButton: true,
                })

                Toast.fire({
                    icon: 'warning',
                    title: 'Olahraga cuk!'
                })
            }

            function time() {
                var d = new Date();
                var s = d.getSeconds();
                var m = d.getMinutes();
                var h = d.getHours();
                $('.time_interval').text(("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(
                    -2));
            }
            time()
            setInterval(time, 1000);

            $('#example3').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
@endsection

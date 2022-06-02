<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>



<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0">Dashboard</h1>

                </div>

            </div>

            <!-- /.row -->

        </div>

        <!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->

            <div class="row">

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-info">

                        <div class="inner">

                            <h3><?= $jml_jadwal ?></h3>



                            <p>Total Jadwal (Sepekan)</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-bag"></i>

                        </div>

                        <div class="small-box-footer p-3"></div>

                    </div>

                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-success">

                        <div class="inner">

                            <h3><?= $jml_guru ?></h3>



                            <p>Jumlah Guru</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-stats-bars"></i>

                        </div>

                        <div class="small-box-footer p-3"></div>

                    </div>

                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-warning">

                        <div class="inner">

                            <h3><?= $jml_murid ?></h3>



                            <p>Jumlah Murid</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-pie-graph"></i>

                        </div>

                        <div class="small-box-footer p-3"></div>

                    </div>

                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-danger">

                        <div class="inner">

                            <h3>Daftarkan</h3>



                            <p>Murid Baru</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-person-add"></i>

                        </div>

                        <a href="<?= base_url('daftar/daftarbyadmin') ?>" class="small-box-footer">Klik disini! <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->

            </div>

            <!-- /.row -->

            <!-- Main row -->

            <div class="row">

                <!-- Left col -->

                <section class="col-md-6 connectedSortable">

                    <!-- Custom tabs (Charts with tabs)-->

                    <!-- PIE CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Klasifikasi murid berdasarkan Jenis Kelamin</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChartMurid" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <div class="text-center mb-3">Laki-laki : <?= $jml_murid_ikhwan ?> | Perempuan : <?= $jml_murid_akhwat ?></div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Calendar -->

                    <div class="card bg-gradient-success">

                        <div class="card-header border-0">


                            <h3 class="card-title">

                                <i class="far fa-calendar-alt"></i>

                                Calendar

                            </h3>

                            <!-- tools card -->

                            <div class="card-tools">


                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">

                                    <i class="fas fa-minus"></i>

                                </button>


                            </div>

                            <!-- /. tools -->

                        </div>

                        <!-- /.card-header -->

                        <div class="card-body pt-0">

                            <!--The calendar -->

                            <div id="calendar" style="width: 100%"></div>

                        </div>

                        <!-- /.card-body -->

                    </div>

                    <!-- /.card -->

                </section>

                <!-- /.Left col -->

                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <section class="col-lg-6 connectedSortable">

                    <!-- PIE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Jumlah hari dalam jadwal</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChartJadwal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <div class="mb-3"></div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- Map card -->

                    <div class="card bg-gradient-primary d-none">

                        <div class="card-header border-0">

                            <h3 class="card-title">

                                <i class="fas fa-map-marker-alt mr-1"></i>

                                Peta Sebaran Murid LMK Kab. Kuningan

                            </h3>

                            <!-- card tools -->

                            <div class="card-tools">

                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">

                                    <i class="far fa-calendar-alt"></i>

                                </button>

                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">

                                    <i class="fas fa-minus"></i>

                                </button>

                            </div>

                            <!-- /.card-tools -->

                        </div>

                        <div class="card-body">

                            <div id="world-map" style="height: 250px; width: 100%;"></div>

                        </div>

                        <!-- /.card-body-->

                        <div class="card-footer bg-transparent">

                            <div class="row">

                                <div class="col-4 text-center">

                                    <div id="sparkline-1"></div>

                                    <div class="text-white">Visitors</div>

                                </div>

                                <!-- ./col -->

                                <div class="col-4 text-center">

                                    <div id="sparkline-2"></div>

                                    <div class="text-white">Online</div>

                                </div>

                                <!-- ./col -->

                                <div class="col-4 text-center">

                                    <div id="sparkline-3"></div>

                                    <div class="text-white">Sales</div>

                                </div>

                                <!-- ./col -->

                            </div>

                            <!-- /.row -->

                        </div>

                    </div>

                    <!-- /.card -->

                </section>

                <!-- right col -->

            </div>

            <!-- /.row (main row) -->

        </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>

<!-- /.content-wrapper -->

<!-- ChartJS & jquery -->
<script src="<?= base_url('/assets/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('/assets/themes/plugins/chart.js/Chart.min.js') ?>"></script>

<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        var muridData = {
            labels: [
                'Laki-laki',
                'Perempuan'
            ],
            datasets: [{
                data: [<?= $jml_murid_ikhwan; ?>, <?= $jml_murid_akhwat ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChartMurid').get(0).getContext('2d')
        var pieData = muridData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        var jadwalData = {
            labels: [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu'
            ],
            datasets: [{
                data: [<?= $jml_senin ?>, <?= $jml_selasa ?>, <?= $jml_rabu ?>, <?= $jml_kamis ?>, <?= $jml_jumat ?>, <?= $jml_sabtu; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChartJadwal').get(0).getContext('2d')
        var pieData = jadwalData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

    })
</script>

<?= $this->endSection() ?>
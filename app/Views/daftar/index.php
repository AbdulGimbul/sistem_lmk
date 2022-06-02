<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="wizard-main">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 login-sec">
                            <div class="login-sec-bg">
                                <h2 class="text-center">Form Pendaftaran Murid Baru</h2>
                                <form id="example-advanced-form" action="<?= base_url('daftar/ambildata') ?>" method="post" enctype="multipart/form-data" style="display: none;">
                                    <h3>Data Diri</h3>
                                    <fieldset class="form-input" style="overflow-y: auto;">
                                        <div class="row">
                                            <div class="col-9">
                                                <h4 class="fs-title">Isi Data Diri Anda:</h4>
                                            </div>
                                        </div>

                                        <input type="hidden" name="user_ortu" id="user_ortu" value="<?= $id_user ?>">

                                        <div class="form-group">
                                            <label for="nama">Nama Murid</label>
                                            <input class="form-control required" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" checked>
                                                    <label class="custom-control-label" for="laki-laki">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio" name="jk" id="perempuan" value="Perempuan">
                                                    <label class="custom-control-label" for="perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input class="form-control required" type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input class=" form-control required" type="date" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input class="form-control required" type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="asal_sekolah">Asal Sekolah</label>
                                            <input class="form-control required" type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= old('asal_sekolah') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <input class="form-control required number" type="number" class="form-control" id="kelas" name="kelas" value="<?= old('kelas') ?>">
                                        </div>
                                    </fieldset>

                                    <h3>Jadwal</h3>
                                    <fieldset class="form-input" style="overflow-y: auto;">
                                        <div class="row">
                                            <div class="col-9">
                                                <h4 class="fs-title">Tentukan Jadwal dan Guru:</h4>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal">Tentukan Jadwal Les</label>
                                            <div class="card">
                                                <div class="card-header text-center">Jadwal Belajar Dalam Sepekan</div>
                                                <div class="card-body field_wrapper">
                                                    <div class="row mb-3">
                                                        <tr>
                                                            <div class="col-sm-5">
                                                                <!-- <label for="waktu_belajar" class="col-sm col-form-label">Pilih Hari Belajar</label> -->
                                                                <select class="custom-select" name="hari[]" id="hari[]">
                                                                    <option value="Senin" selected>Senin</option>
                                                                    <option value="Selasa">Selasa</option>
                                                                    <option value="Rabu">Rabu</option>
                                                                    <option value="Kamis">Kamis</option>
                                                                    <option value="Jumat">Jumat</option>
                                                                    <option value="Sabtu">Sabtu</option>
                                                                </select>
                                                            </div>
                                                            <!-- memilih jam di tiap hari yg dipilih -->
                                                            <div class="col-sm-5">
                                                                <!-- <label for="pilih-jam" class="col-sm col-form-label">Pilih Jam Belajar</label> -->
                                                                <select class="custom-select" name="jam[]" id="jam[]">
                                                                    <option value="08.00" selected>08.00</option>
                                                                    <option value="08.30">08.30</option>
                                                                    <option value="09.00">09.00</option>
                                                                    <option value="09.30">09.30</option>
                                                                    <option value="10.00">10.00</option>
                                                                    <option value="10.30">10.30</option>
                                                                    <option value="11.00">11.00</option>
                                                                    <option value="11.30">11.30</option>
                                                                    <option value="12.00">12.00</option>
                                                                    <option value="12.30">12.30</option>
                                                                    <option value="13.00">13.00</option>
                                                                    <option value="13.30">13.30</option>
                                                                    <option value="14.00">14.00</option>
                                                                    <option value="14.30">14.30</option>
                                                                    <option value="15.00">15.00</option>
                                                                    <option value="15.30">15.30</option>
                                                                    <option value="16.00">16.00</option>
                                                                    <option value="16.30">16.30</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a href="javascript:void(0)" id="add_button" class="btn btn-success"><i class="fas fa-plus"></i></a>
                                                            </div>
                                                        </tr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hideTable() {
        var x = document.getElementById("myGuru");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<?php $this->endSection() ?>
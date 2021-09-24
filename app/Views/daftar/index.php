<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="mb-4 mt-3">Isi Form Pendaftaran</h1>
                    <form action="<?= base_url('daftar/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="user" id="user">
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u->id_user; ?>" selected><?= $u->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" checked>
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat') ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= old('asal_sekolah') ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="kelas" name="kelas" value="<?= old('alamat') ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/img/default.png') ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control  <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- memilih hari -->
                        <div class="row mb-3">
                            <label for="waktu_belajar" class="col-sm-2 col-form-label">Pilih Hari Belajar</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="hari" id="hari">
                                    <option value="Senin" selected>Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <!-- memilih jam di tiap hari yg dipilih -->
                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-sm-2 col-form-label">Pilih Jam Belajar</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="jam" id="jam">
                                    <option value="08.00" selected>08.00</option>
                                    <option value="09.00">09.00</option>
                                    <option value="10.00">10.00</option>
                                    <option value="11.00">11.00</option>
                                    <option value="13.00">13.00</option>
                                    <option value="14.00">14.00</option>
                                    <option value="15.00">15.00</option>
                                    <option value="16.00">16.00</option>
                                </select>
                            </div>
                        </div>
                        //setelah ini maka akan muncul guru yg di hari dan jam itu kosong
                        //atau akan tampil guru yg paling sedikit beban mengajarnya makan ada di list paling atas
                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-sm-2 col-form-label">Pilih Guru</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="guru" id="guru">
                                    <?php foreach ($guru as $g) : ?>
                                        <option value="<?= $g['id_guru']; ?>" selected><?= $g['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="status" id="status" value="0">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="my-3">Ubah Data Murid</h1>
                    <form action="<?= base_url('murid/update/' . $murid['id_murid']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $murid['id_murid'] ?>">
                        <input type="hidden" name="fotoLama" value="<?= $murid['avatar'] ?>">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $murid['nama'] ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" <?= ($murid['jk'] == 'Laki-laki') ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan" <?= ($murid['jk'] == 'Perempuan') ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $murid['tempat_lahir'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : $murid['tgl_lahir'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $murid['alamat'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= (old('asal_sekolah')) ? old('asal_sekolah') : $murid['asal_sekolah'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= (old('kelas')) ? old('kelas') : $murid['kelas'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-2">
                                <img src="<?= $murid['avatar'] ?>" class="img-thumbnail img-preview">
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
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
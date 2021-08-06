<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="my-3">Ubah Data Guru</h1>
            <form action="<?= base_url('guru/update/' . $guru['id_guru']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $guru['id_guru'] ?>">
                <input type="hidden" name="fotoLama" value="<?= $guru['avatar'] ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $guru['nama'] ?>" autofocus>
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
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= (old('username')) ? old('username') : $guru['username'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $guru['alamat'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="<?= base_url('assets/img/' . $guru['avatar']) ?>" class="img-thumbnail img-preview">
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

<?= $this->endsection() ?>
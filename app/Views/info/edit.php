<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="my-3">Ubah Data Informasi</h1>
                    <form action="<?= base_url('info/update/' . $info['id_info']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_info" value="<?= $info['id_info'] ?>">
                        <input type="hidden" name="fotoLama" value="<?= $info['gambar'] ?>">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="judul" class="form-control" name="judul" id="judul" value="<?= (old('judul')) ? old('judul') : $info['judul'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= (old('deskripsi')) ? old('deskripsi') : $info['deskripsi'] ?></textarea>
                        </div>
                        <div class="form-group d-inline-flex">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-2">
                                <img src="<?= $info['gambar'] ?>" class="img-thumbnail img-preview">
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
                        <div class="form-group">
                            <label for="type">Pilih Type Info</label>
                            <select class="form-control" id="type" name="type">
                                <option value="1" <?= ($info['type'] == '1') ? "selected" : ""; ?>>Program LMK</option>
                                <option value="2" <?= ($info['type'] == '2') ? "selected" : ""; ?>>Tentang Kami</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
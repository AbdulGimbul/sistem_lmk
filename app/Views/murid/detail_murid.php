<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Murid</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php base_url() ?>/assets/img/<?= $murid['avatar']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $murid['nama'] ?></h5>
                            <p class="card-text"><b>Jenis Kelamin : </b><?= $murid['jk'] ?></p>
                            <p class="card-text"><b>Alamat : </b><?= $murid['alamat'] ?></p>
                            <p class="card-text"><b>Tempat, tanggal lahir : </b><br><?= $murid['tempat_lahir'] . ', ' . $murid['tgl_lahir'] ?></p>
                            <p class="card-text"><b>Asal Sekolah : </b><br><?= $murid['asal_sekolah'] ?></p>
                            <p class="card-text"><b>Kelas : </b><br><?= $murid['kelas'] ?></p>

                            <a href="<?= base_url('/murid/edit/' . $murid['id_murid']) ?>" class="btn btn-warning">Edit</a>

                            <form action="<?= base_url('/murid/' . $murid['id_murid']) ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <br><br>
                            <a href="<?= base_url('/murid') ?>">Kembali ke daftar murid</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
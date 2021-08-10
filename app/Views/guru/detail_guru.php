<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Guru</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php base_url() ?>/assets/img/<?= $guru['avatar']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $guru['nama'] ?></h5>
                            <p class="card-text"><b>Jenis Kelamin : </b><?= $guru['jk'] ?></p>
                            <p class="card-text"><b>Alamat : </b><?= $guru['alamat'] ?></p>
                            <p class="card-text"><b>Tempat, tanggal lahir : </b><br><?= $guru['tempat_lahir'] . ', ' . $guru['tgl_lahir'] ?></p>
                            <p class="card-text"><small class="text-muted"><b>Username : </b><?= $guru['username'] ?></small></p>

                            <a href="<?= base_url('/guru/edit') ?>/<?= $guru['id_guru']; ?>" class="btn btn-warning">Edit</a>

                            <form action="<?= base_url('/guru') ?>/<?= $guru['id_guru']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <br><br>
                            <a href="<?= base_url('/guru') ?>">Kembali ke daftar guru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
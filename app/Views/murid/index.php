<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1 class="mt-2">Daftar Murid</h1>
                    <a href="<?= base_url('murid/create') ?>" class="btn btn-primary mb-3">Tambah Data Murid</a>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari.." name="cari">
                            <button class="btn btn-outline-secondary" type="submit" id="submit" name="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table id="table-minimal" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                            <?php foreach ($murid as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $m['nama']; ?></td>
                                    <td><?= $m['jk']; ?></td>
                                    <td><?= $m['alamat']; ?></td>
                                    <td>
                                        <a href="<?= base_url('/murid/' . $m['id_murid']) ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('murid', 'my_pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
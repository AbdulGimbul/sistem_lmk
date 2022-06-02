<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2 mb-3 text-bold">Daftar Info LMK</h1>
                    <a href="<?= base_url('info/create') ?>" class="btn btn-primary mb-3">Tambah Data Info</a>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Type</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($info as $inf) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $inf['judul'] ?></td>
                                    <td><?= $inf['deskripsi'] ?></td>
                                    <td><img src="<?= $inf['gambar'] ?>" alt="" class="avatar"></td>
                                    <td><?php
                                        if ($inf['type'] == 1) {
                                            echo 'Program LMK';
                                        } else {
                                            echo 'Tentang Kami';
                                        }
                                        ?></td>
                                    <td>
                                        <a href="<?= base_url('/info/edit/' . $inf['id_info']) ?>" class="btn btn-info">Edit</a>
                                        <a href="<?= base_url('/info/delete/' . $inf['id_info']) ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
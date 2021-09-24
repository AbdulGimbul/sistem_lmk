<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h2 class="mt-2">Detail Murid</h2>
                    <div class="card-group">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php base_url() ?>/assets/img/<?= $murid['avatar']; ?>" class="img-fluid rounded-start m-3" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $murid['nama'] ?></h5>
                                        <p class="card-text"><b>Jenis Kelamin : </b><?= $murid['jk'] ?></p>
                                        <p class="card-text"><b>Alamat : </b><?= $murid['alamat'] ?></p>
                                        <p class="card-text"><b>Tempat, tanggal lahir : </b><br><?= $murid['tempat_lahir'] . ', ' . $murid['tgl_lahir'] ?></p>
                                        <p class="card-text"><b>Asal Sekolah : </b><br><?= $murid['asal_sekolah'] ?></p>
                                        <p class="card-text"><b>Kelas : </b><br><?= $murid['kelas'] ?></p>
                                        <input type="hidden" name="id_murid" value="<?= $murid['id_murid'] ?>">

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
                        <div class="card">
                            <div class="row g-0">
                                <div class="col">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-2">Jadwal Les</h5>
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Guru Pengajar</th>
                                                    <th scope="col">Hari</th>
                                                    <th scope="col">Jam</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($jadwal as $j) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $j['nama_guru'] ?></td>
                                                        <td><?= $j['hari'] ?></td>
                                                        <td><?= $j['jam'] ?></td>
                                                        <td><?php if ($j['status'] == 0) : ?>
                                                                <div class="badge badge-warning">Pending</div>
                                                            <?php elseif ($j['status'] == 1) : ?>
                                                                <div class="badge badge-success">Diterima</div>
                                                            <?php else : ?>
                                                                <div class="badge badge-danger">Ditolak</div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($j['status'] == 0) : ?>
                                                                <a href="<?= base_url('murid/statusterima/' . $j['id_jadwal']) ?>" class="btn btn-success">Setujui</a>
                                                                <a href="<?= base_url('murid/statustolak/' . $j['id_jadwal']) ?>" class="btn btn-danger">Tolak</a>
                                                            <?php elseif ($j['status'] == 1) : ?>
                                                                <div class="badge badge-success">Sudah diterima</div>
                                                            <?php else : ?>
                                                                <div class="badge badge-danger">Tertolak</div>
                                                            <?php endif; ?>
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
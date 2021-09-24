<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2 mb-3">Jadwal Les Mengaji Kuningan</h1>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Murid</th>
                                <th scope="col">Guru Pengajar</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jadwal as $j) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $j['nama_murid']; ?></td>
                                    <td><?= $j['nama_guru']; ?></td>
                                    <td><?= $j['alamat_murid']; ?></td>
                                    <td><?= $j['hari']; ?></td>
                                    <td><?= $j['jam']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
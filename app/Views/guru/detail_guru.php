<?= $this->extend('layout/template'); ?>



<?= $this->section('content') ?>



<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col">

                    <h2 class="mt-2">Detail Guru</h2>

                    <div class="card-group">

                        <div class="card">

                            <div class="row">

                                <div class="col-md-4">

                                    <img src="<?= $guru['avatar']; ?>" class="img-fluid rounded-start" alt="...">

                                </div>

                                <div class="col">

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

                        <div class="card">

                            <div class="row">

                                <div class="col">

                                    <div class="card-body text-center">

                                        <h5 class="card-title mb-2">Jadwal Mengajar</h5>

                                        <table id="table" class="table table-bordered table-striped">

                                            <thead>

                                                <tr>

                                                    <th scope="col">#</th>

                                                    <th scope="col">Nama Murid</th>

                                                    <th scope="col">Hari</th>

                                                    <th scope="col">Jam</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php $i = 1; ?>

                                                <?php foreach ($jadwal as $j) : ?>

                                                    <tr>

                                                        <th scope="row"><?= $i++ ?></th>

                                                        <td><?= $j['nama_murid'] ?></td>

                                                        <td><?= $j['hari'] ?></td>

                                                        <td><?= $j['jam'] ?></td>

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
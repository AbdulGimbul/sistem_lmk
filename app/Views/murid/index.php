<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>



<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col-6">

                    <h1 class="mt-2 mb-2 text-bold">Daftar Murid</h1>

                    <?php if (session()->getFlashdata('pesan')) : ?>

                        <div class="alert alert-success" role="alert">

                            <?= session()->getFlashdata('pesan'); ?>

                        </div>

                    <?php endif; ?>

                    <!-- <form action="" method="post">

                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="Cari.." name="cari">

                            <button class="btn btn-outline-secondary" type="submit" id="submit" name="submit">Cari</button>

                        </div>

                    </form> -->

                </div>

            </div>

            <div class="row">

                <div class="col">

                    <table id="example1" class="table table-bordered">

                        <thead>

                            <tr>

                                <th scope="col">#</th>

                                <th scope="col">Nama</th>

                                <th scope="col">Jenis Kelamin</th>

                                <th scope="col">Alamat</th>

                                <th scope="col">Status</th>

                                <th scope="col">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $i = 1; ?>

                            <?php foreach ($murid as $m) : ?>

                                <?php

                                $db = \Config\Database::connect();

                                if (isset($m['id_murid'])) {

                                    $cek = $db->query("SELECT * FROM tbl_jadwal WHERE id_murid = '" . $m['id_murid'] . "'")->getRowArray();
                                    if ($cek['status'] == 0) {

                                        echo "<tr bgcolor='yellow'>";
                                    } elseif ($cek['status'] == 2) {

                                        echo "<tr bgcolor='red'>";
                                    } else {

                                        echo "<tr>";
                                    }
                                }

                                ?>

                                <th scope="row"><?= $i++ ?></th>

                                <td><?= $m['nama']; ?></td>

                                <td><?= $m['jk']; ?></td>

                                <td><?= $m['alamat']; ?></td>

                                <td>
                                    <?php
                                    switch ($cek['status']) {
                                        case 0:
                                            echo 'Menunggu';
                                            break;
                                        case 1:
                                            echo 'Disetujui';
                                            break;
                                        case 2:
                                            echo 'Ditolak';
                                            break;
                                        default:
                                            'Terjadi kesalahan';
                                            break;
                                    }
                                    ?></td>

                                <td>

                                    <a href="<?= base_url('/murid/' . $m['id_murid']) ?>" class="btn btn-success">Detail</a>

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



<?= $this->endSection(); ?>
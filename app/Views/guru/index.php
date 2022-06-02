<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>



<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col">

                    <h1 class="mt-2 mb-3 text-bold">Daftar Guru</h1>

                    <a href="<?= base_url('guru/create') ?>" class="btn btn-primary mb-3">Tambah Data Guru</a>

                    <?php if (session()->getFlashdata('pesan')) : ?>

                        <div class="alert alert-success" role="alert">

                            <?= session()->getFlashdata('pesan'); ?>

                        </div>

                    <?php endif; ?>

                    <table id="example1" class="table table-bordered">

                        <thead>

                            <tr>

                                <th scope="col">#</th>

                                <th scope="col">Avatar</th>

                                <th scope="col">Nama</th>

                                <th scope="col">Alamat</th>

                                <th scope="col">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $i = 1; ?>

                            <?php foreach ($guru as $g) : ?>

                                <tr>

                                    <th scope="row"><?= $i++ ?></th>

                                    <td><img src="<?= $g['avatar']; ?>" class="avatar" alt=""></td>

                                    <td><?= $g['nama']; ?></td>

                                    <td><?= $g['alamat']; ?></td>

                                    <td>

                                        <a href="<?= base_url('/guru/' . $g['id_guru']) ?>" class="btn btn-success">Detail</a>

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

<?php $this->endSection() ?>
<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2 mb-3">Jadwal Les Mengaji Kuningan</h1>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah">Tambah Jadwal</a>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Murid</th>
                                <th scope="col">Guru Pengajar</th>
                                <th scope="col">Alamat Murid</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Aksi</th>

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
                                    <td>
                                        <a href="" class="btn btn-info tampilModalUbah" data-toggle="modal" data-target="#modal-default" data-id="<?= $j['id_jadwal'] ?>">Edit</a>
                                        <a href="<?= base_url('/jadwal/delete/' . $j['id_jadwal']) ?>" class=" btn btn-danger">Hapus</a>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('/jadwal/update') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama Murid</label>
                        <input class="form-control" type="text" name="nama" id="nama" disabled>
                    </div>

                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" name="hari" id="hari">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pukul">Pukul</label>
                        <select class="form-control" name="jam" id="jam">
                            <option value="08.00">08.00</option>
                            <option value="09.00">09.00</option>
                            <option value="10.00">10.00</option>
                            <option value="11.00">11.00</option>
                            <option value="13.00">13.00</option>
                            <option value="14.00">14.00</option>
                            <option value="15.00">15.00</option>
                            <option value="16.00">16.00</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('/jadwal/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama">Nama Murid</label>
                        <select class="form-control" name="murid" id="murid">
                            <?php foreach ($murid as $m) : ?>
                                <option value="<?= $m['id_murid']; ?>" selected><?= $m['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Guru</label>
                        <select class="form-control" name="guru" id="guru">
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['id_guru']; ?>" selected><?= $g['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" name="hari" id="hari">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pukul">Pukul</label>
                        <select class="form-control" name="jam" id="jam">
                            <option value="08.00">08.00</option>
                            <option value="09.00">09.00</option>
                            <option value="10.00">10.00</option>
                            <option value="11.00">11.00</option>
                            <option value="13.00">13.00</option>
                            <option value="14.00">14.00</option>
                            <option value="15.00">15.00</option>
                            <option value="16.00">16.00</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php $this->endSection() ?>
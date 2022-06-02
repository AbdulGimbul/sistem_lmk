<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 login-sec">
                        <div class="login-sec-bg">
                            <h2 class="text-center">Form Pemilihan Guru Ngaji</h2>
                            <form action="<?= base_url('daftar/savebyadmin') ?>" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body">
                                        <fieldset class="form-input">
                                            <label for="jadwal">
                                                <h4 class="fs-title">Pilih Guru</h4>
                                            </label>
                                            <div class="form-group input-group">
                                                <input type="hidden" name="id_guru" id="id_guru">
                                                <div class="col-10">
                                                    <input type="text" id="guru" class="form-control required" autofocus readonly>
                                                </div>
                                                <div class="col-2">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-flat" id="inputjadwal" data-toggle="modal" data-target="#modal-guru">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h4 class="fs-title">Unggah Foto Murid:</h4>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="<?= base_url('assets/img/default.png') ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-10">
                                                    <input type="file" class="form-control  <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto') ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                        <?php extract($_POST); ?>

                                        <input type="hidden" name="user_ortu" value="<?= $user_ortu ?>">
                                        <input type="hidden" name="nama" value="<?= $nama ?>">
                                        <input type="hidden" name="jk" value="<?= $jk ?>">
                                        <input type="hidden" name="tempat_lahir" value="<?= $tempat_lahir ?>">
                                        <input type="hidden" name="tgl_lahir" value="<?= $tgl_lahir ?>">
                                        <input type="hidden" name="alamat" value="<?= $alamat ?>">
                                        <input type="hidden" name="asal_sekolah" value="<?= $asal_sekolah ?>">
                                        <input type="hidden" name="kelas" value="<?= $kelas ?>">
                                        <input type="hidden" name="harisave" value="<?= htmlspecialchars(serialize($hari)) ?>">
                                        <input type="hidden" name="jamsave" value="<?= htmlspecialchars(serialize($jam)) ?>">

                                        <button type="submit" class="btn btn-success float-right mt-3">Daftar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-guru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <b>
                                    <p>Berikut adalah guru yang direkomendasikan oleh sistem:</p>
                                </b>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;">#</th>
                                            <th scope="col" style="text-align: center;">Avatar</th>
                                            <th scope="col" style="text-align: center;">Nama</th>
                                            <th scope="col" style="text-align: center;">Alamat</th>
                                            <th scope="col" style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n = 1 ?>
                                        <?php foreach ($guru as $g) : ?>
                                            <?php
                                            $db = \Config\Database::connect();
                                            $j = $db->query("SELECT * FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "'")->getNumRows();

                                            extract($_POST);

                                            $totalhari = count($hari);
                                            $cek = 0;
                                            for ($i = 0; $i < $totalhari; $i++) {
                                                $cekJadwal = $db->query("SELECT * FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "' AND hari = '" . $hari[$i] . "' AND jam = '" . $jam[$i] . "'")->getNumRows();
                                                if ($cekJadwal != 0) {
                                                    $cek++;
                                                }
                                            }

                                            ?>

                                            <?php if ($cek == 0) : ?>
                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                    <th scope="row"><button type="button" class="btn btn-primary p-0">
                                                            <i class="expandable-table-caret fas fa-calendar-week fa-fw"></i>
                                                        </button> &nbsp; <?= $n++ ?></th>
                                                    <td><img src="<?= $g['avatar'] ?>" class="avatar" alt=""></td>
                                                    <td><?= $g['nama'] ?></td>
                                                    <td><?= $g['alamat'] ?></td>
                                                    <td><button class="btn btn-success" id="select" data-id="<?= $g['id_guru'] ?>" data-name="<?= $g['nama'] ?>"><i class="fa fa-check"></i>&nbsp;Pilih</button></td>
                                                </tr>
                                                <tr class="expandable-body">
                                                    <td colspan="4">
                                                        <div class="p-0">
                                                            <table class="table table-bordered table-hover">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6">
                                                                            <center>
                                                                                <b>Jadwal Mengajar Saat Ini </b>
                                                                            </center>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Senin</td>
                                                                        <td>Selasa</td>
                                                                        <td>Rabu</td>
                                                                        <td>Kamis</td>
                                                                        <td>Jumat</td>
                                                                        <td>Sabtu</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php
                                                                        if ($j != 0) {
                                                                            $hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                                                                            for ($i = 0; $i < 6; $i++) {
                                                                                $jadwal =  $db->query("SELECT * FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "' and hari = '" . $hari[$i] . "'")->getNumRows();
                                                                                if ($jadwal != 0) {
                                                                                    $cek_jam = $db->query("SELECT * FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "' and hari = '" . $hari[$i] . "'")->getResultArray();
                                                                                    echo "<td>";
                                                                                    foreach ($cek_jam as $cj) {
                                                                                        echo $cj['jam'] . " - " . date("H:i", strtotime($cj['jam']) + 60 * 60) . "<br>";
                                                                                    }
                                                                                    echo "</td>";
                                                                                } else {
                                                                                    echo "<td> </td>";
                                                                                }
                                                                            }
                                                                        } ?>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    function hideTable() {
        var x = document.getElementById("myGuru");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>


<?php $this->endSection() ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <center>Daftar Berhasil!</center>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p style="text-align: justify;">Data anda akan segera divalidasi, Silahkan tunggu 1x24 jam. Jika sudah tervalidasi, maka jadwal akan muncul secara otomatis.<br>Silahkan tekan tombol Kembali (<i class="fas fa-arrow-left"></i>)</p>
                        <footer class="blockquote-footer">Selamat bergabung di <cite title="Source Title">LMK</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
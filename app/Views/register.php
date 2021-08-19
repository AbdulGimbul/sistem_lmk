<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/themes/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/themes/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">

    <?php
    $nik = [
        'placeholder' => 'Masukkan NIK',
        'type' => 'number',
        'name' => 'nik',
        'id' => 'nik',
        'class' => 'form-control'
    ];

    $nama = [
        'placeholder' => 'Masukkan nama lengkap',
        'name' => 'nama',
        'id' => 'nama',
        'class' => 'form-control'
    ];

    $alamat = [
        'placeholder' => 'Masukkan alamat lengkap',
        'name' => 'alamat',
        'id' => 'alamat',
        'class' => 'form-control'
    ];

    $username = [
        'placeholder' => 'Masukkan nama username',
        'name' => 'username',
        'id' => 'usename',
        'value' => null,
        'class' => 'form-control'
    ];

    $password = [
        'placeholder' => 'Masukkan password',
        'type' => 'password',
        'name' => 'password',
        'id' => 'password',
        'class' => 'form-control'
    ];

    $repeatPassword = [
        'placeholder' => 'Ulangi masukkan password',
        'type' => 'password',
        'name' => 'repeatPassword',
        'id' => 'repeatPassword',
        'class' => 'form-control'
    ];

    $session = session();
    $errors = $session->getFlashdata('errors');
    ?>

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url('assets/themes/index2.html') ?>" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <?php if ($errors != null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Terjadi Kesalahan</h4>
                        <hr>
                        <p class="mb-0">
                            <?php
                            foreach ($errors as $err) {
                                echo $err . '<br>';
                            }
                            ?>
                        </p>
                    </div>
                <?php endif ?>

                <?= form_open('Auth/register') ?>

                <div class="input-group mb-3">
                    <?= form_input($nik) ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <?= form_input($nama) ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label">Jenis Kelamin:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" checked>
                            <label class="form-check-label" for="laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan">
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                </fieldset>

                <div class="input-group mb-3">
                    <?= form_input($alamat) ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <?= form_input($username) ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <?= form_input($password) ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <?= form_input($repeatPassword) ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <?= form_submit('submit', 'Sign Up', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= form_close() ?>

                <a href="<?= base_url('/auth/login') ?>" class="text-center">I already have a membership</a>

                <!-- /.form-box -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.register-box -->
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/themes/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/themes/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/themes/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>
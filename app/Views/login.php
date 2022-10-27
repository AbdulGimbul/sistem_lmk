<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login LMK</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?= base_url('assets/themes/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- icheck bootstrap -->

    <link rel="stylesheet" href="<?= base_url('assets/themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?= base_url('assets/themes/dist/css/adminlte.min.css') ?>">

</head>



<body class="hold-transition login-page">

    <?php
    $session = session();
    ?>

    <div class="login-box">

        <!-- /.login-logo -->

        <div class="card card-outline card-primary">

            <div class="card-header text-center">

                <h1><b>LMK</b></h1>

            </div>

            <div class="card-body">

                <p class="login-box-msg">Selamat Datang, <br> Silahkan Masuk!</p>


                <?= form_open('Auth/login') ?>

                <div class="form-group">

                    <?= form_label("Username", "username") ?>

                    <input type="text" name="username" id="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" autofocus>

                    <?php
                    if ($session->getFlashdata('user')) { ?>
                        <div class="text-danger" role="alert">
                            <?= $session->getFlashdata('user') ?>
                        </div>
                    <?php } ?>

                    <div class="invalid-feedback">

                        <?= $validation->getError('username') ?>

                    </div>
                </div>



                <div class="form-group">

                    <?= form_label("Password", "password") ?>

                    <input type="password" name="password" id="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" value="<?= old('password') ?>" autofocus>

                    <?php
                    if ($session->getFlashdata('pwd')) { ?>
                        <div class="text-danger" role="alert">
                            <?= $session->getFlashdata('pwd') ?>
                        </div>
                    <?php } ?>

                    <div class="invalid-feedback">

                        <?= $validation->getError('password') ?>

                    </div>

                </div>


                <div class="text-right">

                    <?= form_submit('submit', 'Login', ['class' => 'btn btn-primary']) ?>

                </div>



                <?= form_close() ?>



                <p class="mb-0">

                    <a href="<?= base_url('/auth/register') ?>" class="text-center">Mendaftar Akun Baru</a>

                </p>

            </div>

            <!-- /.card-body -->

        </div>

        <!-- /.card -->

    </div>

    <!-- /.login-box -->



    <!-- jQuery -->

    <script src="<?= base_url('assets/themes/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap 4 -->

    <script src="<?= base_url('assets/themes/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- AdminLTE App -->

    <script src="<?= base_url('assets/themes/dist/js/adminlte.min.js') ?>"></script>

</body>



</html>
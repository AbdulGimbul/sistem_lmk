<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

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
    $username = [
        'name' => 'username',
        'id' => 'usename',
        'value' => null,
        'class' => 'form-control'
    ];

    $password = [
        'name' => 'password',
        'id' => 'password',
        'class' => 'form-control'
    ];

    $repeatPassword = [
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
                <div class="form-group">
                    <?= form_label("Username", "username") ?>
                    <?= form_input($username) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Password", "password") ?>
                    <?= form_input($password) ?>
                </div>


                <div class="form-group">
                    <?= form_label("Repeat Password", "repeatPassword") ?>
                    <?= form_input($repeatPassword) ?>
                </div>

                <div class="text-right">
                    <?= form_submit('submit', 'Sign Up', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= form_close() ?>

            </div>

            <a href="<?= base_url('/auth/login') ?>" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/themes/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/themes/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/themes/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LMK - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/themes/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/themes/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <?php
    $username = [
        'name' => 'username',
        'id' => 'username',
        'value' => null,
        'class' => 'form-control'
    ];

    $password = [
        'name' => 'password',
        'id' => 'password',
        'class' => 'form-control'
    ];

    $session = session();
    $errors = $session->getFlashdata('errors');
    ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4">Login</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php if ($errors != null) : ?>
                                                <div class="alert alert-danger">
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

                                            <?= form_open('Auth/login') ?>
                                            <div class="form-group">
                                                <?= form_label("Username", "username") ?>
                                                <?= form_input($username) ?>
                                            </div>

                                            <div class="form-group">
                                                <?= form_label("Password", "password") ?>
                                                <?= form_input($password) ?>
                                            </div>

                                            <div class="text-right">
                                                <?= form_submit('submit', 'Login', ['class' => 'btn btn-primary']) ?>
                                            </div>

                                            <?= form_close() ?>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="small"><a href="<?= site_url('auth/register') ?>">Need an account? Sign up!</a></div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/themes/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/themes/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

</body>

</html>
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


    <div class="register-box">

        <div class="card card-outline card-primary">

            <div class="card-header text-center">

                <a href="<?= base_url('assets/themes/index2.html') ?>" class="h1"><b>Daftar Akun</b></a>

            </div>

            <div class="card-body">

                <p class="login-box-msg">Isi Form Pendaftaran</p>



                <?= form_open('Auth/register') ?>


                <div class="input-group mb-3">

                    <input type="text" name="nama" id="nama" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>" autofocus>
                    <div class="invalid-feedback">

                        <?= $validation->getError('nama') ?>

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

                    <input type="text" name="alamat" id="alamat" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>" placeholder="Masukkan alamat lengkap" value="<?= old('alamat') ?>">

                    <div class="invalid-feedback">

                        <?= $validation->getError('alamat') ?>

                    </div>
                </div>



                <div class="input-group mb-3">

                    <input type='tel' name="no_hp" id="no_hp" class="form-control <?= $validation->hasError('no_hp') ? 'is-invalid' : '' ?>" maxlength="14" onkeypress="return onlyNumberKey(event)" placeholder="Masukkan nomor HP/WA" value="<?= old('no_hp') ?>">

                    <div class="invalid-feedback">

                        <?= $validation->getError('no_hp') ?>

                    </div>

                </div>



                <div class="input-group mb-3">

                    <input type="text" name="username" id="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukkan nama username" value="<?= old('username') ?>">

                    <div class="invalid-feedback">

                        <?= $validation->getError('username') ?>

                    </div>

                </div>



                <div class="input-group mb-3">

                    <input type="password" name="password" id="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Masukkan password" value="<?= old('password') ?>">

                    <div class="invalid-feedback">

                        <?= $validation->getError('password') ?>

                    </div>


                </div>



                <div class="input-group mb-3">

                    <input type="password" name="repeatPassword" id="repeatPassword" class="form-control <?= $validation->hasError('repeatPassword') ? 'is-invalid' : '' ?>" placeholder="Ulangi masukkan password" value="<?= old('repeatPassword') ?>">

                    <div class="invalid-feedback">

                        <?= $validation->getError('repeatPassword') ?>

                    </div>


                </div>



                <div class="text-right">

                    <?= form_submit('submit', 'Daftar', ['class' => 'btn btn-primary']) ?>

                </div>

                <?= form_close() ?>



                <a href="<?= base_url('/auth/login') ?>" class="text-center">Saya Sudah Punya Akun</a>



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

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

</body>



</html>
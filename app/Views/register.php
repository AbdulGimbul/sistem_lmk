<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                </div>
                <div class="card-body">
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
                <div class="card-footer text-center">
                    <div class="small"><a href="<?= site_url('auth/login') ?>">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
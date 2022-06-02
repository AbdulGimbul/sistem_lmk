<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col">

                    <section class="content">

                        <div class="container-fluid">

                            <div class="block-header">

                                <h2>

                                    DETAIL USER PROFILE

                                </h2>

                            </div>

                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <div class="card">

                                        <div class="header">

                                            <!-- <h2><a href="">

                                                    <button class="btn-link btn-sm" style="background-color: red; color: white; font-size: 12px; text-align: center;">

                                                        <h9>

                                                            <- Kembali</h9>

                                                    </button></a>

                                            </h2> -->

                                        </div>

                                        <div class="body">

                                            <div class="row">

                                                <div class="col-sm-3 mt-3">
                                                    <?php
                                                    $session = session();
                                                    $errors = $session->getFlashdata('errors');
                                                    ?>



                                                    <!--left col-->

                                                    <div class="text-center ml-3">

                                                        <form action="<?= base_url('user/updateFoto/' . $user->id_user) ?>" method="post" enctype="multipart/form-data">

                                                            <img src="<?= $user->avatar ?>" class="avatar img-circle img-thumbnail" alt="avatar">

                                                            <h6>Update Foto</h6>

                                                            <input type="file" id="foto" name="foto" class="text-center center-block file-upload"> <br>

                                                            <button type="submit" class="btn-sm btn-link form-control" style="background-color: #607D8B; color: white; font-size: 12px; text-align: center;">Simpan</button>

                                                        </form>

                                                        <h4>Akun User</h4>

                                                    </div>

                                                    </hr><br>

                                                </div>

                                                <!--/col-3-->

                                                <div class="col-sm-9 mt-3">
                                                    <?php if ($errors != null) : ?>
                                                        <div class="col-11">
                                                            <div class="alert alert-danger" role="alert">
                                                                <p class="mb-0" style="text-align: center;">
                                                                    <?php
                                                                    foreach ($errors as $err) {
                                                                        echo $err . '<br>';
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>

                                                    <?php if ($session->getFlashdata('berhasil')) : ?>
                                                        <div class="col-11">
                                                            <div class="alert alert-success" role="alert">
                                                                <p class="mb-0" style="text-align: center;">
                                                                    <?= $session->getFlashdata('berhasil') ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>

                                                    <ul class="nav nav-tabs">

                                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Informasi User</a></li>

                                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages">Update Data User</a></li>

                                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Ganti Password</a></li>

                                                    </ul>





                                                    <div class="tab-content mr-5">

                                                        <div class="tab-pane active" id="home">

                                                            <hr>

                                                            <form class="form" action="##" method="post" id="registrationForm">

                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="last_name">

                                                                            <h4>Nama Lengkap</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $user->nama ?>" title="enter your last name if any." readonly="">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="email">

                                                                            <h4>Username</h4>

                                                                        </label>

                                                                        <input type="email" class="form-control" name="email" id="email" value="<?= $user->username ?>" title="enter your email." readonly="">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="phone">

                                                                            <h4>Jenis Kelamin</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $user->jk ?>" title="enter your phone number if any." readonly="">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="mobile">

                                                                            <h4>Alamat</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $user->alamat ?>" title="enter your mobile number if any." readonly="">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="mobile">

                                                                            <h4>Nomor HP</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $user->nohp ?>" title="enter your mobile number if any." readonly="">

                                                                    </div>

                                                                </div>



                                                            </form>



                                                            <hr>



                                                        </div>

                                                        <!--/tab-pane-->

                                                        <div class="tab-pane" id="messages">



                                                            <h2></h2>



                                                            <hr>

                                                            <form class="form" action="<?= base_url('user/update/' . $user->id_user) ?>" method="post" id="registrationForm">

                                                                <input type="hidden" name="id_user" value="<?= $user->id_user ?>">

                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="last_name">

                                                                            <h4>Nama Lengkap</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= (old('nama')) ? old('nama') : $user->nama ?>" title="enter your last name if any.">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="email">

                                                                            <h4>Username</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="username" id="username" value="<?= (old('username')) ? old('username') : $user->username ?>" title="enter your email.">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="phone">

                                                                            <h4>Jenis Kelamin</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="jk" id="jk" value="<?= $user->jk ?>" title="enter your phone number if any.">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="mobile">

                                                                            <h4>Alamat</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= (old('alamat')) ? old('alamat') : $user->alamat ?>" title="enter your mobile number if any.">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="mobile">

                                                                            <h4>Nomor HP</h4>

                                                                        </label>

                                                                        <input type="text" class="form-control" name="nohp" id="nohp" value="<?= (old('nohp')) ? old('nohp') : $user->nohp ?>" title="enter your mobile number if any.">

                                                                    </div>

                                                                </div>



                                                                <div class="form-group">

                                                                    <div class="col-xs-12">

                                                                        <br>

                                                                        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update Data</button>

                                                                    </div>

                                                                </div>

                                                            </form>



                                                        </div>

                                                        <!--/tab-pane-->

                                                        <div class="tab-pane" id="settings">

                                                            <hr>

                                                            <form class="form" action="<?= base_url('user/updatepassword') ?>" method="post" id="registrationForm">

                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="password">

                                                                            <h4>Password Lama</h4>

                                                                        </label>

                                                                        <input type="password" class="form-control <?= $validation->hasError('current_password') ? 'is-invalid' : '' ?>" name="current_password" id="current_password" placeholder="Masukkan password">
                                                                        <div class="invalid-feedback">

                                                                            <?= $validation->getError('current_password') ?>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group">

                                                                    <div class="col-xs-6">

                                                                        <label for="last_name">

                                                                            <h4>Password Baru</h4>

                                                                        </label>

                                                                        <input type="password" class="form-control <?= $validation->hasError('new_password1') ? 'is-invalid' : '' ?>" name="new_password1" id="new_password1" placeholder="Masukkan password baru">
                                                                        <div class="invalid-feedback">

                                                                            <?= $validation->getError('new_password1') ?>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group">

                                                                    <div class="col-xs-12">

                                                                        <label>

                                                                            <h4>Konfirmasi Password Baru</h4>

                                                                        </label>

                                                                        <input type="password" class="form-control <?= $validation->hasError('new_password2') ? 'is-invalid' : '' ?>" name="new_password2" id="new_password2" placeholder="Masukkan ulang password baru">
                                                                        <div class="invalid-feedback">

                                                                            <?= $validation->getError('new_password2') ?>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group">

                                                                    <div class="col-xs-12">

                                                                        <br>

                                                                        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>

                                                                        <button class="btn" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>


                                                                    </div>

                                                                </div>

                                                            </form>

                                                        </div>



                                                    </div>

                                                    <!--/tab-pane-->

                                                </div>

                                                <!--/tab-content-->

                                            </div>

                                            <!--/col-9-->

                                        </div>

                                        <!--/row-->

                                    </div>

                                </div>

                            </div>
                        </div>

                    </section>

                </div>

            </div>

        </div>

    </div>

</div>



<?= $this->endSection() ?>
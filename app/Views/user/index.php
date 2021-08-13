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
                                    DETAIL USER
                                </h2>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2><a href="<?= base_url('/home') ?>">
                                                    <button class="btn-link btn-sm" style="background-color: red; color: white; font-size: 12px; text-align: center;">
                                                        <h9>
                                                            <- Kembali</h9>
                                                    </button></a>
                                            </h2>

                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <!--left col-->

                                                        <div class="text-center">
                                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                                            <h6>update foto terbaru...</h6>
                                                            <input type="file" class="text-center center-block file-upload"> <br>
                                                            <button class="btn-sm btn-link form-control" style="background-color: #607D8B; color: white; font-size: 12px; text-align: center;">Simpan</button>
                                                            <h4>Akun User</h4>
                                                        </div>
                                                        </hr><br>

                                                    </div>
                                                    <!--/col-3-->
                                                    <div class="col-sm-9">
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Informasi Karyawan</a></li>
                                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages">Update Data Karyawan</a></li>
                                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Ganti Password</a></li>
                                                        </ul>


                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="home">
                                                                <hr>
                                                                <form class="form" action="##" method="post" id="registrationForm">
                                                                    <div class="form-group">
                                                                        <div class="col-xs-6">
                                                                            <label for="first_name">
                                                                                <h4>NIK</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $user['nik'] ?>" title="enter your first name if any." readonly="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="last_name">
                                                                                <h4>Nama Lengkap</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $user['nama'] ?>" title="enter your last name if any." readonly="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="phone">
                                                                                <h4>Jenis Kelamin</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['jk'] ?>" title="enter your phone number if any." readonly="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="col-xs-6">
                                                                            <label for="mobile">
                                                                                <h4>Alamat</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $user['alamat'] ?>" title="enter your mobile number if any." readonly="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="email">
                                                                                <h4>Username</h4>
                                                                            </label>
                                                                            <input type="email" class="form-control" name="email" id="email" value="<?= $user['username'] ?>" title="enter your email." readonly="">
                                                                        </div>
                                                                    </div>

                                                                </form>

                                                                <hr>

                                                            </div>
                                                            <!--/tab-pane-->
                                                            <div class="tab-pane" id="messages">

                                                                <h2></h2>

                                                                <hr>
                                                                <form class="form" action="##" method="post" id="registrationForm">
                                                                    <div class="form-group">
                                                                        <div class="col-xs-6">
                                                                            <label for="first_name">
                                                                                <h4>NIK</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="32090000100310" title="enter your first name if any.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="last_name">
                                                                                <h4>Nama Lengkap</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Fery Faturahman" title="enter your last name if any.">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="phone">
                                                                                <h4>Jenis Kelamin</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Laki-Laki" title="enter your phone number if any.">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="col-xs-6">
                                                                            <label for="mobile">
                                                                                <h4>Alamat</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Jl.sindangsari, no 85" title="enter your mobile number if any.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="email">
                                                                                <h4>Username</h4>
                                                                            </label>
                                                                            <input type="email" class="form-control" name="email" id="email" placeholder="manis" title="enter your email.">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="password">
                                                                                <h4>Password</h4>
                                                                            </label>
                                                                            <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="password2">
                                                                                <h4>Konfirmasi Password</h4>
                                                                            </label>
                                                                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" title="enter your password2.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <br>
                                                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                            <!--/tab-pane-->
                                                            <div class="tab-pane" id="settings">


                                                                <hr>
                                                                <form class="form" action="##" method="post" id="registrationForm">
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="first_name">
                                                                                <h4>Password Baru</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="masukkan password baru" title="enter your first name if any.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-xs-6">
                                                                            <label for="last_name">
                                                                                <h4>Konfirmasi Password Baru</h4>
                                                                            </label>
                                                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="masukkan konfirmasi password baru" title="enter your last name if any.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <label>
                                                                                <h4>Password</h4>
                                                                            </label>
                                                                            <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <br>
                                                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
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
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
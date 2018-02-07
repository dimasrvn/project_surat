<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title> Login </title>
        <?php echo $head ?>
    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="#" class="logo-name text-lg text-center">Sistem Informasi Surat</a>
                      					<img src="<?php echo base_url()."assets/"?>images/Jasa_Marga_logo.png" class="img-responsive" width="300px" alt="">
                                <p class="text-center m-t-md">Masuk dengan akun Anda</p>

                                <?php
                                if($this->session->flashdata('pesan')){
                                $pesan = $this->session->flashdata('pesan');
                                  if ($pesan == 'gagal'){
                                    echo '<div class="alert alert-danger text-center" role="alert">';
                                    echo 'Email dan Password tidak cocok';
                                    echo '</div>';
                                  }
                                }
                                ?>
                                </div>

                                <form class="m-t-md" method="POST" action="<?php echo base_url()?>index.php/login/proses">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                    <!--<a href="<?php //echo base_url()?>index.php/login/forgot" class="display-block text-center m-t-md text-sm">Forgot Password?</a>-->
                                </form>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->


        <!-- Javascripts -->
        <?php echo $load_js ?>

    </body>
</html>

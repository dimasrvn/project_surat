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
                                <a href="index.html" class="logo-name text-lg text-center">Surat</a>
                                <p class="text-center m-t-md">Lupa Password</p>
                                <p class="text-center text-success m-t-md">Masukan email Anda, kami akan kirimkan password baru</p>
                                <div class="alert alert-danger text-center" role="alert">
                                    email tidak ditemukan
                                </div>

                                <form class="m-t-md" action="<?php echo base_url()?>index.php/login/proses_forgot">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" >
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Kirimkan email</button>
                                </form>
                                <a href="<?php echo base_url()?>index.php/login"><p class="text-left m-t-md"><i class="fa fa-angle-left"></i> Kembali</p></a>
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

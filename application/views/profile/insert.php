<!DOCTYPE html>
<html>
  <head>
    <title>Tambah User</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Profile</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/profile">Profile</a></li>
              <li class="active">Tambah User</li>
              </ol>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <a type="submit" class="btn btn-default btn-addon m-b-sm" href='<?php echo base_url()."index.php/profile/" ?>'><i class="fa fa-angle-left"></i> Kembali</a>
              </div>
            </div>
          </div>
          <!-- End of Navigation -->

          <div id="main-wrapper">
            <div class="row">
            <div class="col-md-8">
            <div class="panel panel-white">
            <div class="panel-body">

              <div class="card-content">

                  <form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/profile/do_insert"?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" name="nama" id="nama" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="level" required>
                                  <option >-- Pilih Jabatan --</option>
                                  <option value="sekertaris">Sekertaris</option>
                                  <option value="dirut">Direktur Utama</option>
                                  <option value="dirtek">Direktur Teknik</option>
                                  <option value="dirkeu">Direktur Keuangan</option>
                                  <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                <span id='message'></span>
                            </div>
                        </div>



                      <hr>

                      <button type="submit" id="submit" class="btn btn-info pull-right" >Tambahkan</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
            </div>

            </div>
            </div>
            </div>
            </div>
          </div>
        <?php echo $footer ?>
      </div><!-- Page Inner -->
    </main><!-- Page Content -->
    <?php echo $load_js ?>
    <script>
      $('#confirm_password').on('keyup', function () {
          if ($(this).val() == $('#password').val()) {
              $('#message').html('<i class="fa fa-check"></i> password cocok').css('color', 'green');
              $('#submit').attr('disabled', false);
          } else {
              $('#message').html('<i class="fa fa-ban"></i> password tidak cocok').css('color', 'red');
              $('#submit').attr('disabled', true);
          }
      });
    </script>
  </body>





</html>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Profile</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Edit Profile - <b><?php echo $nama ?></h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/profile">Profile</a></li>
              <li class="active">Edit Profile - <b><?php echo $nama ?></b></li>
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

                  <form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/profile/do_update/".$id.""?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="level" required>
                                  <option >-- Pilih Jabatan --</option>
                                  <option <?php if(isset($level)){if($level=='sekertaris'){echo "selected";}}?> value="sekertaris">Sekertaris</option>
                                  <option <?php if(isset($level)){if($level=='dirut'){echo "selected";}}?> value="dirut">Direktur Utama</option>
                                  <option <?php if(isset($level)){if($level=='dirtek'){echo "selected";}}?> value="dirtek">Direktur Teknik</option>
                                  <option <?php if(isset($level)){if($level=='dirkeu'){echo "selected";}}?> value="dirkeu">Direktur Keuangan</option>
                                  <option <?php if(isset($level)){if($level=='umum'){echo "selected";}}?> value="umum">Umum</option>
                                </select>
                            </div>
                        </div>


                      <hr>

                      <a href="<?php echo base_url()."index.php/profile/ubah_pass/".$id?>" class="btn btn-warning pull-left"><i class="fa fa-key"></i> Ganti Password</a>
                      <button type="submit" id="submit" class="btn btn-info pull-right" ><i class="fa fa-pencil m-r-xs"></i> Update</button>
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
  </body>




</html>

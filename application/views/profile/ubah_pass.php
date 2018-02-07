<!DOCTYPE html>
<html>
  <head>
    <title>Ganti Password User</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Ganti Password User</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/profile">Profile</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/profile/update/<?php echo $id; ?>">Edit Profile</a></li>
              <li class="active">Ganti Password User</li>
              </ol>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <a type="submit" class="btn btn-default btn-addon m-b-sm" href='<?php echo base_url()."index.php/profile/update/".$id."" ?>'><i class="fa fa-angle-left"></i> Kembali</a>
              </div>
              <?php
              if($this->session->flashdata('pesan')){
                $pesan = $this->session->flashdata('pesan');
                if($pesan == 'gagal'){
                  ?>
                  <div class="col-md-5">
                  <div class="panel panel-red ui-sortable-handle">
                      <div class="panel-heading">
                          <h3 class="panel-title" style="color:white;"><i class="fa fa-ban"></i> Password lama tidak cocok</h3>
                          <div class="panel-control">
                              <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-remove" data-original-title="Remove"><i class="icon-close"></i></a>
                          </div>
                      </div>
                  </div>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
          </div>
          <!-- End of Navigation -->

          <div id="main-wrapper">
            <div class="row">
            <div class="col-md-6">
            <div class="panel panel-white">
            <div class="panel-body">

              <div class="card-content">

                  <form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/profile/do_ubah_pass/".$id?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password lama</label>
                            <div class="col-sm-6">
                                <input type="password" name="lama" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="baru" required>
                            </div>
                        </div>

                      <hr>

                      <button type="submit" id="submit" class="btn btn-info pull-right" >Ganti Password</button>
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

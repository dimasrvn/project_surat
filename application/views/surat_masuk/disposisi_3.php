<!DOCTYPE html>
<html>
  <head>
    <title>Disposisi Surat Masuk</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Disposisi Surat Masuk</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/surat_masuk">Surat Masuk</a></li>
              <li class="active">Tambah Disposisi Surat Masuk Direktur Teknik</li>
              </ol>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <a type="submit" class="btn btn-default btn-addon m-b-sm" href='<?php echo base_url()."index.php/beranda/" ?>'><i class="fa fa-angle-left"></i> Kembali</a>
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
                <div id="rootwizard">
                   <ul class="nav nav-tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#tab1"><i class="fa fa-envelope m-r-xs"></i>Data Disposisi Surat</a></li>
                   </ul>


                   <div class="progress progress-sm m-t-sm">
                       <div class="progress-bar progress-bar-danger active progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                       </div>
                   </div>
                  <form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/surat_masuk/do_disposisi_3/".$id.""?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Isi Disposisi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="disdirtek" required><?php echo $disdirtek ?></textarea>
                            </div>
                        </div>
                      </div>

                      <hr>

                      <button type="submit" id="submit" class="btn btn-info pull-right" ><i class="fa fa-angle-right m-r-xs"></i> Simpan</button>
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

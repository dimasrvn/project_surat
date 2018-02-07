<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Surat masuk</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Surat masuk</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/surat_masuk">Surat masuk</a></li>
              <li class="active">Tambah Surat masuk</li>
              </ol>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <a type="submit" class="btn btn-default btn-addon m-b-sm" href='<?php echo base_url()."index.php/surat_masuk/" ?>'><i class="fa fa-angle-left"></i> Kembali</a>
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
                       <li role="presentation" class="active"><a href="#tab1"><i class="fa fa-envelope m-r-xs"></i>Data Surat</a></li>
                       <li role="presentation" class="disabled"><a href="#tab2"><i class="fa fa-paperclip m-r-xs"></i>Berkas Surat</a></li>
                   </ul>


                   <div class="progress progress-sm m-t-sm">
                       <div class="progress-bar progress-bar-danger active progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                       </div>
                   </div>
                  <form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/surat_masuk/do_insert"?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nomor Surat</label>
                            <div class="col-sm-5">
                                <input type="text" name="no" id="no" class="form-control" required/>
                            </div>
                            <div class="col-sm-5">
                                <p class="help-block text-danger"><span id="no_result"</span></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Surat</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tgl_surat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Terima</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tgl_terima" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Perihal</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="perihal" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pemberi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pemberi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kepada</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kepada" required>
                            </div>
                        </div>
                      </div>

                      <hr>

                      <button type="submit" id="submit" class="btn btn-info pull-right" ><i class="fa fa-angle-right m-r-xs"></i> Selanjutnya</button>
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

  <script type="text/javascript">
      $(window).on('load',function(){
          $('#myModal').modal('show');
      });

      $(document).ready(function(){
        $('#no').change(function(){
              var no = $('#no').val();
              if(no != ''){
                   $.ajax({
                        url:"<?php echo base_url(); ?>index.php/surat_masuk/check_no_availability",
                        method:"POST",
                        data:{no:no},
                        success:function(data){
                             $('#no_result').html(data);
                             var s1 = document.getElementById('no_result').innerHTML;
                             if( s1 == "No Surat telah digunakan") {
                                 alert("Nomor surat telah digunakan, silahkan gannti nomor surat");
                                 $('#submit').attr('disabled', true);
                             }else{
                                $('#submit').attr('disabled', false);
                             }
                        }
                      });
                }
            });
      });
  </script>





</html>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Surat Perintah Direksi</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Edit Surat Perintah Direksi - <b><?php echo $no ?></h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/surat_direksi">Surat Perintah Direksi</a></li>
              <li class="active">Edit Surat Perintah Direksi - <b><?php echo $no ?></b></li>
              </ol>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <a type="submit" class="btn btn-default btn-addon m-b-sm" href='<?php echo base_url()."index.php/surat_direksi/" ?>'><i class="fa fa-angle-left"></i> Kembali</a>
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
                   </ul>


                   <div class="progress progress-sm m-t-sm">
                       <div class="progress-bar progress-bar-danger active progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                       </div>
                   </div>
                  <form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/surat_direksi/do_update/".$id.""?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nomor Surat</label>
                            <div class="col-sm-5">
                                <input type="text" name="no" id="no" class="form-control" value="<?php echo $no ?>" required/>
                            </div>
                            <div class="col-sm-5">
                                <p class="help-block text-danger"><span id="no_result"</span></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tgl" value="<?php echo $tgl ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Perihal</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="perihal" required><?php echo $perihal ?></textarea>
                            </div>
                        </div>

                      </div>

                      <hr>

                      <a href="<?php echo base_url()."index.php/surat_direksi"?>" class="pull-left" style="color:gray; text-decoration:underline;"><br><i class="fa fa-angle-left"></i> Kembali ke daftar perintah direksi</a>
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

  <script type="text/javascript">
      $(window).on('load',function(){
          $('#myModal').modal('show');
      });

      $(document).ready(function(){
        $('#no').change(function(){
              var no = $('#no').val();
              if(no != ''){
                   $.ajax({
                        url:"<?php echo base_url(); ?>index.php/surat_direksi/check_no_availability",
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

<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Surat kontrak</title>
    <?php echo $head ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Surat kontrak</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li><a href="<?php echo base_url() ?>/index.php/surat_kontrak">Surat kontrak</a></li>
              <li class="active">Tambah Surat kontrak</li>
              </ol>
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
                       <li role="presentation" class="disabled"><a href="#tab1"><i class="fa fa-envelope m-r-xs"></i>Data Surat</a></li>
                       <li role="presentation" class="active"><a href="#tab2"><i class="fa fa-paperclip m-r-xs"></i>Berkas Surat</a></li>
                   </ul>


                   <div class="progress progress-sm m-t-sm">
                       <hr>
                   </div>
                   <form id='form' method="POST" action="<?php echo base_url()."index.php/surat_kontrak/"?>" enctype="multipart/form-data">
                   <div class="row">
                        <div class="col-md-8">
                            <div class="form-group label-floating">
                                <label class="control-label">Gambar Surat</label>
                                <input type="file" class="form-control" name="files" multiple id='files' >
                            </div>
                            <div id="uploaded_images"></div>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" id="submit" class="btn btn-info pull-right" ><i class="fa fa-check m-r-xs"></i> Done</button>
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
 	 $(document).ready(function(){
        $('#files').change(function(){
 		  var files = $('#files')[0].files;
 		  var error = '';
 		  var form_data = new FormData();
 		  for(var count = 0; count<files.length; count++)
 		  {
 		   var name = files[count].name;
 		   var extension = name.split('.').pop().toLowerCase();
 		   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 		   {
 		    error += "Invalid " + count + " Image File"
 		   }
 		   else
 		   {
 		    form_data.append("files[]", files[count]);
 		   }
 		  }
 		  if(error == '')
 		  {
 		   $.ajax({
 		    url:"<?php echo base_url(); ?>index.php/surat_kontrak/upload", //base_url() return http://localhost/tutorial/codeigniter/
 		    method:"POST",
 		    data:form_data,
 		    contentType:false,
 		    cache:false,
 		    processData:false,
 		    beforeSend:function()
 		    {
 		     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
 		    },
 		    success:function(data)
 		    {
 		     $('#uploaded_images').html(data);
 		     $('#files').val('');
 		    }
 		   })
 		  }
 		  else
 		  {
 		   alert(error);
 		  }
 		 });
 	});
    </script>



</html>

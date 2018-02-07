<!DOCTYPE html>
<html>
  <head>
    <title>Surat masuk</title>
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
              <li class="active">Surat masuk</li>
              </ol>
            </div>
            <br>
            <div class="row">


              <?php
                $level = $this->session->userdata('level');
                if($level == 'sekertaris'){
                  ?>
                  <div class="col-md-7">
                    <a type="submit" class="btn btn-info btn-addon m-b-md" href='<?php echo base_url()."index.php/surat_masuk/insert" ?>'><i class="fa fa-plus"></i> Tambah Surat masuk</a>
                  </div>
                  <?php
                }

              if($this->session->flashdata('pesan')){
                $pesan = $this->session->flashdata('pesan');
                if($pesan == 'sukses_tambah'){
                  ?>
                  <div class="col-md-5">
                  <div class="panel panel-green ui-sortable-handle">
                      <div class="panel-heading">
                          <h3 class="panel-title" style="color:white;"><i class="fa fa-check-square-o"></i>  Data berhasil ditambahkan</h3>
                          <div class="panel-control">
                              <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-remove" data-original-title="Remove"><i class="icon-close"></i></a>
                          </div>
                      </div>
                  </div>
                  </div>
                  <?php
                }else if($pesan == 'sukses_edit'){
                  ?>
                  <div class="col-md-5">
                  <div class="panel panel-green ui-sortable-handle">
                      <div class="panel-heading">
                          <h3 class="panel-title" style="color:white;"><i class="fa fa-check-square-o"></i>  Data berhasil diperbaharui</h3>
                          <div class="panel-control">
                              <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-remove" data-original-title="Remove"><i class="icon-close"></i></a>
                          </div>
                      </div>
                  </div>
                  </div>
                  <?php
                }else if($pesan == 'sukses_hapus'){
                ?>
                <div class="col-md-5">
                <div class="panel panel-green ui-sortable-handle">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color:white;"><i class="fa fa-check-square-o"></i>  Data berhasil terhapus</h3>
                        <div class="panel-control">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-remove" data-original-title="Remove"><i class="icon-close"></i></a>
                        </div>
                    </div>
                </div>
                </div>
                  <?php
                }
                ?>
                <?php
              }
              ?>
            </div>
          </div>
          <!-- End of Navigation -->

          <div id="main-wrapper">


            <div class="row">
            <div class="col-md-12">
            <div class="panel panel-white">
            <div class="panel-body">
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
              <thead>
                <tr>
                  <th>Nomor Surat</th>
                  <th>Tanggal Surat</th>
                  <th>Perihal</th>
                  <th>Pemberi</th>
                  <th>Kepada</th>
                  <th>Disposisi</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $i=1;
                foreach ($data as $d) {
                  ?>
                  <tr>
                    <td> <?php echo $d->no_surat ?> </td>
                    <?php
                      $day= date("d", strtotime($d->tanggal_surat) );
                      $year = date('Y', strtotime($d->tanggal_surat));
                      $month = date('F', strtotime($d->tanggal_surat));
                    ?>
                    <td> <?php echo $day.' '.$month.' '.$year ?> </td>
                    <td> <?php echo $d->perihal ?> </td>
                    <td> <?php echo $d->pemberi?> </td>
                    <td> <?php echo $d->kepada?> </td>


                    <?php
                    if($d->status == 1){
                      echo '<td><span class="label label-info">Direktur Utama </span></td>';
                    }else if($d->status == 2){
                    	if ($d->status_disposisi_1 == 1){
                    		if($d->status_disposisi_2 == 1){
                    			echo '<td> <span class="label label-success"><i class="fa fa-check"></i> Direktur Utama & Keuangan </span></td>';
                    		}
                    	}else if($d->status_disposisi_1 == 2){
                    		if($d->status_disposisi_3 == 1){
                    			echo '<td> <span class="label label-success"><i class="fa fa-check"></i> Direktur Utama & Teknik </span></td>';
                    		}

                    	}else if($d->status_disposisi_1 == 3){
                    		echo '<td><span class="label label-success"><i class="fa fa-check"></i> Direktur Utama</span>';
                    		if($d->status_disposisi_2 == 1){
                    			echo '<br><br><span class="label label-success"><i class="fa fa-check"></i> Direktur Keuangan</span>';
                    		}
                    		if($d->status_disposisi_3 == 1){
                    			echo '<br><br><span class="label label-success"><i class="fa fa-check"></i> Direktur Teknik</span>';
                    		}
                    		echo '</td>';
                    	}
                    }else{
                      echo '<td><span class="label label-danger">Belum disposisi</span></td>';
                    }
                    ?>

                    <td class="td-actions text-right">
                     <?php
                        $level = $this->session->userdata('level');
                        if($level == 'sekertaris'){
                          ?>
                          <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/lihat_gambar/".$d->id_surat."" ?>'>
                          <i class="fa fa-file-image-o"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Edit" class="btn btn-warning btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/update/".$d->id_surat."" ?>'>
                          <i class="fa fa-pencil"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini ? \n*seluruh berkas pada surat ini juga akan terhapus')" href='<?php echo base_url()."index.php/surat_masuk/do_delete/".$d->id_surat."" ?>'>
                          <i class="fa fa-close"></i>
                          </a>
                        <?php
                         } else if($level == 'dirut'){
                         ?>
                          <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/lihat_gambar/".$d->id_surat."" ?>'>
                          <i class="fa fa-file-image-o"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Disposisi" class="btn btn-warning btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/disposisi/".$d->id_surat."" ?>'>
                          <i class="fa fa-pencil"></i> Disposisi
                          </a>
                          <?php
                         } else if($level == 'dirkeu'){
                         ?>
                         <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/lihat_gambar/".$d->id_surat."" ?>'>
                          <i class="fa fa-file-image-o"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Disposisi" class="btn btn-warning btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/disposisi_2/".$d->id_surat."" ?>'>
                          <i class="fa fa-pencil"></i> Disposisi
                          </a>

 						               <?php
                         } else if($level == 'dirtek'){
                         ?>
                         <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/lihat_gambar/".$d->id_surat."" ?>'>
                          <i class="fa fa-file-image-o"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Disposisi" class="btn btn-warning btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/disposisi_3/".$d->id_surat."" ?>'>
                          <i class="fa fa-pencil"></i> Disposisi
                          </a>
                        <?php
                        }else{
                        ?>
                        <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/surat_masuk/lihat_gambar/".$d->id_surat."" ?>'>
                        <i class="fa fa-file-image-o"></i> Lihat
                        </a>
                        <?php
                        }
                      ?>
                    </td>
                  </tr>
                  <?php
                  $i++;
                }
                ?>
              </tbody>
            </table>
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
</body>
</html>

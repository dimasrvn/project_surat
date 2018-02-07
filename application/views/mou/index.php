<!DOCTYPE html>
<html>
  <head>
    <title>MOU</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>MOU</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li class="active">MOU</li>
              </ol>
            </div>
            <br>
            <div class="row">

              <?php
                $level = $this->session->userdata('level');
                if($level == 'sekertaris'){
                  ?>
                  <div class="col-md-7">
                    <a type="submit" class="btn btn-info btn-addon m-b-md" href='<?php echo base_url()."index.php/mou/insert" ?>'><i class="fa fa-plus"></i> Tambah MOU</a>
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
                  <th>No</th>
                  <th>Nomor Surat</th>
                  <th>Tanggal</th>
                  <th>Perihal</th>
                  <th>Antara</th>
                  <th>Inisial</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $i=1;
                foreach ($data as $d) {
                  ?>
                  <tr>
                    <td> <?php echo $i ?> </td>
                    <td> <?php echo $d->no_surat ?> </td>
                    <?php
                      $day= date("d", strtotime($d->tanggal) );
                      $year = date('Y', strtotime($d->tanggal));
                      $month = date('F', strtotime($d->tanggal));
                    ?>
                    <td> <?php echo $day.' '.$month.' '.$year ?> </td>
                    <td> <?php echo $d->perihal ?> </td>
                    <td> <?php echo $d->pemberi?> - <?php echo $d->penerima?> </td>
                    <td> <?php echo $d->inisial ?> </td>
                    <td class="td-actions text-right">
                      <?php
                        $level = $this->session->userdata('level');
                        if($level == 'sekertaris'){
                          ?>
                          <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/mou/lihat_gambar/".$d->id_surat."" ?>'>
                          <i class="fa fa-file-image-o"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Edit" class="btn btn-warning btn-simple btn-xs" href='<?php echo base_url()."index.php/mou/update/".$d->id_surat."" ?>'>
                          <i class="fa fa-pencil"></i>
                          </a>
                          <a type="button" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini ? \n*seluruh berkas pada surat ini juga akan terhapus')" href='<?php echo base_url()."index.php/mou/do_delete/".$d->id_surat."" ?>'>
                          <i class="fa fa-close"></i>
                          </a>
                        <?php
                        }else{
                        ?>
                        <a type="button" rel="tooltip" title="Lihat Surat" class="btn btn-info btn-simple btn-xs" href='<?php echo base_url()."index.php/mou/lihat_gambar/".$d->id_surat."" ?>'>
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
</html>

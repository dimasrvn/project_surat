<!DOCTYPE html>
<html>
  <head>
    <title>Daftar User</title>
    <?php echo $head ?>
  </head>
  <body class="compact-menu">
    <main class="page-content content-wrap">
      <?php echo $navbar ?>
      <?php echo $sidebar ?>

      <div class="page-inner">
          <!-- Navigation -->
          <div class="page-title">
            <h3>Daftar User</h3>
            <div class="page-breadcrumb">
              <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
              <li class="active">Daftar User</li>
              </ol>
            </div>
            <br>
            <div class="row">
              <div class="col-md-7">
                <a type="submit" class="btn btn-info btn-addon m-b-md" href='<?php echo base_url()."index.php/profile/insert" ?>'><i class="fa fa-plus"></i> Tambah User</a>
              </div>

              <?php
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
                }else if($pesan == 'sukses'){
                ?>
                <div class="col-md-5">
                <div class="panel panel-green ui-sortable-handle">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color:white;"><i class="fa fa-check-square-o"></i>  Password berhasil diganti</h3>
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jabatan</th>
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
                    <td> <?php echo $d->nama ?> </td>
                    <td> <?php echo $d->email ?> </td>
                    <td> <?php echo $d->level?> </td>
                    <td class="td-actions text-right">
                    <a type="button" rel="tooltip" title="Edit" class="btn btn-warning btn-simple btn-xs" href='<?php echo base_url()."index.php/profile/update/".$d->id_user."" ?>'>
                    <i class="fa fa-pencil"></i>
                    </a>
                    <?php
                      if($d->id_user == $this->session->userdata('id_user')){
                        ?>
                        <a type="button" rel="tooltip" title="Tidak dapat menghapus akun milik sendiri" class="btn btn-defult btn-simple btn-xs ?>">
                        <i class="fa fa-close"></i>
                        </a>
                        <?php
                      }else{
                        ?>
                        <a type="button" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini ?')" href='<?php echo base_url()."index.php/profile/do_delete/".$d->id_user."" ?>'>
                        <i class="fa fa-close"></i>
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

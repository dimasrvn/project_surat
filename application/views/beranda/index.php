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
        <div class="page-title">
          <h3>Beranda</h3>
          <div class="page-breadcrumb">
            <ol class="breadcrumb">
            <li class="active">Proses Disposisi</li>
            </ol>
          </div>
        </div>
          <div id="main-wrapper">
            <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo $jumlah_surat?></p>
                                        <span class="info-box-title">Jumlah Surat Masuk</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p><?php echo $jumlah_surat0 ?></p>
                                        <span class="info-box-title">Jumlah Surat masuk belum disposisi</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-envelope-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo $jumlah_surat1 ?></p>
                                        <span class="info-box-title">Jumlah Surat dalam proses disposisi</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-refresh"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo $jumlah_surat2?></p>
                                        <span class="info-box-title">Jumlah Surat selesai bulan <?php echo date("F");?></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                           <div class="panel panel-white">
                             <div class="panel-body">
                                        <div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><h4 class="panel-title"><i class="fa fa-refresh fa-spin"></i> Surat Masuk </h4></a></li>
                                                <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><h4 class="panel-title" style="color:green"><i class="fa fa-check"></i> Surat Masuk selesai bulan <?php echo date("F");?></h4></a></li>

                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="tab1">
                                                  <div class="panel-body">
                                                      <div class="table-responsive project-stats">
                                                        <?php if($data){ ?>
                                                         <table class="table">
                                                             <thead>
                                                                 <tr>
                                                                     <th>No Surat</th>
                                                                     <th>Perihal</th>
                                                                     <th>Status</th>
                                                                     <th>Menunggu Disposisi</th>
                                                                     <th>Progress</th>
                                                                     <?php
                                                                     $level = $this->session->userdata('level');
                                                                     if($level != "sekertaris"){ ?>
                                                                     <th>Aksi</th>
                                                                    <?php } ?>
                                                                 </tr>
                                                             </thead>
                                                             <tbody>
                                                               <?php foreach ($data as $d) { ?>
                                                                 <tr>
                                                                     <td><?php echo $d->no_surat ?></td>
                                                                     <td><?php echo $d->perihal ?></td>
                                                                     <td>
                                                                       <?php if($d->status == 0){ ?>
                                                                         <span class="label label-danger">Belum Disposisi</span>
                                                                       <?php }else if($d->status == 1){ ?>
                                                                         <span class="label label-info">Proses Disposisi</span>
                                                                       <?php }?>
                                                                     </td>
                                                                     <td>
                                                                       <?php if($d->status == 0){ ?>
                                                                         <span>Direktur Utama</span>
                                                                       <?php
                                                                         }else if($d->status == 1){
                                                                           if($d->status_disposisi_1 == 1){
                                                                             echo '<span>Direktur Keuangan</span>';
                                                                           }else if($d->status_disposisi_1 == 2){
                                                                             echo '<span>Direktur Teknik</span>';
                                                                           }else if($d->status_disposisi_1 == 3){
                                                                             if($d->status_disposisi_2 == 0){
                                                                               echo '<span>Direktur Keuangan</span>';
                                                                             }
                                                                             if(($d->status_disposisi_2 == 0) AND ($d->status_disposisi_3 == 0)){
                                                                               echo '<span> & </span>';
                                                                             }
                                                                             if($d->status_disposisi_3 == 0){
                                                                               echo '<span>Direktur Teknik</span>';
                                                                             }
                                                                           }
                                                                         } ?>
                                                                     </td>
                                                                     <td>
                                                                       <?php if($d->status == 0){ ?>
                                                                         <div class="progress progress-sm">
                                                                             <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                             </div>
                                                                         </div>
                                                                       <?php }else if($d->status == 1){
                                                                         if(($d->status_disposisi_1 == 1) OR ($d->status_disposisi_1 == 2)){
                                                                           ?>
                                                                           <div class="progress progress-sm">
                                                                               <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                               </div>
                                                                           </div>
                                                                           <?php
                                                                         }else if($d->status_disposisi_1 == 3){
                                                                           if(($d->status_disposisi_2 == 0) AND ($d->status_disposisi_3 == 0)){
                                                                             ?>
                                                                             <div class="progress progress-sm">
                                                                                 <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                                                 </div>
                                                                             </div>
                                                                             <?php
                                                                           }else if($d->status_disposisi_2 == 0){
                                                                             ?>
                                                                             <div class="progress progress-sm">
                                                                                 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                                 </div>
                                                                             </div>
                                                                             <?php
                                                                           }
                                                                           else if($d->status_disposisi_3 == 0){
                                                                             ?>
                                                                             <div class="progress progress-sm">
                                                                                 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                                 </div>
                                                                             </div>
                                                                             <?php
                                                                           }
                                                                         }

                                                                         }
                                                                       ?>
                                                                     </td>
                                                                     <td>
                                                                       <?php
                                                                       $level = $this->session->userdata('level');
                                                                       if($level != "sekertaris"){ ?>
                                                                       <a type="button" rel="tooltip" title="Disposisi" class="btn btn-success btn-simple btn-xs"
                                                                       href=<?php
                                                                       if($level == "dirut"){
                                                                         echo "'".base_url()."index.php/surat_masuk/disposisi/".$d->id_surat."'";
                                                                       }else if($level == "dirkeu"){
                                                                         echo "'".base_url()."index.php/surat_masuk/disposisi_2/".$d->id_surat."'";
                                                                       }else if($level == "dirtek"){
                                                                         echo "'".base_url()."index.php/surat_masuk/disposisi_3/".$d->id_surat."'";
                                                                       }
                                                                       ?>>
                                                                       <i class="fa fa-pencil"></i> Disposisi
                                                                       </a>
                                                                     <?php } ?>
                                                                     </td>
                                                                 </tr>
                                                               <?php } ?>
                                                             </tbody>
                                                          </table>
                                                        <?php }else{ ?>
                                                          <h3 class="text-center"> Tidak ada surat masuk untuk Anda </h3>
                                                        <?php } ?>
                                                      </div>
                                                  </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="tab2">
                                                  <div class="panel-body">
                                                      <div class="table-responsive project-stats">
                                                        <?php if($data_done){ ?>
                                                         <table class="table">
                                                             <thead>
                                                                 <tr>
                                                                     <th>No Surat</th>
                                                                     <th>Perihal</th>
                                                                     <th>Status</th>
                                                                     <th>Telah di Disposisi</th>
                                                                     <th>Progress</th>
                                                                 </tr>
                                                             </thead>
                                                             <tbody>
                                                               <?php foreach ($data_done as $d) { ?>
                                                                 <tr>
                                                                     <td><?php echo $d->no_surat ?></td>
                                                                     <td><?php echo $d->perihal ?></td>
                                                                     <td>
                                                                         <span class="label label-success"><i class="fa fa-check"></i> Selesai</span>
                                                                     </td>
                                                                     <td>
                                                                       <?php
                                                                           if($d->status_disposisi_1 != 0){
                                                                             echo '<span class="label label-success">Direktur Utama</span> ';
                                                                           }
                                                                           if($d->status_disposisi_2 != 0){
                                                                             echo '<span class="label label-success">Direktur Keuangan</span> ';
                                                                           }
                                                                           if($d->status_disposisi_3 != 0){
                                                                             echo '<span class="label label-success">Direktur Teknik</span> ';
                                                                           }
                                                                          ?>
                                                                     </td>
                                                                     <td>
                                                                         <div class="progress progress-sm">
                                                                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                                         </div>
                                                                     </td>
                                                                     <td>

                                                                     </td>
                                                                 </tr>
                                                               <?php } ?>
                                                             </tbody>
                                                          </table>
                                                        <?php }else{ ?>
                                                          <h3 class="text-center"> Belum ada surat yang selesai di disposisi </h3>
                                                        <?php } ?>
                                                      </div>
                                                  </div>
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
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             

<!DOCTYPE html>
<html>
    <head>

        <!-- Title -->
        <title>Modern | Extra - Gallery</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url()."assets"?>/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?php echo base_url()."assets"?>/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url()."assets"?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/plugins/gridgallery/css/component.css" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="<?php echo base_url()."assets"?>/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/css/themes/red.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()."assets"?>/css/custom.css" rel="stylesheet" type="text/css"/>

        <script src="<?php echo base_url()."assets"?>/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="compact-menu">
      <main class="page-content content-wrap">
        <?php echo $navbar ?>
        <?php echo $sidebar ?>

            <div class="page-inner">
                <!-- Navigation -->
                <div class="page-title">
                  <h3>Berkas - <b><?php echo $no ?></h3>
                  <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>/index.php/beranda">Beranda</a></li>
                    <li><a href="<?php echo base_url() ?>/index.php/mou">MOU</a></li>
                    <li class="active">Berkas - <b><?php echo $no ?></b></li>
                    </ol>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <?php
                        foreach($data as $d){ $ids = $d->id_surat; break; }
                        if(empty($ids))
                        {$ids = 0;}
                      ?>
                      <a type="submit" class="btn btn-default btn-addon m-b-sm" href='<?php echo base_url()."index.php/mou/" ?>'><i class="fa fa-angle-left"></i> Kembali</a>
                      <a type="submit" class="btn btn-info btn-addon m-b-sm" href='<?php echo base_url()."index.php/mou/upload_gambar/".$ids."" ?>'><i class="fa fa-plus"></i> Tambah Berkas MOU</a>
                      <?php if($data != NULL){ ?>
                      <a type="submit" class="btn btn-success btn-addon m-b-sm pull-right" href='<?php echo base_url()."index.php/mou/download_berkas/".$ids."" ?>'><i class="fa fa-download"></i> Download Berkas</a>
                    <?php } ?>
                    </div>
                  </div>
                </div>
                <!-- End of Navigation -->
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                  <?php
                                  if($data == NULL){
                                    echo "<h4 class='text-center'>surat ini tidak mempunyai berkas</h4>";
                                  }else{
                                    ?>
                                    <div id="grid-gallery" class="grid-gallery">

                                        <section class="grid-wrap">
                                            <ul class="grid">
                                              <?php foreach ($data as $d) { ?>
                                                <li class="grid-sizer"></li>
                                                <li>
                                                    <figure>
                                                        <img src="<?php echo base_url()."assets"?>/file/<?php echo $d->gambar ?>" alt="img01"/>
                                                        <figcaption><h3><?php echo $d->gambar ?></h3></figcaption>
                                                    </figure>
                                                </li>
                                              <?php } ?>
                                            </ul>
                                        </section>
                                        <section class="slideshow">
                                            <ul>
                                                <?php foreach ($data as $d) { ?>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                          <div class="col-md-9">
                                                            <h3><?php echo $d->gambar ?></h3>
                                                          </div>
                                                          <div class="col-md-2">
                                                            <a href="<?php echo base_url()."assets"?>/file/<?php echo $d->gambar ?>" target="_blank" type="button" rel="tooltip" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-eye"></i> preview
                                                            </a>
                                                          </div>
                                                          <div class="col-md-1 pull-right">
                                                            <a type="button" rel="tooltip" class="btn btn-danger btn-simple btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus berkas ini ?')" href='<?php echo base_url()."index.php/mou/do_delete_gambar/".$d->id_surat."/".$d->id_berkas."" ?>'>
                                                            <i class="fa fa-trash"></i>
                                                            </a>
                                                          </div>
                                                        </figcaption>
                                                        <img src="<?php echo base_url()."assets"?>/file/<?php echo $d->gambar ?>" alt="img01"/>
                                                    </figure>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <nav>
                                                <span class="fa fa-angle-left nav-prev"></span>
                                                <span class="fa fa-angle-right nav-next"></span>
                                                <span class="fa fa-times nav-close"></span>
                                            </nav>
                                        </section>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2015 &copy; Modern by Steelcoders.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->




        <!-- Javascripts -->
        <script src="<?php echo base_url()."assets"?>/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/waves/waves.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo base_url()."assets"?>/plugins/gridgallery/js/imagesloaded.pkgd.min.js"></script>
    		<script src="<?php echo base_url()."assets"?>/plugins/gridgallery/js/masonry.pkgd.min.js"></script>
    		<script src="<?php echo base_url()."assets"?>/plugins/gridgallery/js/classie.js"></script>
    		<script src="<?php echo base_url()."assets"?>/plugins/gridgallery/js/cbpgridgallery.js"></script>
        <script src="<?php echo base_url()."assets"?>/js/modern.min.js"></script>
        <script src="<?php echo base_url()."assets"?>/js/pages/gallery.js"></script>

    </body>
</html>

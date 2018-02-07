<div class="navbar">
	<div class="navbar-inner">
		<div class="sidebar-pusher">
			<a class="waves-effect waves-button waves-classic push-sidebar">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="logo-box">
			<a href="index.php" class="logo-text"><span>SI - Surat</span></a>
		</div><!-- Logo Box -->
		<div class="topmenu-outer">
			<div class="top-menu">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					$level = $this->session->userdata('level');
					if (($level != "sekertaris") AND ($level != "umum")){
					?>
					<li class="dropdown">
              <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bell"></i>
								<?php if ($jumlah_surat0>0){ ?>
								<span class="badge badge-danger pull-right">
								<?php
								echo $jumlah_surat0
								?>
								</span>
								<?php } ?>
							</a>
							<?php if ($jumlah_surat0>0){ ?>
              <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                  <li><p class="drop-title"><b><?php echo $jumlah_surat0 ?> Surat menunggu disposisi</b></p></li>
                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><li class="dropdown-menu-list slimscroll tasks" style="overflow: hidden; width: auto; height: 100%;">
                      <ul class="list-unstyled">
												<?php foreach ($surat0 as $d){ ?>
                          <li>
                              <a href="#">
                                  <div class="task-icon badge badge-success"><i class="icon-envelope"></i></div>
                                  <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                  <p class="task-details"><?php echo $d->no_surat ?></p>
                              </a>
                          </li>
												<?php } ?>
                      </ul>
                  </li><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.3; display: block; border-radius: 0px; z-index: 99; right: 0px; height: 139.007px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div></div>
                  <li class="drop-all"><a href="<?php echo base_url().'index.php/beranda/index'?>" class="text-center">All Tasks</a></li>
              </ul>
						<?php }else{ ?>
							<ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                  <li><p class="drop-title text-center"><b>Tidak ada notifikasi</b></p></li>
                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><li class="dropdown-menu-list slimscroll tasks" style="overflow: hidden; width: auto; height: 100%;">
                      <ul class="list-unstyled">

                      </ul>
                  </li><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.3; display: block; border-radius: 0px; z-index: 99; right: 0px; height: 139.007px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div></div>
              </ul>
						<?php } ?>
          </li>
					<?php
					}
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
							<span class="user-name"><?php echo $this->session->userdata('nama');?><i class="fa fa-angle-down"></i></span>
							<img class="img-circle avatar" src="<?php echo base_url()."assets/"?>images/avatar1.png" width="40" height="40" alt="">
						</a>
						<ul class="dropdown-menu dropdown-list" role="menu">
							<?php
								$id_user = $this->session->userdata('id_user');
							?>
							<li role="presentation"><a href='<?php echo base_url()."index.php/profile/update/".$id_user.""?>'><i class="fa fa-user"></i>Profile</a></li>
							<li role="presentation"><a href="<?php echo base_url()?>index.php/login/out"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
						</ul>
					</li>
				</ul><!-- Nav -->
			</div><!-- Top Menu -->
		</div>
	</div>
</div><!-- Navbar -->

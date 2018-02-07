<div class="page-sidebar sidebar">
	<div class="page-sidebar-inner slimscroll">
		<div class="sidebar-header">
			<div class="sidebar-profile">
				<a href="<?php echo base_url()?>/index.php/profile" >
					<div class="sidebar-profile-image">
						<img src="<?php echo base_url()."assets/"?>images/avatar1.png" class="img-circle img-responsive" alt="">
					</div>
					<div class="sidebar-profile-details">
						<?php
						 $level=$this->session->userdata('level');
						 if($level == 'dirut'){
							 $level = 'Direktur Utama';
						 }else if($level == 'dirtek'){
							 $level = 'Direktur Teknik';
						 }else if($level == 'dirkeu'){
							 $level = 'Direktur Keuangan';
						 }
						?>

						<span><?php echo $this->session->userdata('nama');?><br><small><?php echo $level;?></small></span>
					</div>
				</a>
			</div>
		</div>
		<ul class="menu accordion-menu">
			<?php if ($page == 'beranda'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
				<a href="<?php echo base_url().'index.php/beranda/index'?>"
				class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Beranda</p></a>
			</li>

			<?php if ($page == 'masuk'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
				<a href="<?php echo base_url().'index.php/surat_masuk/index'?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-save"></span><p>Surat Masuk</p></a>
			</li>

			<?php if ($page == 'keluar'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
				<a href="<?php echo base_url().'index.php/surat_keluar/index'?>"
				class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-open"></span><p>Surat Keluar</p></a>
			</li>

			<?php if (($page == 'kpts') || ($page == 'kuasa') || ($page == 'kontrak') || ($page == 'edaran') || ($page == 'direksi' || ($page == 'berita_acara') || ($page == 'mou') )){ echo "<li class='droplink active open'>"; }else{ echo "<li class='droplink'>";}?>
				<a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-envelope"></span><p>Surat lainnya</p><span class="arrow"></span></a>
				<ul class="sub-menu">
					<?php if ($page == 'kpts'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/surat_kpts/index'?>">KPTS</a></li>
					<?php if ($page == 'kuasa'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/surat_kuasa/index'?>">Kuasa</a></li>
					<?php if ($page == 'kontrak'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/surat_kontrak/index'?>">Kontrak </a></li>
					<?php if ($page == 'edaran'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/surat_edaran/index'?>">Edaran</a></li>
					<?php if ($page == 'direksi'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/surat_direksi/index'?>">Perintah Direksi</a></li>
					<?php if ($page == 'berita_acara'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/berita_acara/index'?>">Berita Acara</a></li>
					<?php if ($page == 'mou'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/mou/index'?>">MoU</a></li>
				</ul>
			</li>

			<?php
			if (($level == 'sekertaris') OR ($level == 'umum')) {
				if (($page == 'utama') || ($page == 'teknik') || ($page == 'keuangan')){ echo "<li class='droplink active open'>"; }else{ echo "<li class='droplink'>";}?>
					<a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-briefcase"></span><p>ND Direktur</p><span class="arrow"></span></a>
					<ul class="sub-menu">
						<?php if ($page == 'utama'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/ND_dirut/index'?>">Utama</a></li>
						<?php if ($page == 'teknik'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/ND_dirtek/index'?>">Teknik</a></li>
						<?php if ($page == 'keuangan'){ echo "<li class='active'>"; }else{ echo "<li>";} ?><a href="<?php echo base_url().'index.php/ND_dirkeu/index'?>">Keuangan</a></li>
					</ul>
			<?php
			}
			?>

			<?php
				$level = $this->session->userdata('level');
				if($level == 'dirut'){
			?>
				<?php if ($page == 'utama'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
					<a href="<?php echo base_url().'index.php/ND_dirut/index'?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-briefcase"></span><p>ND Direktur</p></a>
				</li>
			<?php
			}
			?>

			<?php
				$level = $this->session->userdata('level');
				if($level == 'dirtek'){
			?>
				<?php if ($page == 'teknk'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
					<a href="<?php echo base_url().'index.php/ND_dirtek/index'?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-briefcase"></span><p>ND Direktur</p></a>
				</li>
			<?php
			}
			?>

			<?php
				$level = $this->session->userdata('level');
				if($level == 'dirkeu'){
			?>
				<?php if ($page == 'keuangan'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
					<a href="<?php echo base_url().'index.php/ND_dirkeu/index'?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-briefcase"></span><p>ND Direktur</p></a>
				</li>
			<?php
			}
			?>


			<?php
				$level = $this->session->userdata('level');
				if($level == 'sekertaris'){
			?>
				<?php if ($page == 'profile'){ echo "<li class='active'>"; }else{ echo "<li>";} ?>
					<a href="<?php echo base_url().'index.php/profile/index'?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Kelola User</p></a>
				</li>
			<?php
				}
			?>

			</li>
		</ul>
	</div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->

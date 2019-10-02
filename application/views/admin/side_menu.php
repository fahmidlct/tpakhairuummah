<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="https://www.w3schools.com/howto/img_avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Selamat datang, <strong><?php echo $nama; ?></strong></span><br>
      <a href="<?php echo base_url(); ?>" target="_blank" title="Lihat Website" class="w3-bar-item w3-button"><i class="fa fa-desktop"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="<?php echo base_url('admin/panel'); ?>" class="w3-bar-item w3-button w3-padding w3-blue <?php if ($this->uri->segment(2) == 'panel') echo 'w3-green'; ?>"><i class="fa fa-home fa-fw"></i>  Beranda</a>
    <?php if($this->session->userdata('level') == 'super') : ?>
	<a href="<?php echo base_url('admin/user'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'user') echo 'w3-green'; ?>"><i class="fa fa-users fa-fw"></i>  User</a>
<?php else : ?>
<a href="<?php echo base_url('admin/user/edit/') . $this->session->userdata('id_user'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'user') echo 'w3-green'; ?>"><i class="fa fa-users fa-fw"></i>  User</a>
<?php endif; ?>
  <a href="<?php echo base_url('admin/murid'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'murid') echo 'w3-green'; ?> ?>"><i class="fa fa-user fa-fw"></i>  Murid</a>
    <a href="<?php echo base_url('admin/guru'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'guru') echo 'w3-green'; ?>"><i class="fa fa-user fa-fw"></i>  Guru</a>
    <a href="<?php echo base_url('admin/kegiatan'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'kegiatan') echo 'w3-green'; ?>"><i class="fa fa-calendar fa-fw"></i>  Kegiatan</a>
    <a href="<?php echo base_url('admin/kelas'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'kelas') echo 'w3-green'; ?>"><i class="fa fa-book fa-fw"></i>  Kelas</a>
    <?php if($this->session->userdata('level') == 'super') : ?>
    <a href="<?php echo base_url('admin/profil'); ?>" class="w3-bar-item w3-button w3-padding <?php if ($this->uri->segment(2) == 'profil') echo 'w3-green'; ?>"><i class="fa fa-cog fa-fw"></i>  Pengaturan Profil Website</a>
    <?php endif; ?>
    <a href="<?php echo base_url('logout'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Log Out</a><br><br>
  </div>
</nav>
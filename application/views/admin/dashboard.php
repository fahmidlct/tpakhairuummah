<div class=" w3-animate-opacity">
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
        <a href="<?php echo base_url('admin/guru'); ?>" style="text-decoration: none;">
        <div class="w3-card w3-green w3-padding w3-hover-shadow">
            <h3>Guru</h3>
            <p>Jumlah guru : <?php echo $jumlah_guru; ?></span></p>
        </div>
        </a>
    </div>
    <div class="w3-quarter">
        <a href="<?php echo base_url('admin/murid'); ?>" style="text-decoration: none;">
        <div class="w3-card w3-green w3-padding w3-hover-shadow">
            <h3>Murid</h3>
            <p>Jumlah siswa : <?php echo $jumlah_siswa; ?></p>
        </div>
        </a>
    </div>
    <div class="w3-quarter">
        <a href="<?php echo base_url('admin/kelas'); ?>" style="text-decoration: none;">
        <div class="w3-card w3-green w3-padding w3-hover-shadow">
            <h3>Kelas</h3>
            <p>Jumlah kelas : <?php echo $jumlah_kelas; ?></p>
        </div>
        </a>
    </div>
    <div class="w3-quarter">
        <a href="<?php echo base_url('admin/kegiatan'); ?>" style="text-decoration: none;">
        <div class="w3-card w3-green w3-padding w3-hover-shadow">
            <h3>Kegiatan</h3>
            <p>Jumlah kegiatan : <?php echo $jumlah_kegiatan; ?></p>
        </div>
        </a>
    </div>
  </div>
<?php if($this->session->userdata('level') == 'super') : ?>
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
        <a href="<?php echo base_url('admin/user'); ?>" style="text-decoration: none;">
        <div class="w3-card w3-green w3-padding w3-hover-shadow">
            <h3>User</h3>
            <p>Jumlah user : <?php echo $jumlah_user; ?></p>
        </div>
        </a>
    </div>
</div>
<?php endif; ?>
</div>
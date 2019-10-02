 <div class="w3-container w3-animate-opacity">
    <!--<h5><?php echo ucfirst($this->uri->segment(2)); ?></h5>-->
	
	<?php $flash_pesan = $this->session->flashdata('pesan')?>
	<?php if (! empty($flash_pesan)) : ?>
		<div class="w3-panel w3-green">
			<h3>Berhasil!</h3>
			<p><?php echo $flash_pesan; ?></p>
</div>
	<?php endif ?>
    
	<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
	  <tr>
		<td style="font-weight: bold; width: 30%;">Judul Kata Pembuka</td>
		<td><?php echo $profil['judul_kata_pembuka']; ?></td>
	  </tr>
      <tr>
        <td style="font-weight: bold;">Kata Pembuka</td>
        <td><?php echo $profil['kata_pembuka']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Nama Sekolah</td>
        <td><?php echo $profil['nama_sekolah']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Alamat</td>
        <td><?php echo $profil['alamat']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">No. Telepon</td>
        <td><?php echo $profil['no_telepon']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Kode Pos</td>
        <td><?php echo $profil['kode_pos']; ?></td>
      </tr>
	  <tr>
        <td style="font-weight: bold;">Penerima Donatur</td>
        <td><?php echo $profil['penerima_donatur']; ?></td>
      </tr>
	  <tr>
        <td style="font-weight: bold;">Nomor Kontak</td>
        <td><?php echo $profil['nomor_kontak']; ?></td>
      </tr>
	  <tr>
        <td style="font-weight: bold;">Nomor Rekening</td>
        <td><?php echo $profil['no_rekening']; ?></td>
      </tr>
	  <tr>
        <td style="font-weight: bold;">Email</td>
        <td><?php echo $profil['email']; ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Instagram</td>
        <td><?php echo $profil['instagram']; ?></td>
      </tr>
	  <tr>
        <td style="font-weight: bold;">Facebook</td>
        <td><?php echo $profil['facebook']; ?></td>
      </tr>
    </table><br>
	<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Edit Profil</button>
  </div>
  
 <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" action="<?php echo base_url('admin/profil/edit'); ?>" method="post">
        <div class="w3-section">
		<h3>Edit Profil</h3>
          <label><b>Judul Kata Pembuka</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Judul kata pembuka" name="judul_kata_pembuka" maxlength="50" value="<?php echo $profil['judul_kata_pembuka']; ?>" required>
          <?php echo form_error('judul_kata_pembuka', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Kata Pembuka</b></label>
          <textarea class="w3-input w3-border" type="text" placeholder="Kata Pembuka" name="kata_pembuka" style="resize: none;" maxlength="800" required><?php echo $profil['kata_pembuka']; ?> </textarea>
		  <?php echo form_error('kata_pembuka', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Nama Sekolah</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Nama Sekolah" name="nama_sekolah" maxlength="32" value="<?php echo $profil['nama_sekolah']; ?>" required>
		  <?php echo form_error('nama_sekolah', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Alamat</b></label>
          <textarea class="w3-input w3-border" type="text" placeholder="Alamat" name="alamat" style="resize: none;" maxlength="200" required><?php echo $profil['alamat']; ?></textarea>
		  <?php echo form_error('alamat', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>No. Telepon</b></label>
          <input class="w3-input w3-border" type="text" placeholder="No Telepon" name="no_telepon" maxlength="12" value="<?php echo $profil['no_telepon']; ?>" required>
		  <?php echo form_error('no_telepon', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Kode Pos</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Kode Pos" name="kode_pos" maxlength="5" value="<?php echo $profil['kode_pos']; ?>" required>
		  <?php echo form_error('kode_pos', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Penerima Donatur</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Penerima Donatur" name="penerima_donatur" maxlength="30" value="<?php echo $profil['penerima_donatur']; ?>" required>
		  <?php echo form_error('penerima_donatur', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Nomor Kontak</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Nomor Kontak" name="nomor_kontak" maxlength="20" value="<?php echo $profil['nomor_kontak']; ?>" required>
		  <?php echo form_error('nomor_kontak', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Nomor Rekening</b></label>
          <textarea class="w3-input w3-border" type="text" placeholder="Jika nomor rekening lebih dari satu, pisahkan dengan tanda koma (,). Contoh BCA a/n xxx, BRI a/n xxx." name="no_rekening" style="resize: none;" maxlength="200" required><?php echo $profil['no_rekening']; ?></textarea>
		  <?php echo form_error('no_rekening', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Email</b></label>
          <input class="w3-input w3-border" type="email" placeholder="Email" name="email" maxlength="50" value="<?php echo $profil['email']; ?>" required>
		  <?php echo form_error('email', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Instagram</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Instagram" name="instagram" maxlength="50" value="<?php echo $profil['instagram']; ?>" >
		  <?php echo form_error('instagram', '<p class="field_error">', '</p>');?>
		  <br>
		  <label><b>Facebook</b></label>
          <?php echo form_error('facebook', '<p class="field_error">', '</p>');?>
		  <input class="w3-input w3-border" type="text" placeholder="Facebook" name="facebook" maxlength="50" value="<?php echo $profil['facebook']; ?>" >
        </div>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red w3-right">Cancel</button>
        <input type="submit" name="submit" value="Update" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
      </div>
	  </form>

    </div>
  </div>
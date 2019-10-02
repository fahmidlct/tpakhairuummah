<form class="w3-container w3-animate-opacity" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/kegiatan/edit/') . $id_kegiatan; ?>">

	 <label><b>Nama Kegiatan</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama Kegiatan" name="nama_kegiatan" maxlength="100" value="<?php echo $form['nama_kegiatan']; ?>" required>
		<br>
		<label><b>Foto Kegiatan</b></label>
		<div class="w3-small">
		<img src="<?php echo base_url('asset/image/') . $form['thumb']; ?>" title="<?php echo $form['nama_kegiatan']; ?>" onclick="document.getElementById('id01').style.display='block'" style="border: 2px solid grey; cursor: pointer;" width="20%">
		</div>
		<br>
		<label><b>Ganti Foto Kegiatan</b></label>
		<input class="w3-input w3-border w3-margin-bottom" type="file" placeholder="Kosongkan jika tidak ingin mengganti gambar" name="gambar_kegiatan" accept="image/jpeg" />
		<div class="w3-panel w3-red w3-small">
		<p><i class="fa fa-exclamation-circle"></i> Kosongkan kotak upload gambar jika tidak ingin mengganti gambar kegiatan. Upload foto harus berupa gambar dengan format .jpg / .jpeg dengan ukuran maksimal 300Kb (1024 x 768)!.</p>
		</div>
		 <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <a href="<?php echo base_url('admin/kegiatan'); ?>" class="w3-button w3-red w3-right">Cancel</a>
        <input type="submit" name="submit" value="Edit Guru" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
      </div>
      </div>
</form>


<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">

      <div class="w3-center">
        <span onclick="document.getElementById('id01').style.display='none'" class="close w3-button w3-xlarge w3-hover-red w3-display-topright" title="Tutup">&times;</span>
      </div>

      <div>
	  
	  <img src="<?php echo base_url('asset/image/') . $form['foto']; ?>" title="<?php echo $form['nama_kegiatan']; ?>" width="100%" height="100%">
	  <p class="w3-center" style="padding-bottom: 24px !important;"><?php echo ucwords($form['nama_kegiatan']); ?></p>
	  </div>

    </div>
  </div>
 </div>
 

<?php
/* End of file kelas_form.php */
/* Location: ./application/views/kelas/kelas_form.php */
?>
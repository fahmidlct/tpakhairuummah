<form class="w3-container w3-animate-opacity" method="post" action="<?php echo base_url('admin/guru/edit/') . $id_guru; ?>">

	<label><b>Nama Guru</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama Guru" name="nama_guru" maxlength="32" value="<?php echo $form['nama_guru']; ?>" required>
		  <br>
		  <label><b>Tempat Lahir</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Tempat Lahir" name="tempat_lahir" maxlength="32" value="<?php echo $form['tempat_lahir']; ?>" required>
		  <br>
		  <label><b>Tanggal Lahir</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $form['tanggal_lahir']; ?>" required>
		  <br>
		  <label><b>Alamat</b></label>
		  <textarea class="w3-input w3-border w3-margin-bottom" placeholder="Alamat" name="alamat" style="resize: none;" maxlength="500" required><?php echo $form['alamat']; ?></textarea>
		  <br>
		  <label><b>Nomor HP</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nomor HP" name="nomor_hp" maxlength="14" value="<?php echo $form['nomor_hp']; ?>" required>
		  <br>
		  <label><b>Status</b></label>
		  <select class="w3-input w3-border w3-margin-bottom" name="status">
		  <option value="aktif" <?php echo $form['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
		  <option value="nonaktif" <?php echo $form['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
		  </select>
		  <br>
		  <label><b>Mengajar di Kelas</b></label>
		  <select class="w3-input w3-border w3-margin-bottom" name="id_kelas" required>
		  <option value="">Pilih Kelas</option>
		  <?php foreach($kelas as $row) : ?>
			<option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas'] == $form['id_kelas']) echo 'selected'; ?>><?php echo ucwords($row['nama_kelas']); ?></option>
		  <?php endforeach; ?>
		  </select>
          <br>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <a href="<?php echo base_url('admin/guru'); ?>" class="w3-button w3-red w3-right">Cancel</a>
        <input type="submit" name="submit" value="Edit Guru" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
      </div>
</form>

<?php
/* End of file kelas_form.php */
/* Location: ./application/views/kelas/kelas_form.php */
?>
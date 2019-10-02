<form class="w3-container w3-animate-opacity" method="post" action="<?php echo base_url('admin/murid/edit/') . $id_murid; ?>">
	<label><b>Nama Murid</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama Murid" name="nama_murid" maxlength="32" value="<?php echo $form['nama_murid']; ?>" required>
	<br>
	<label><b>Kelas</b></label>
		  <select class="w3-input w3-border w3-margin-bottom" name="id_kelas" required>
		  <option value="">Pilih Kelas</option>
		  <?php foreach($kelas as $row) : ?>
			<option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas'] == $form['id_kelas']) echo 'selected'; ?>><?php echo ucwords($row['nama_kelas']); ?></option>
		  <?php endforeach; ?>
		  </select>
          <br>
    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <!--<button onclick="<?php echo base_url('admin/murid'); ?>" type="button" class="w3-button w3-red w3-right">Cancel</button>-->
		<a href="<?php echo base_url('admin/murid'); ?>" class="w3-button w3-red w3-right">Cancel</a>
        <input type="submit" name="submit" value="Edit Murid" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
      </div>
</form>

<?php
/* End of file murid_form.php */
/* Location: ./application/views/murid/murid_form.php */
?>
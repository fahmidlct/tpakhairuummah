<form class="w3-container w3-animate-opacity" method="post" action="<?php echo base_url('admin/kelas/edit/') . $id_kelas; ?>">

	<label><b>Nama Kelas</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama Kelas" name="nama_kelas" maxlength="24" value="<?php echo $form['nama_kelas']; ?>" required>
	<br>
	<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
		<a href="<?php echo base_url('admin/kelas'); ?>" class="w3-button w3-red w3-right">Cancel</a>
		<input type="submit" name="submit" value="Update" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
    </div>
</form>

<?php
/* End of file kelas_form.php */
/* Location: ./application/views/kelas/kelas_form.php */
?>
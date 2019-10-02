<?php $flash_pesan = $this->session->flashdata('error')?>
	<?php if (! empty($flash_pesan)) : ?>
	<div class="w3-panel w3-red">
		<h3>Perhatian!</h3>
		<p><?php echo $flash_pesan; ?></p>
	</div>
<?php endif ?>

<?php $flash_pesan = $this->session->flashdata('berhasil')?>
<?php if (! empty($flash_pesan)) : ?>
	<div class="w3-panel w3-green">
		<h3>Perhatian!</h3>
		<p><?php echo $flash_pesan; ?></p>
	</div>
<?php endif ?>


<form class="w3-container w3-animate-opacity" method="post" action="<?php echo base_url('admin/user/edit/') . $id_user; ?>">
	<label><b>Username</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama User" name="username" disabled maxlength="24" value="<?php echo $form['username']; ?>" required>
	<br>
<?php if($form['username'] == $this->session->userdata('username')) : ?>
	<div class="w3-panel w3-red">
		<p><i class="fa fa-exclamation-circle"></i> Harap diisi jika ingin merubah password!</p>
	</div><label><b>Password Baru</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Password" name="password" maxlength="24" value="">
	<br>
	<label><b>Ulangi Password</b></label>
    <div class="w3-panel w3-red">
		<p><i class="fa fa-exclamation-circle"></i> Harus sama dengan password baru!</p>
	</div>
	<input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Ulangi Password" name="repassword" maxlength="24" value="">
	<br>
<?php endif ?>
	<label><b>Nama</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama User" name="nama" <?php if($this->session->userdata('level') == 'super') echo 'disabled'; ?> maxlength="32" value="<?php echo $form['nama']; ?>" required>
	<br>
<?php if($form['username'] != $this->session->userdata('username')) : ?>
	<label><b>Level</b></label>
    <select class="w3-input w3-border w3-margin-bottom" name="level">
	<option value="super" <?php echo $form['level'] == 'super' ? 'selected' : ''; ?>>Admin</option>
	<option value="user" <?php echo $form['level'] == 'user' ? 'selected' : ''; ?> >User</option>
	</select>
	<br>
	<label><b>Status</b></label>
    <select class="w3-input w3-border w3-margin-bottom" name="status">
	<option value="aktif" <?php echo $form['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
	<option value="nonaktif" <?php echo $form['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
	</select>
	<br>
<?php else : ?>
	<input type="hidden" name="level" value="<?php echo $form['level']; ?>">
	<input type="hidden" name="status" value="<?php echo $form['status']; ?>">
<?php endif; ?>
	<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
		<a href="<?php echo base_url('admin/user'); ?>" class="w3-button w3-red w3-right">Cancel</a>
		<input type="submit" name="submit" value="Update" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
    </div>
</form>

<?php
/* End of file user_form.php */
/* Location: ./application/views/admin/user_form.php */
?>
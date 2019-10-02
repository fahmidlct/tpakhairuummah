<div class="w3-container w3-animate-opacity w3-margin-64">
    <!--<h5><?php echo ucfirst($this->uri->segment(2)); ?></h5>-->
	
	<?php $flash_pesan = $this->session->flashdata('pesan')?>
	<?php if (! empty($flash_pesan)) : ?>
		<div class="w3-panel w3-green">
			<h3>Berhasil!</h3>
			<p><?php echo $flash_pesan; ?></p>
		</div>
	<?php endif ?>
	<?php if (! empty($pesan)) : ?>
		<div class="w3-panel w3-orange">
			<h4><i class="fa fa-exclamation-circle"></i> <?php echo $pesan; ?></h4>
		</div>
	<?php endif ?>
	<a href="<?php echo base_url('admin/download_excel'); ?>" class="w3-button w3-large w3-blue"><i class="fa fa-download"></i> Download daftar murid</a>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-large w3-right w3-blue" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah Murid</button>
	<!-- tabel data start -->
	<?php if (! empty($tabel_data)) : ?>
		<?php echo $tabel_data; ?>
	<?php endif ?>
	<br>
	<div class="w3-center">
	<?php echo $pagination; ?>
	</div>
  </div>
  
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" action="<?php echo base_url('admin/murid/tambah'); ?>" method="post">
        <div class="w3-section">
		<h3>Tambah Murid</h3>
        <label><b>Nama Murid</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama Murid" name="nama_murid" maxlength="32" value="" required>
		  <br>
		  <label><b>Kelas</b></label>
		  <select class="w3-input w3-border w3-margin-bottom" name="id_kelas" required>
		  <option value="">Pilih Kelas</option>
		  <?php foreach($kelas as $row) : ?>
			<option value="<?php echo $row['id_kelas']; ?>"><?php echo ucwords($row['nama_kelas']); ?></option>
		  <?php endforeach; ?>
		  </select>
          <br>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red w3-right">Cancel</button>
        <input type="submit" name="submit" value="Tambah Murid" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
      </div>
	  </form>

    </div>
  </div>
 </div>
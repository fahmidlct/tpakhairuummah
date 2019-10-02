<div class="w3-container w3-animate-opacity">
    <!--<h5><?php echo ucfirst($this->uri->segment(2)); ?></h5>-->
	
	<?php $flash_pesan = $this->session->flashdata('pesan')?>
	<?php if (! empty($flash_pesan)) : ?>
		<div class="w3-panel w3-green">
			<h3>Berhasil!</h3>
			<p><?php echo $flash_pesan; ?></p>
		</div>
	<?php endif ?>
	<?php 
	$flash_error = $this->session->flashdata('error');
	/*if($flash_error == 'The filetype you are attempting to upload is not allowed.')
	{
		$flash_error = 'Format file yang diupload harus berupa jpeg / jpg!';
	}
	elseif($flash_error = 'The image you are attempting to upload doesn\'t fit into the allowed dimensions.')
	{
		$flash_error = 'Dimensi gambar maksimal 1024 x 768!';
	}*/
	?>
	<?php if (! empty($flash_error)) : ?>
		<div class="w3-panel w3-red">
			<h3>Error!</h3>
			<p><?php echo $flash_error; ?></p>
		</div>
	<?php endif ?>
	<?php if (! empty($pesan)) : ?>
		<div class="w3-panel w3-orange">
			<h4><i class="fa fa-exclamation-circle"></i> <?php echo $pesan; ?></h4>
		</div>
	<?php endif ?>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-large w3-right w3-blue" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah Kegiatan</button>
	<!-- tabel data start -->
	<?php if (! empty($tabel_data)) : ?>
		<?php echo $tabel_data; ?>
	<?php endif ?>
	
  </div>
  
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Tutup">&times;</span>
      </div>

      <form class="w3-container" action="<?php echo base_url('admin/kegiatan/tambah'); ?>" enctype="multipart/form-data" method="post">
        <div class="w3-section">
		<h3>Tambah Kegiatan</h3>
        <label><b>Nama Kegiatan</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nama Kegiatan" name="nama_kegiatan" maxlength="100" value="" required>
		<br>
		<label><b>Upload Foto Kegiatan</b></label>
		<input class="w3-input w3-border w3-margin-bottom" type="file" name="gambar_kegiatan" accept="image/jpeg" required />
		<div class="w3-panel w3-red w3-small">
		<p><i class="fa fa-exclamation-circle"></i> Upload foto harus berupa gambar dengan format .jpg / .jpeg dengan ukuran maksimal 300Kb (1024 x 768)!</p>
		</div>
		<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red w3-right">Cancel</button>
        <input type="submit" name="submit" value="Tambah Kegiatan" class="w3-button w3-blue w3-right" style="margin-right: 8px;" >
      </div>
	  </form>

    </div>
  </div>
 </div>
 
 <!-- The Modal/Lightbox -->
<div id="myModal" class="w3-modal"> 
  
  <div class="modal-content">
	<span class="close cursor" onclick="closeModal()">&times;</span>
	<?php 
	$current = 0;
	foreach($kegiatan as $row): 
	?>
    <div class="mySlides">
      <div class="numbertext"><?php echo ++$current; ?> / <?php echo $jumlah; ?></div>
      <img src="<?php echo base_url('asset/image/') . $row->foto; ?>" style="width:100%;">
	  <div class="caption-container">
		<p id="caption"><?php echo ucwords($row->nama_kegiatan); ?></p>
	  </div>
    </div>
	<?php endforeach ?>
	<!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
	
	</div>
	
</div>

<!-- lightbox javascript -->
<script type="text/javascript">
// Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
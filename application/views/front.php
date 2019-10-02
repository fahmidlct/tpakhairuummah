<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title><?php echo $profil['nama_sekolah']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="<?php echo base_url('asset/css/w3.css'); ?>">-->
<link rel="stylesheet" href="asset/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<!-- mapbox -->
<script src='https://static-assets.mapbox.com/gl-pricing/dist/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

<style>
html { scroll-behavior: smooth;}
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}

/* lightbox */

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1001;
  //padding-top: 100px;
  padding-top: 60px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 50%;
  //width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
  background-color: rgba(0, 0, 0, 0.4);
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

/* ---------------- */



/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    opacity: 0.7;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('asset/image/1.jpeg');
    min-height: 100%;
}

/* Second image (Portfolio) */
.bgimg-2 {
    background-image: url("asset/image/4.jpeg");
    min-height: 400px;
}

/* Third image (Contact) */
.bgimg-3 {
    background-image: url("asset/image/3.jpeg");
    min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}
.w3-bold {font-weight: 700;}
.w3-font-red {color: #F44336!important;}

.title-map{
	color: firebrick;
	font-size: 9px;
}

/* Turn off parallax scrolling for tabletablets and mobiles */
@media only screen and (max-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}

#top{
	position: fixed;
	bottom: 10px;
	right: 10px;
	border-radius: 3px;
	padding: 6px 10px;
	font-size: 14px;
	text-align: center;
	color: #fff;
	background-color: #000;
	opacity: .4;
	filter: alpha(opacity=40);
	text-decoration: none;
	z-index: 999;
	-webkit-transition: .4s ease;
	-moz-transition: .4s ease;
	-o-transition: .4s ease;
	-ms-transition: .4s ease;
}

</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top" style="z-index: 1000;">
  <ul class="w3-navbar w3-white w3-animate-top" style="box-shadow: 1px 1px 4px rgb(0,0,0,.3);" id="myNavbar">
    <li><a href="#index" class="smoothscroll w3-padding-large w3-hover-blue w3-bold"><i class="fa fa-home"></i></a></li>
    <li><a href="#kelas" class="smoothscroll w3-padding-large w3-hover-blue w3-bold w3-hide-small">KELAS</a></li>
    <li><a href="#kegiatan" class="smoothscroll w3-padding-large w3-hover-blue w3-bold w3-hide-small">KEGIATAN</a></li>
    <!--<li><a href="#guru" class="smoothScroll w3-padding-large w3-hover-blue w3-bold">GURU</a></li>-->
    <li><a href="#tentang_kami" class="smoothscroll w3-padding-large w3-hover-blue w3-bold w3-hide-small">TENTANG KAMI</a></li>
    <li><a href="#donasi" class="smoothscroll w3-padding-large w3-hover-blue w3-bold w3-hide-small">DONASI</a></li>
    <?php if( ! empty($profil['instagram'])) : ?>
	<li class="w3-hide-small w3-right">
      <a href="<?php echo $profil['instagram']; ?>" target="_blank" title="<?php echo $profil['instagram']; ?>" class="w3-padding-large w3-hover-pink"><i class="fa fa-instagram"></i></a>
    </li>
	<?php endif ?>
	<?php if( ! empty($profil['facebook'])) : ?>
	 <li class="w3-hide-small w3-right">
      <a href="<?php echo $profil['facebook']; ?>" target="_blank" title="<?php echo $profil['facebook']; ?>" class="w3-padding-large w3-hover-indigo"><i class="fa fa-facebook"></i></a>
    </li>
	<?php endif ?>
  </ul>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-opacity w3-display-container" id="index">
  <div class="w3-display-middle" style="white-space:nowrap;">
	<h3 class="w3-center w3-padding-xlarge w3-green w3-xlarge w3-wide w3-animate-opacity"><?php echo $profil['nama_sekolah']; ?></h3>
  </div>
</div>

<!-- Container (About Section) -->
  <h3 class="w3-center w3-font-red w3-bold" style="margin-top: 60px;" id="home"><span class="w3-border-red w3-bottombar" style="padding-bottom: 8px; font-size: 42px;"><?php echo $profil['judul_kata_pembuka']; ?></span></h3>
<div class="w3-content w3-container w3-padding-64">
  <p class="w3-center" style="font-size: 24px;"><?php echo $profil['kata_pembuka']; ?></p>
</div>

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container w3-padding-64" style="padding-right: 40px; padding-left: 40px; ">
  <h3 class="w3-center" style="color: orange; margin-top: 80px; background-color: rgb(0,0,0,0.6); border-radius: 8px; padding: 20px;"><span style="font-style: italic;">Barangsiapa yang menghendaki kebaikan di dunia maka dengan ilmu. Barangsiapa yang menghendaki kebaikan di akhirat maka dengan ilmu.  Barangsiapa yang menghendaki keduanya maka dengan ilmu (HR. Bukhori dan Muslim)</span></h3>
</div>

<div class="w3-content w3-container w3-padding-64" id="kelas" style="border-bottom: 2px dotted firebrick;">
  <h3 class="w3-center w3-font-red w3-bold" style="margin-bottom: 80px;"><span class="w3-border-red w3-bottombar" style="padding-bottom: 8px;">KELAS</span></h3>
  <div class="w3-row-padding w3-center">
	<?php 
		$i = 0;
		foreach ($kelas as $kelas_rows): 
		$i++;
	?>
	<a href="javascript:void(0)" onclick="openCity(event, '<?php echo ucwords($kelas_rows['nama_kelas']); ?>');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding <?php if($i == 1) echo ' w3-border-red'; else echo ''; ?>"><?php echo ucwords($kelas_rows['nama_kelas']); ?></div>
    </a>
	<?php endforeach; ?>
	
  </div>
  
  <?php 
	$i = 0;
	foreach ($kelas as $kelas_rows): 
	$i++;
  ?>
  <div id="<?php echo ucwords($kelas_rows['nama_kelas']); ?>" class="w3-container city w3-center w3-padding-32 w3-animate-bottom" style="<?php if($i == 1) echo 'display:block;'; else echo 'display:none;'; ?> ">
  
    <h2>Kelas - <b><?php echo ucwords($kelas_rows['nama_kelas']); ?></b></h2>
	<h3>Pengajar - <b><?php echo ucwords($kelas_rows['nama_guru']); ?></b></h3>
	<h4>Jumlah Murid : <u><?php echo $this->front->jumlah_murid($kelas_rows['id_kelas']); ?></u></h4>
    <table>
		<?php foreach($this->front->cari_murid($kelas_rows['id_kelas']) as $murid_rows): ?>
			<tr><td><span style="border-bottom: 1px dotted firebrick;"><?php echo ucwords($murid_rows['nama_murid']); ?></span></td></tr>
		<?php endforeach; ?>
	</table>
  </div>
  <?php endforeach; ?>
 
</div>
<!--</div>-->

<!-- Container (Portfolio Section) -->
<div class="w3-content w3-container w3-padding-64" id="kegiatan">
  <h3 class="w3-center w3-font-red w3-bold" style="margin-bottom: 80px;"><span class="w3-border-red w3-bottombar" style="padding-bottom: 8px;">KEGIATAN</span></h3>

  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
  <div class="w3-row-padding w3-center">
	<?php
	$i = 0;
	foreach($kegiatan as $kegiatan_rows): 
	$i++;
	?>
	<div class="w3-col m3" style="margin-bottom: 20px;">
      <img src="<?php echo base_url('asset/image/') . $kegiatan_rows['thumb']; ?>" style="width:100%" title="<?php echo $kegiatan_rows['nama_kegiatan']; ?>" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="w3-hover-opacity">
    </div>
	<?php endforeach; ?>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-closebtn w3-hover-red w3-text-white w3-xxxlarge w3-container w3-display-topright">&times;</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" style="max-width:100%">
  </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container w3-padding-64" style="padding-right: 40px; padding-left: 40px; ">
	<h3 class="w3-center" style="color: orange; margin-top: 80px; background-color: rgb(0,0,0,0.6); border-radius: 8px; padding: 20px;"><span style="font-style: italic;">”Barang siapa yang keluar untuk mencari ilmu maka ia berada di jalan Allah hingga ia pulang”. (HR. Turmudzi)</span></h3>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="tentang_kami" style="border-bottom: dotted 2px red;">
  <h3 class="w3-center w3-font-red w3-bold" style="margin-bottom: 20px;"><span class="w3-border-red w3-bottombar" style="padding-bottom: 8px;">Tentang Kami</span></h3>
  <!--<p class="w3-center"><em>I'd love your feedback!</em></p>-->

  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <!-- Add Mapbox-->
      <div id='map' style='width: 280px; height: 280px; border: 2px solid grey;'></div>
    </div>
    <div class="w3-col m8 w3-container w3-section">
      <div class="w3-large w3-margin-bottom">
        <span class="w3-bold"><i class="fa fa-map-marker w3-hover-text-black" style="width:30px"></i> Alamat</span><br>
		<p>
			<?php echo $profil['alamat']; ?>
		</p>
		<i class="fa fa-envelope w3-hover-text-black" style="width:30px"></i> Kode Pos : <?php echo $profil['kode_pos']; ?><br>
        <i class="fa fa-phone w3-hover-text-black" style="width:30px"></i> Telepon : <?php echo $profil['no_telepon']; ?><br>
        <i class="fa fa-at w3-hover-text-black" style="width:30px"> </i> Email : <?php echo $profil['email']; ?><br>
      </div>
    </div>
  </div>
</div>


<div class="w3-content w3-container w3-padding-128 w3-center" id="donasi">
	<h4>Bantuan dalam bentuk apapun dari Anda dapat memajukan pendidikan di TPA KHAIRUUMMAH</h4>
	<h3 onclick="changeText(this)" class="w3-btn w3-green w3-padding-large w3-hover-blue">Klik Untuk Donasi</h3>
</div>

<!-- Footer -->
<footer class="w3-center w3-blue w3-padding-48">
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">W3 CSS</a></p>
</footer>

<a href="#index" id="top" title="Back to top" class="smoothscroll w3-hover-red w3-bold"><i class="fa fa-arrow-up"></i></a>

<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
	
	<?php
	$i = 0;
	foreach($kegiatan as $kegiatan_rows):
	$i++;
	?>
    <div class="mySlides">
      <div class="numbertext"><?php echo $i; ?> / <?php if($this->front->jumlah_kegiatan() > 8) echo 8; else echo $this->front->jumlah_kegiatan(); ?></div>
      <img src="<?php echo base_url('asset/image/') . $kegiatan_rows['foto']; ?>" style="width:100%">
	  <div class="caption-container">
		<p id="caption"><?php echo ucwords($kegiatan_rows['nama_kegiatan']); ?></p>
	  </div>
    </div>
	<?php endforeach; ?>

    <!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

  </div>
</div>

<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoidHBha2hhaXJ1dW1tYWgiLCJhIjoiY2p1aGtkdmZ0MTB0eTQ5cGJyOG5xMGp3dyJ9.Xpe_8gk2jlB2TDGYY8FRRg';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
	center: [119.43, -5.17], // starting position
	zoom: 14, // starting zoom
	minzoom: 8,
	maxzoom: 19,
  });
  
  var marker = new mapboxgl.Marker()
  .setLngLat([119.43, -5.17])
  .addTo(map);
  
  var markerHeight = 50, markerRadius = 10, linearOffset = 25;
  var popupOffsets = {
	'top': [0, 0],
	'top-left': [0,0],
	'top-right': [0,0],
	'bottom': [0, -markerHeight],
	'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
	'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
	'left': [markerRadius, (markerHeight - markerRadius) * -1],
	'right': [-markerRadius, (markerHeight - markerRadius) * -1]
 };
 
  var popup = new mapboxgl.Popup({offset: popupOffsets, className: 'title-map'})
  .setLngLat([119.43, -5.17])
  .setHTML("<h6><?php echo $profil['nama_sekolah']; ?></h6>")
  .addTo(map);
</script>

<script>

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}

// Change style of navbar on scroll
<!--window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-navbar" + " w3-card-2" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card-2", "");
    }
}-->

</script>

<script type="text/javascript">
function changeText(id) {
  id.innerHTML = '<i class="fa fa-phone w3-hover-text-black" style="width:30px"></i> <?php echo $profil['nomor_kontak']; ?> - <?php echo $profil['penerima_donatur']; ?><br> <?php if(cek_array($profil['no_rekening'])) foreach(explode(",", $profil['no_rekening']) as $rows) { echo '<i class="fa fa-credit-card w3-hover-text-black" style="width:30px"></i> ' . $rows . '<br>';} else echo '<i class="fa fa-credit-card w3-hover-text-black" style="width:30px"></i> ' .  $profil['no_rekening']; ?>';
}
</script>

<script>
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
    $('#top').css({'opacity':(( 1000-scroll )/1000)});
};
//window.onscroll = function() {myFunction(), hilang()};

function hilang() {
	if($(this).scrollTop() > 200) {
		$('#top').fadeIn();
	} else {
		$('#top').fadeOut();
	}
}
</script>

<!-- Smooth Scroll -->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".smoothscroll").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

<!-- tab kelas -->
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>

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

<!--<script type="text/javascript" src="asset/js/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script type="text/javascript" src="asset/js/smoothscroll.js"></script>-->

</body>
</html>
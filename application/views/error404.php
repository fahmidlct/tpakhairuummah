<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

</style>
</head>
<body>

<div style="width: 30%; margin: 160px auto 0; border: 1px solid #ddd; box-shadow: 1px 1px 4px #888888;" class="w3-animate-top">

	<div class="container">
		<div class="w3-panel w3-red">
			<h3><i class="fa fa-exclamation-circle"></i> Halaman yang Anda cari tidak ditemukan!</h3>
			<p>Kembali ke halaman awal <a href="<?php echo base_url(); ?>">TPA KHAIRUUMMAH</a></p>
		</div>
	</div>

</div>

</body>
</html>

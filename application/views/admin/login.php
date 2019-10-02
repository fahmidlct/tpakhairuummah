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

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

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

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<div style="width: 30%; margin: 40px auto 0; border: 1px solid #ddd; box-shadow: 1px 1px 4px #888888;" class="w3-animate-opacity">

<?php 

$attributes = array('name' => 'login_form', 'id' => 'login_form');
//echo form_open('login', $attributes);
?>
<form action="" method="post" name="form_login">
  <div class="imgcontainer">
    <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

<?php if ( ! empty($pesan)) : ?>
<div class="w3-panel w3-red" style="margin: 0 20px; padding: 10px;">
	<?php echo $pesan; ?>
</div>
<?php endif; ?>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" value="<?php echo set_value('username'); ?>" autofocus required>
	<?php echo form_error('username', '<p class="field_error">', '</p>'); ?>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="<?php echo set_value('password'); ?>" required>
    <?php echo form_error('password', '<p class="field_error">', '</p>'); ?>
    <button type="submit">Login</button>
  </div>

</form>
</div>

</body>
</html>

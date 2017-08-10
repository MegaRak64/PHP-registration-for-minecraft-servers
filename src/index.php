<?php
session_start();
?>
<?php
if( isset( $_POST['logout'] ) )
 {
unset($_SESSION['username']);
unset($_SESSION['id']);
 }
?>
<html>
<head>
<title>A Minecraft Server</title>
<link rel="stylesheet" type="text/css" href="/modal.css">
<link rel="stylesheet" type="text/css" href="/main.css">
<link rel="shortcut icon" href="/sword.png" type="image/png">
<script src="/blockrmb.js"></script>
</head>
<body>

<center>
<?php
if (empty($_SESSION['username']) or empty($_SESSION['id']))
{
echo "<div id='menu'><center><h1><label id='a' for='Login'>Sing in</label></h1><h1 id='a'>or</h1><h1><label id='a' for='Register'>Sing up</label></h1></center></div>";
}
else
   {
   echo "<div id='header'><h3><label for='LK'><aclass='help' id='a'>[Settings]</a></label>/<label for='Login'><a class='help' id='a'>[Re-login]</a></label></h3></div><iframe frameborder='0' height='95%' width='100%' src='/lk.php' ></iframe>";
   }
?>
</center>

</body>
	<div class="modal">
  <input class="modal-open" id="Login" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="Login"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Sing in</h2>
        <label class="butt-close" for="Login" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
        <p>
		<center><form action="testreg.php" method="post">
  <p>
    <label>User name:<br></label>
    <input name="username" type="text" size="15" maxlength="15"><br><br>
  </p>
  <p>
    <label>Password:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p></center>
		</p>
      </div>
      <div class="modal-footer">
	  <p>
<input type="submit" name="submit" value="Login">
</p></form>
      </div>
    </div>
  </div>
</div>

	<div class="modal">
    <input class="modal-open" id="Register" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="Register"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Registration</h2>
        <label class="butt-close" for="Register" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
        <p><center><form action="save_user.php" method="post">
  <p>
    <label>User name:<br></label>
    <input name="username" type="text" size="15" maxlength="15"><br><br>
  </p>
  <p>
    <label>Password:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p></center>
      </div>
      <div class="modal-footer">
	  <p>
<input type="submit" name="submit" value="Register">
</p></form></p>
      </div>
    </div>
  </div>
 </div>
 
 	<div class="modal">
  <input class="modal-open" id="LK" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="LK"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Account Settings</h2>
        <label class="butt-close" for="LK" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
        <p><form action="chpass.php" method="POST">
  <p>
    <label>Old password:<br></label>
    <input name="password" type="password" size="15" maxlength="15"><br><br>
  </p>
  <p>
    <label>New password:<br></label>
    <input name="newpassword" type="password" size="15" maxlength="15">
  </p></center>
      </div>
      <div class="modal-footer">
	  <p>
	<input type="submit" name="submit" value="Change Password"></p></form></p>
	<form method="POST">
    <input type="submit" name="logout" value="Logout" />
	</form>
	  </p>
      </div>
    </div>
  </div>
</div>
 
</html>

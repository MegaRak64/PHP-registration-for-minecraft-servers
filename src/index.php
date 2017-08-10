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
<title>The Forgotten Past | Сервер Minecraft</title>
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
echo "<div id='menu'><center><h1><label id='a' for='Login'>Войдите</label></h1><h1 id='a'>или</h1><h1><label id='a' for='Register'>Зарегистрируйтесь</label></h1></center></div>";
}
else
   {
   echo "<div id='header'><h3><label for='LK'><aclass='help' id='a'>[Управление]</a></label>/<label for='Login'><a class='help' id='a'>[Перезайти]</a></label></h3></div><iframe frameborder='0' height='95%' width='100%' src='/lk.php' ></iframe>";
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
        <h2>Вход</h2>
        <label class="butt-close" for="Login" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
        <p>
		<center><form action="testreg.php" method="post">
  <p>
    <label>Ваш логин:<br></label>
    <input name="username" type="text" size="15" maxlength="15"><br><br>
  </p>
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p></center>
		</p>
      </div>
      <div class="modal-footer">
	  <p>
<input type="submit" name="submit" value="Войти">
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
        <h2>Регистрация</h2>
        <label class="butt-close" for="Register" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
        <p><center><form action="save_user.php" method="post">
  <p>
    <label>Ваш логин:<br></label>
    <input name="username" type="text" size="15" maxlength="15"><br><br>
  </p>
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p></center>
      </div>
      <div class="modal-footer">
	  <p>
<input type="submit" name="submit" value="Зарегистрироваться">
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
        <h2>Управление</h2>
        <label class="butt-close" for="LK" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
        <p><form action="chpass.php" method="POST">
  <p>
    <label>Старый пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15"><br><br>
  </p>
  <p>
    <label>Новый пароль:<br></label>
    <input name="newpassword" type="password" size="15" maxlength="15">
  </p></center>
      </div>
      <div class="modal-footer">
	  <p>
	<input type="submit" name="submit" value="Сменить пароль"></p></form></p>
	<form method="POST">
    <input type="submit" name="logout" value="Выход из аккаунта" />
	</form>
	  </p>
      </div>
    </div>
  </div>
</div>
 
</html>

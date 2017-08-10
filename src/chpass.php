
<script language = 'javascript'>
  var delay = 1000;
  setTimeout("document.location.href='/'", delay);
</script>
<?php
session_start();

if (isset($_SESSION['username'])) { $username = $_SESSION['username']; if ($username == '') { unset($username);} } //заносим введенный пользователем логин в переменную $username, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['newpassword'])) { $newpassword=$_POST['newpassword']; if ($newpassword =='') { unset($newpassword);} }


if (empty($username))
{
exit ("Вы не авторизованы!");
}
if (empty($newpassword) or empty($password))
{
exit ("Вы ввели не всю информацию, венитесь <a href='/'>назад</a> и заполните все поля!");
}

$username = stripslashes($username);
$username = htmlspecialchars($username);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$newpassword = stripslashes($newpassword);
$newpassword = htmlspecialchars($newpassword);

$username = trim($username);
$password = trim($password);
$newpassword = trim($newpassword);
$lenghtpass= strlen($newpassword);
if ($lenghtpass < 5)
{
exit ("Пароль не должен быть короче 5 символов!");
}
$hash= hash('SHA512', $newpassword);
$newpassword= $hash;

include ("bd.php");


$result = mysql_query("SELECT * FROM users WHERE realname='$username'",$db);
$myrow = mysql_fetch_array($result);
$iddd= $myrow['id'];
if (empty($myrow['password']))
{

exit ("Извините, введённый вами логин или пароль неверный! <a href='/'>Главная страница</a>");
}
else {

          if ($myrow['password']==hash('SHA512', $password)) {

	$resulttt= mysql_query ("UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`id` = $iddd");
	echo "Пароль успешно изменен, <a href='/'>Перезайдите</a>!";
	unset($_SESSION['username']);
	unset($_SESSION['id']);
          }

       else {

       exit ("Извините, введённый вами пароль неверный! <a href='/'>Главная страница</a>");
	   }
}
?>

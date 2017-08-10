
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
exit ("You not autorited");
}
if (empty($newpassword) or empty($password))
{
exit ("Login or password empty");
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
exit ("Password short! minimal lenght 5 simbols!");
}
$hash= hash('SHA512', $newpassword);
$newpassword= $hash;

include ("bd.php");


$result = mysql_query("SELECT * FROM users WHERE realname='$username'",$db);
$myrow = mysql_fetch_array($result);
$iddd= $myrow['id'];
if (empty($myrow['password']))
{

exit ("Login uncorrect");
}
else {

          if ($myrow['password']==hash('SHA512', $password)) {

	$resulttt= mysql_query ("UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`id` = $iddd");
	echo "Password successful changed, <a href='/'>re-login</a>!";
	unset($_SESSION['username']);
	unset($_SESSION['id']);
          }

       else {

       exit ("Password uncorrect");
	   }
}
?>

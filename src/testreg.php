
<script language = 'javascript'>
  var delay = 1000;
  setTimeout("document.location.href='/'", delay);
</script>
<?php
session_start();

if (isset($_POST['username'])) { $username = $_POST['username']; if ($username == '') { unset($username);} } //заносим введенный пользователем логин в переменную $username, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }


if (empty($username) or empty($password)) 
{
exit ("Вы ввели не всю информацию, венитесь <a href='/'>назад</a> и заполните все поля!");
}

$username = stripslashes($username);
$username = htmlspecialchars($username);

$password = stripslashes($password);
$password = htmlspecialchars($password);


$username = trim($username);
$password = trim($password);

include ("bd.php");



$result = mysql_query("SELECT * FROM users WHERE realname='$username'",$db); 
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{

exit ("Извините, введённый вами логин или пароль неверный! <a href='/'>Главная страница</a>");
}
else {

          if ($myrow['password']==hash('SHA512', $password)) {

          $_SESSION['username']=$myrow['realname']; 
          $_SESSION['id']=$myrow['id'];
          echo "Вы успешно вошли на сайт! <a href='/'>Главная страница</a>";
          }

       else {

       exit ("Извините, введённый вами логин или пароль неверный! <a href='/'>Главная страница</a>");
	   }
}
?>

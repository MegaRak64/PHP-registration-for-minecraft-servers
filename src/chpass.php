
<script language = 'javascript'>
  var delay = 1000;
  setTimeout("document.location.href='/'", delay);
</script>
<?php
session_start();

if (isset($_SESSION['username'])) { $username = $_SESSION['username']; if ($username == '') { unset($username);} } //заносим введенный пользователем логин в переменную $username, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['newpassword'])) { $newpassword=$_POST['newpassword']; if ($newpassword =='') { unset($newpassword);} }

//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($username))
{
exit ("Вы не авторизованы!");
}
if (empty($newpassword) or empty($password))
{
exit ("Вы ввели не всю информацию, венитесь <a href='/'>назад</a> и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$username = stripslashes($username);
$username = htmlspecialchars($username);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$newpassword = stripslashes($newpassword);
$newpassword = htmlspecialchars($newpassword);
//удаляем лишние пробелы
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
// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 



$result = mysql_query("SELECT * FROM users WHERE realname='$username'",$db); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);
$iddd= $myrow['id'];
if (empty($myrow['password']))
{
//если пользователя с введенным логином не существует
exit ("Извините, введённый вами логин или пароль неверный! <a href='/'>Главная страница</a>");
}
else {
//если существует, то сверяем пароль
          if ($myrow['password']==hash('SHA512', $password)) {
          //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
	//mysql_query ("UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`id` = $myrow['id']")
	$resulttt= mysql_query ("UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`id` = $iddd");
	echo "Пароль успешно изменен, <a href='/'>Перезайдите</a>!";
	unset($_SESSION['username']);
	unset($_SESSION['id']);
          }

       else {
       //если пароли не сошлись
       exit ("Извините, введённый вами пароль неверный! <a href='/'>Главная страница</a>");
	   }
}
?>

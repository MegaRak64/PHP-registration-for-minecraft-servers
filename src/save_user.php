<script language = 'javascript'>
  var delay = 1000;
  setTimeout("document.location.href='/'", delay);
</script>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
</body>
</html>

<?php
if (isset($_POST['username'])) { $username = $_POST['username']; if ($username == '') { unset($username);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($username) or empty($password))
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}

$username = stripslashes($username);
$username = htmlspecialchars($username);

$password = stripslashes($password);
$password = htmlspecialchars($password);


$username = trim($username);
$password = trim($password);
$lenghtpass= strlen($password);
if ($lenghtpass < 6)
{
exit ("У ТЕБЯ СЛИШКОМ КОРОТКИЙ");
}

$hash= hash('SHA512', $password);


include ("bd.php");


$result = mysql_query("SELECT id FROM users WHERE username='$username'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой! <a href='/#Register'>Регистрация</a> ");
}


$ip = $_SERVER['REMOTE_ADDR'];
$ip = stripslashes($ip);
$ip = htmlspecialchars($ip);
$realname = $username;
$username = mb_strtolower($realname);


$result2 = mysql_query ("INSERT INTO users (username,realname,password,ip) VALUES('$username','$realname','$hash','$ip')");

if ($result2=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='/'>Войти</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>

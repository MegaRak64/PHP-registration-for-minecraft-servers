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
exit ("Login or password is empty");
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
exit ("Password short! minimal lenght 5 simbols!");
}

$hash= hash('SHA512', $password);


include ("bd.php");


$result = mysql_query("SELECT id FROM users WHERE username='$username'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("This login already taken");
}


$ip = $_SERVER['REMOTE_ADDR'];
$ip = stripslashes($ip);
$ip = htmlspecialchars($ip);
$realname = $username;
$username = mb_strtolower($realname);


$result2 = mysql_query ("INSERT INTO users (username,realname,password,ip) VALUES('$username','$realname','$hash','$ip')");

if ($result2=='TRUE')
{
echo "Registration successful ";
}

else {
echo "Error your not registred";
     }
?>

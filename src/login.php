
<script language = 'javascript'>
  var delay = 1000;
  setTimeout("document.location.href='/'", delay);
</script>
<html>

<head>

<meta charset="UTF-8">


<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

<script type="text/javascript" src="/js/analytics.js"></script>

</head>

<body>


</body>

</html>





<?php

session_start();

if (isset($_POST['username'])) { $username = $_POST['username']; if ($username == '') { unset($username);} }

if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }





if (empty($username) or empty($password))

{

exit ("Uncorrect login or password");

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



exit ("Uncorrect login or password");

}

else {

          if ($myrow['password']==hash('SHA512', $password)) {

          $_SESSION['username']=$myrow['realname']; 

          $_SESSION['id']=$myrow['id'];

          echo "Well done <a href='/#LK'>Your profile</a>";

          }



       else {


	echo $hash ;

       exit ("Uncorrect login or password");

	   }

}

?>


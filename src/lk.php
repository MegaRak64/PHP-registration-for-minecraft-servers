<?php
session_start();
?>
<style>
body {background: #000000; }
header {color: white; }
p {color: white; }
img { border: 3px solid grey; background: white; }
</style>
<header>Личный Кабинет</header><br>
<script src="/blockrmb.js"></script>
<?php
if (empty($_SESSION['username']) or empty($_SESSION['id']))
{
echo "<p>Please <a href='/'>Sing in</a></p>";
}
else
   {
    echo "<p>Yor skin,&nbsp".$_SESSION['username']."<br><br><img src='https://minotar.net/body/".$_SESSION['username']."'>";

   }
?>
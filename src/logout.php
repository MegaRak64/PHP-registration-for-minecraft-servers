	  <?php
    if( isset( $_POST['logout'] ) )
    {
	unset($_SESSION['username']);
	unset($_SESSION['id']);
    }
	
		unset($_SESSION['username']);
	unset($_SESSION['id']);
	?>
<a href="/">Главная</a>
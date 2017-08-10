<?php
$password = 'SUKA';
$hash = password_hash($password, PASSWORD_DEFAULT, array("cost" => 10));
echo $hash;

if (password_verify($password, $hash)) {
    echo 'Password is valid!';
} else {
     echo 'Invalid password.';
}
?>

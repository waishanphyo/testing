<?php
session_start();
unset($_COOKIE['PHPSESSID']);
$cookiename="id";
$cookievalue=generateCookie();
if(!isset($_COOKIE[$cookiename])){
  setcookie($cookiename,$cookievalue,time() + (8 * 60));
 
}

function generateCookie() {
  return bin2hex(random_bytes(8));
}




?>
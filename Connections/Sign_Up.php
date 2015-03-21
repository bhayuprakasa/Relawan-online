<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Sign_Up = "localhost";
$database_Sign_Up = "relawan online";
$username_Sign_Up = "root";
$password_Sign_Up = "";
$Sign_Up = mysql_pconnect($hostname_Sign_Up, $username_Sign_Up, $password_Sign_Up) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
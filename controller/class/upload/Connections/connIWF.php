<?php $publicPath = "/public/"; ?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connIWF = "localhost";
$database_connIWF = "indiga_geofertas";
$username_connIWF = "root";
$password_connIWF = "";
$connIWF = mysql_pconnect($hostname_connIWF, $username_connIWF, $password_connIWF) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
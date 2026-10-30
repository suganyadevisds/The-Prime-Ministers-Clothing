<?php
define('DB_SERVER','localhost');
define('DB_USER','theprime_tpm');
define('DB_PASS' ,'Tpmc@221327');
define('DB_NAME', 'theprime_tpm');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
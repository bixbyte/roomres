<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UEAB RoomRes| Residence Report</title>
<link rel="icon"  href="favicon.ico"  /></head>

<body style=" background-image:url(printable.fw.png) !important;">
<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/

@session_start();
$id = "printable_lists";
include "lists_generator.php";
$list = new listgen();
?>
</body>
</html>
<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/

@session_start();
$id = "printable_lists";
include "lists_generator.php";
$list = new listgen();
$list->single(@$_REQUEST['resid']);
?>

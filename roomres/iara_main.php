<?php
@session_start();
@$_SESSION['timeout'] = time();

$c0m1 = @$_REQUEST['c0m1'];

switch($c0m1){
	case "backup":
		include "backup.php";
		$c = new bkup(true);
		unset($c); 
	break;
	
	case "clean":
		include "unlinker.php";
		$avi = new cleaner(21,true,array("iarec,exe,iso"));
		unset($avi);
	break;
	
	case "restore":
		include "restore_latest.php";
		$raise = new restore(true,"146450f7");
		unset($raise); 
	break;
	
	default:
		@session_destroy();
		echo '<script>alert("Failed to Identify Command!");</script>';
		echo '<script>window.close();</script>';
	break;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="icon"  href="favicon.ico"  /></head>

<body style="background-image:url(printable.fw.png) !important;">
<?php
	include "admin_tools.php";
	
	if(((@$_POST['p'] != 1 && @$_POST['p'] != 2  && @$_POST['p'] != 3))){
		
		if(@$_POST['a_pass'] != ''){
			
			$id = "ad_del.php";
			$connect = true;
			include "main.php";
			
			$olps = $_SESSION['passwd']; 
			$psk = new obsfucate(@$_POST['a_pass'],"make_password");
			
			if($olps == $_SESSION['passwd']){
				
				$connection->query("DELETE FROM admin WHERE id='$_POST[p]' ",true);
				
				if($_SESSION['query']){
					echo '<script>alert("deleted!"); history.back(); </script>';	
				}
				
			}else{
				die('<script>alert("Password Authentication error"); history.back();</script>');
			}
			
		}else{
			die('<script>alert("Enter your password to continue!"); history.back();</script>');
		}
	}
	
	
	
?>
</body>
</html>
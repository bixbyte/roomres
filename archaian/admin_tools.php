<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/
	@session_start();
	
	//Limit Access to Loged In Administrators only.
	if(@$_SESSION['u56_a_idnum'] == '' || @$_SESSION['u56_s_idnum'] != ''){
		
		if(@$_SESSION['154dm1n']){
					//make sure that the password provided is the same as that in the database
					if(@$_SESSION['u56_passwd'] != @$_SESSION['passwd']){
						echo '<script> alert("There was a problem granting you secure access\n\n Please Login again"); </script>';
						include "redirect.php";
						$fly_away = new redirect("proc_adds.php?act=logout&to=c_login.php");
						exit; 
					}
		}else{
			
			include "redirect.php";
				$go_away = new redirect("c_login.php");
			die;
			
	}
		
		die('<h2>
				<code> STuck In Limbo!!! </code>
			</h2>
			<h4>
				.. .. .. 
				<code> You better Pray. </code>
			</h4>
			 <br />
			 <br />
			 <br />
             <a style="text-align:right; text-decoration:none;" href="proc_adds.php?act=logout&to=c_login.php">
			 <button id="repent" onClick="javascript:alert();" > repen+ </button>
             </a>
			 ');
				
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Administrators</title>

<style>
	#txt {
		width:150px;
		height:30px;
		text-align:center;
		font-family:"Courier New", Courier;
		border:groove;
		border-color:#390;
		border-radius:4px;
	}
	#chkz {
		width:100px;
		height:25px;
		border:groove;
		border-radius:5px;
		background-color:transparent;
		border-color:#F00;		
	}
	body{
		background-image:url(printable.fw.png) !important;
	}
	a {
	 color:#CCC !important;
	}
	 a:hover{
	 color:#000 !important;
 	}
 	#Tabs1 {
	 background-image:url(printable.fw.png) !important; 
	}
	 button:hover {
	 color:#0CF !important;
	 background-color:#009 !important;
	 border:groove !important;
	 border-radius:12px; 
	}
 	button {
	 border-radius:12px !important; 
	 border:groove !important;
	  color:#009 !important;
	 }
		 
	
</style>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.tabs.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.tabs.custom.min.js" type="text/javascript"></script>
<link rel="icon"  href="favicon.ico"  /></head>

<body >
<?php
//Ensure that the user is a loged in administrator
	include "admin_tools.php";
	
	//Include The Connection&trade; Framework Files
	$id = "manage_admin.php";
	$connect = true;
	include "main.php";
?>
<div style="width:70px; border:groove; height:20px; margin-top:0px; border-radius:4px; cursor:pointer; background:#CCC; margin-top:0px;" align="center" onClick="javascript:window.location='cpanel.php';" >

	<code><b> Home </b></code>

</div>
<div id="Tabs1">
  <ul>
    <li><a href="#tabs-2">ALTER DETAILS</a></li>
    <li><a href="#tabs-1">DELETE ADMIN</a></li>
  </ul>
  
  <div id="tabs-1">
	<br /><br />
    <?php
	//filter for top residential admin only 
	if($_SESSION['u56_id'] == 1 || $_SESSION['u56_id'] == 2 || $_SESSION['u56_id'] == 3 ){

		//Getting all admin data save for the first 3 defaults
		//Add " AND gender='$_SESSION[u56_gender]' "  to limit the results in the gender
		$qry = "SELECT * FROM admin WHERE (id<>1 AND id<>2 AND id<>3)";
		$connection->num_rows($qry,true);
		//AND gender='$_SESSION[u56_gender]'
		if($_SESSION['num_rows'] <> 0){
			
			$connection->query($qry, true);
			$ad_list = $_SESSION['query'];
			
			//Generate a list of the admin that suit that criteria
			while($admin = mysqli_fetch_array($ad_list)){
				echo '
						<form action="ad_del.php" method="post">
							<table width="70%">
								<tr>
									<td><input type="text" id="txt" name="a_name" style="width:250px !important;" disabled value="'.$admin['name'].'" /></td>
									<td><input type="text" id="txt" name="a_id" disabled value="'.$admin['a_idnum'].'" /></td>
									<td><input type="password" id="txt" name="a_pass" style="border-color:#F00 !important; width:250px !important;" placeholder="Your Password Here" /> </td>
									<input type="hidden" value="del" name="act" />
									<input type="hidden" value="'.$admin['id'].'" name="p" /> 
									<td> 
										<input type="submit" id="chkz" value="Delete" />
									</td>
								</tr>
							</table>
						</form>
						<br />
					';
			}
			
		}else{
			echo "<code style='color:#F00;'><h2>There are no administrators to delete!</h2></code> <br /><br /> <a href='new_admin.php'><button>ADD ADMINISTRATOR</button></a>";
		}
		
	}else{
		echo '<code style="color:#F00;" ><h3>Please Log In as the main residence administrator!</h3></code>';
	}

?>
   
   
  </div>
  <div id="tabs-2">
   <!-- <p>*** STILL COOKING! ***</p> -->
    <br />
    
    <?php
	
		//Filter the various admin levels. 
		//First three defined have NEAR wildcard access!
		if($_SESSION['u56_id'] == 3 || $_SESSION['u56_id'] == 2 ||$_SESSION['u56_id'] == 1){
			
			//Capture the current user id and use it to compute the other two
			if($_SESSION['u56_id'] == 1){$b4 = 2; $aftr = 3;}
			elseif($_SESSION['u56_id'] == 2){$b4 = 1; $aftr = 3;}
			elseif($_SESSION['u56_id'] == 3){$b4 = 1; $aftr = 2;}
						
			$connection->query("SELECT * FROM admin WHERE id<>'$b4' AND id<>'$aftr' ",true);
			$ira_admin = $_SESSION['query'];
			
			echo '<table width="75%" align="center" >
					<tr style="color:#F00;">
						<td>Name</td>
						<td>Email</td>
						<td>Login username</td>
						<td>Password</td>
						<td></td>
					</tr>';
			while($result = mysqli_fetch_array($ira_admin)){
				
				echo '
					 <tr >
						<form action="proc_adds.php" method="post" >
							<td><input style="color:gray;"  class="txt" type="text" value="'.$result['name'].'" name="name" required /></td>
							<td><input style="color:gray;"  class="txt" type="text" value="'.$result['email'].'" name="email" required /></td>
							<td><input style="color:gray;"  class="txt" type="text" value="'.$result['a_idnum'].'" name="username" required /></td>
							<td><input style="color:gray;"  class="txt" type="password" value="'.$result['paski'].'" name="passwd" required /></td>
							<input type="hidden" name="act" value="adminUpdate" />
							<input type="hidden" name="apos" value="'.$result['id'].'" />
							<td><input style="color:gray;"  class="btn" type="submit" value="Update" id="btn" />	</td>
						</form>
					 </tr>
					 <tr height="25px"></tr>
					
					';
				
			}
			echo '</table>';
			
		}else{
			//The others only have access to their account details.
			
		}
	
	
	
	?>
    
    
    
  </div>
  
</div>


<script type="text/javascript">
$(function() {
	$( "#Tabs1" ).tabs(); 
});
</script>
</body>
</html>
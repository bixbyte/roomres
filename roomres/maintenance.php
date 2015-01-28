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
    <li><a href="#tabs-1">HOUSE KEEPING TOOLS</a></li>
  </ul>
  
  <div id="tabs-1">
	
    <p>
    	<button id="Button17" class="disable_res" onClick="">Restore Database</button><br /><br />
       	<button id="Button18" class="enable_res" onClick="">DataBase Backup</button><br /><br />
     	<button id="Button19" class="disable_res" onClick="">Clear Old Backup Files</button><br /><br />
    </p>
   
   
  </div>
  
  
</div>


<script type="text/javascript">
$(function() {
	$( "#Tabs1" ).tabs(); 
});
</script>
</body>
</html>
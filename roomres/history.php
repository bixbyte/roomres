<?php
	@session_start();
	
	if(@$_SESSION['l031n45'] == ''){
		
		include "redirect.php";
		$go = new redirect("login.php");
		die();
		
	}
	if(@$_SESSION['u56_a_idnum'] != ''){
		include "redirect.php";
		$flee = new redirect("cpanel.php");
		exit;
	}
	
?>
<!DOCTYPE HTML>
<html>
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="form_init.js" id="form_init_script"
    data-name="">
    </script>
    <link rel="stylesheet" type="text/css" href="default.css"
    id="theme" />
    <title>
    </title>
  <link rel="icon"  href="favicon.ico"  /></head>
  
  <body><style>#docContainer .fb_cond_applied{ display:none; }</style><noscript><style>#docContainer .fb_cond_applied{ display:inline-block; }</style></noscript><form  id="docContainer"
action="" enctype="multipart/form-data" method="POST" >
  <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
    <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="image_default.png"/></a>
  </div>
  <div class="section" id="section1">
    <div class="column ui-sortable" id="column1">
    
      
      <div class="fb-item fb-100-item-column" id="item1" style="height: 50px; min-height: 5px;">
        <div class="fb-spacer">
          <div id="item1_div_0">
          
          </div>
        </div>
      </div>
      <div>
          <div style="float:left;">
			  <?php $id = 'panel.php'; 	echo "<b>Welcome </b> <code style='text-transform:uppercase;'>".(@htmlentities($_SESSION['l031n45']));	echo ' </code>'; ?>
              	
          </div>
          <div style="float:right;">
          	<b><a href="panel.php" style="text-decoration:none; color:#999;"> Reservation Panel </a> </b> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <a style="text-align:right; text-decoration:none;" href="proc_adds.php?act=logout"> Logout </a>
          </div>
      </div>
      <div class="fb-item" id="item3">
        <div class="fb-sectionbreak">
          <hr style="max-width: 960px;">
        </div>
      </div>
<br /><br /><br /><br />
<table width="90%">
<tr >
    <td align="center"><b>Trimester</b></td>
    <td align="center"><b>Room Number</b></td>
    <td align="center"><b>Residence</b></td>
</tr>
<tr >
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<?php

$id = "history.php";
$connect = true;
include "main.php";

//PACKING ALL THE AVAILABLE RESIDENCE NAMES IN AN ASSOCIATIVE ARRAY

$connection->query("SELECT * FROM residence", true);
$qr = $_SESSION['query'];

$residences = array();

while($ress = mysqli_fetch_array($qr)){
	$residences[$ress['id']] = $ress['name'];
	//print_r($residences);
	//echo  "<br /><br />";
}


//PACKING ALL THE REGISTERED TRIMESTERS IN AN ASSOCIATIVE ARRAY

$connection->query("SELECT * FROM trimester", true);
$tr = $_SESSION['query'];

$trimesters = array();

while($trimm = mysqli_fetch_array($tr)){
	$trimesters[$trimm['id']] = $trimm['name'];
	//print_r($trimesters);
	//echo  "<br /><br />";
}

//TRANSLATING AND DISPLAYING DATA IN ARRAYS INTO HUMAN COGNIBLE FORM

$connection->query("SELECT * FROM activity WHERE s_id='$_SESSION[l031n45]' ORDER BY id DESC", false);
$actvty = $_SESSION['query'];

while($miresd = mysqli_fetch_array($actvty)){
	echo '<tr><td align="center"><code>'.@htmlentities($trimesters[$miresd['trim']]).'</code></td> <td align="center"><code>'.@htmlentities($miresd['rnum']).'</code></td><td align="center"><code>'.@htmlentities($residences[$miresd['residence']]).'</code></td></tr>';
}



?>
</table>
  
 <br /><br />     
      <div class="fb-item" id="item4">
        <div class="fb-sectionbreak">
          <hr style="max-width: 960px;">
        </div>
      </div>
      <div class="fb-item fb-100-item-column" id="item2" style="height: 50px; min-height: 5px;">
        <div class="fb-spacer">
          <div id="item2_div_0">
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </form>
</body>
</html>
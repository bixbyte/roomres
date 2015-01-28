<?php
	@session_start();
	$id = "new_reservation.php";
	
	if(@$_REQUEST['res'] == ''){
		include "redirect.php";
		echo '<script>alert("Select a valid residence!");</script>';
		$go = new redirect('panel.php');
		die();
	}
	
	if(@$_SESSION['l031n45'] == '' ){
		include "redirect.php";
		$go = new redirect('login.php');
		die();		
	}else{
		$connect = true;
		include "main.php";	
	}
	
	
if(@$_SESSION['u56_res'] == 0 || @$_SESSION['u56_rnum'] == 0){echo '<script> console.log("Room reservation Access granted!"); </script>';	}else{
	
	echo '<script>alert("Access violated!");</script>';
	$go = new redirect('panel.php');
	die();
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
action="proc_adds.php" enctype="multipart/form-data" method="POST" 
data-form="preview">
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
       
       <div style="float:left;">
			  <?php $id = 'panel.php'; 	echo "<b>Welcome </b> <code>".(@$_SESSION['l031n45']);	echo ' </code>'; ?>
              	
          </div>
          <div style="float:right;">
          	<b><a href="find_reservant.php" style="text-decoration:none; color:#999;" target="new"> People Finder</a> </b>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
          	<b><a href="panel.php" style="text-decoration:none; color:#999;"> Reservation Panel </a> </b> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <a href="history.php" style="text-decoration:none; color:#999;"> MY  HISTORY </a> </b> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <a style="text-align:right; text-decoration:none;" href="proc_adds.php?act=logout"> Logout </a>
          </div>
          
      <div class="fb-item" id="item3">
        <div class="fb-sectionbreak">
          <hr style="max-width: 960px;">
        </div>
      </div>
      <br /><br />
     <center><b><u>ROOM RESERVATION:  </u></b></center>
     <code><b>
<?php



	$_SESSION['book_res'] = @$_REQUEST['res'];
	$connection->query("SELECT * FROM residence WHERE id='".$_REQUEST['res']."' LIMIT 1",true);
	$resnom = $_SESSION['query']; 
	while($ress = mysqli_fetch_array($resnom)){
		echo "Residence: <u>".$ress['name']."</u>";
	}
?>
</b></code>
<br /><br />
<select name="r_num" style="height:40px; border-radius:8px;" autofocus required >
<option value="" selected> Pick A Room </option>
<?php

	
	
	$connection->query("SELECT * FROM rooms WHERE residence='".$_REQUEST['res']."' AND  curr_capacity < max_capacity AND available='1' ", true);
	$rum = $_SESSION['query'];
	while ($rmz = mysqli_fetch_array($rum)){
		//echo $rmz['r_number']." <code> ".$rmz['curr_capacity']." </code> ". $rmz['max_capacity']. "<br />";
		echo '<option value="'.$rmz['r_number'].'">'.$rmz['r_number'].' </option>';
	}

?>
</select>

<input type="hidden" value="<?php echo $_SESSION['book_res']; ?>" name="residence" readonly/>

<br /><br />

      <div class="fb-item" id="item4">
        <div class="fb-sectionbreak">
          <hr style="max-width: 960px;">
        </div>
      </div>
      
  <input type="hidden" name="act" value="book_room" readonly />
  
  <div class="fb-item-alignment-left fb-footer" id="fb-submit-button-div"
  style="min-height: 1px; float:right;">
    <input class="fb-button-special" id="fb-submit-button" style="background: rgb(55,53,191); /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%, rgba(35,34,122,1) 100%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(55,53,191,1)), color-stop(100%,rgba(35,34,122,1))); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* IE10+ */
background: radial-gradient(ellipse at center,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3735bf', endColorstr='#23227a',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */;"
    type="submit" data-regular="url('btn_submit.png')"
  
    value="Reserve" />
  </div>
  <br /><br /><br /><br />
</form>
</body>
</html>
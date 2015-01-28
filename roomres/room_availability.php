<?php
	@session_start();
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="form_init.js" id="form_init_script"
    data-name="">
    </script>
    <link rel="stylesheet" type="text/css" href="default.css"
    id="theme" />
    <title>UEAB |ROOM AVAILABILITY HANDLER</title>
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
		width:200px;
		height:30px;
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
 	#button, button {
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

<div style="width:70px; border:groove; height:20px; margin-top:0px; border-radius:4px; cursor:pointer; background:#CCC; margin-top:0px;" align="center" onClick="javascript:window.location='cpanel.php';" >

	<code><b> Home </b></code>

</div>
<div id="Tabs1">
  <ul>
    <li><a href="#tabs-1">MAKE ROOM UNAVAILABLE</a></li>
    <li><a href="#tabs-3">SPECIALLY RESERVED ROOMS</a></li>
    <!-- <li><a href="#tabs-2">MAKE ROOMS AVAILABLE</a></li> -->  
  </ul>
  
  <div id="tabs-1">
	<br /><br />
<style>#docContainer .fb_cond_applied{ display:none; }</style><noscript><style>#docContainer .fb_cond_applied{ display:inline-block; }</style></noscript><form  id="docContainer"
style="background-color: rgb(255, 255, 255);" action="proc_adds.php" enctype="multipart/form-data"
method="POST" >
   <div class="fb-form-header fb-item-alignment-center" id="fb-form-header1" style="min-height: 113px; background: rgb(55,53,191); /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%, rgba(35,34,122,1) 100%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(55,53,191,1)), color-stop(100%,rgba(35,34,122,1))); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* IE10+ */
background: radial-gradient(ellipse at center,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3735bf', endColorstr='#23227a',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */">
    <a class="fb-link-logo" id="fb-link-logo1" style="max-width: 111px;" target="_blank"><img title="University Of Eastern Africa Baraton" class="fb-logo" id="fb-logo1" style="width: 100%; display: inline;" alt="University Of Eastern Africa Baraton" src="ueab_logo.png"/></a>
  </div>
  <div class="section" id="section1">
    <div class="column ui-sortable" id="column1">
      <div class="fb-item fb-100-item-column" id="item1" style="opacity: 1;">
        <div class="fb-header fb-item-alignment-center">
          <h2 style="display: inline;">
           SPECIAL ROOM RESERVATION
          </h2>
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item12" style="opacity: 1;">
        <div class="fb-grouplabel">
          <label id="item12_label_0" style="display: inline;">First Room</label>
        </div>
        <div class="fb-input-box">
          <input name="room_start" id="item12_text_1" required type="text" maxlength="254"
          placeholder="" autocomplete="off" data-hint="Required" />
          <div class="fb-hint" style="color: rgb(136, 136, 136); font-style: normal; font-weight: normal;">
            Required
          </div>
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item14">
        <div class="fb-grouplabel">
          <label id="item14_label_0" style="display: inline;">Nth Room</label>
        </div>
        <div class="fb-input-box">
          <input name="room_end" id="item14_text_1" type="text" maxlength="254"
          placeholder="" autocomplete="off" data-hint="For adding multiple [numeric-only rooms]"
          />
          <div class="fb-hint" style="color: rgb(136, 136, 136); font-style: normal; font-weight: normal;">
            For reserving multiple [numeric-only rooms]
          </div>
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item2">
      <!--
        <div class="fb-grouplabel">
          <label id="item2_label_0" style="display: inline;">Room Capacity</label>
        </div>
        <div class="fb-input-box">
          <input name="room_capacity" id="item2_text_1" required type="text" maxlength="254"
          placeholder="e.g. 2" autocomplete="off" data-hint="" />
        </div>
        -->
      </div>
      <div class="fb-item fb-50-item-column" id="item15">
        <div class="fb-grouplabel">
          <label id="item15_label_0" style="display: inline;">Residence</label>
        </div>
        <div class="fb-dropdown">
          <select name="residence" id="item15_select_1" required data-hint="">
             <option value=""> Pick One   </option>
                <?php
               
					$id = "new_room.php";
					$connect = true;
					include "main.php";
					
					//Add  {WHERE gender='$_SESSION[u56_gender]'} to restrict gender
					$connection->query("SELECT * FROM residence", false);
					
					$ox = $_SESSION['query'];
					while($result = mysqli_fetch_array($ox)){
					    echo "<option value='$result[id]'> $result[name] </option>";
					}
				
				?>
          </select>
        </div>
      </div>
    </div>
  </div>
  
  <input type="hidden" value="new_room_reserve" name="act" readonly />
  
  
  <div class="fb-item-alignment-left fb-footer" id="fb-submit-button-div"
  style="min-height: 1px;">
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
</form>

  </div>
  
  
  
  <div id="tabs-3">
	<br />
    	<!-- <h2><code>** STILL COOKING **</code></h2> 
    <br /> -->
<?php
	//filter for top residential admin only 
		
		//Store the residence details in an associative array in the order {'residence_id'=>'residence_title/name'}
		$reslist = $connection->query("SELECT * FROM residence",true);
		$listed = $_SESSION['query'];
		
		$resarr = array();
		while($pa = mysqli_fetch_array($listed)){
			$resarr[$pa['id']] = $pa['name'];
		}

		//Getting all admin data save for the first 3 defaults
		$qry = "SELECT * FROM rooms WHERE available='0'";
		$connection->num_rows($qry,true);
		//AND gender='$_SESSION[u56_gender]'
		if($_SESSION['num_rows'] <> 0){
			
			$connection->query($qry, true);
			$ad_list = $_SESSION['query'];
			
			//Generate a list of the admin that suit that criteria
			while($admin = mysqli_fetch_array($ad_list)){
				echo '
						<form action="proc_adds.php" method="get">
							<table width="60%">
							<tr>
							<td><input type="text" id="txt" name="room_start_1" disabled value="'.$admin['r_number'].'" /></td>
							<td><input type="text" id="txt" disabled value="'.$resarr[$admin['residence']].'" /></td>
							<td>
								<input type="hidden" value="new_room_reserve" name="act" ></input>
								<input type="hidden" id="txt" name="room_start_1" value="'.$admin['r_number'].'" />
								<input type="hidden" name="residence_1" value="'.$admin['residence'].'" /></td>
								<input type="hidden" name="action" value="avail"  > </input>
							</td>
							<td> 
								<input type="submit" id="chkz" value="Make Available" ></input>
							</td>
							</tr>
							</table>
						</form>
					';
			}
			
		}else{
			echo "<code style='color:#F00;'><h2>There are no specially reserved rooms!</h2></code> <br /><br /> <a href='room_availability.php'><button>Add  Specially Reserved Room</button></a>";
		}
		
	

?>
   

  </div>

<!--  
  <div id="tabs-2">
	<br /><br />
  </div>
 -->
 
  
</div>


<script type="text/javascript">
$(function() {
	$( "#Tabs1" ).tabs(); 
});
</script>
</body>
</html>
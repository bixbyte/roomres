<?php

@session_start();	
	
	//The Already Loged in QuickAccess Module!
	if(@$_SESSION['154dm1n']){
		
		if(@$_SESSION['l031n45'] != ''){
			
			include 'redirect.php'; 
			$logedin = new redirect('cpanel.php');
			die;
			
		}else if(!isset($_SESSION['currpage'])){
			
			$_SESSION['currpage'] = 'c_login.php';
		
		}
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
    <title>UEAB ROOMRES| Admin LOGIN</title>
  <link rel="icon"  href="favicon.ico"  /></head>
  
  <body><style>#docContainer .fb_cond_applied{ display:none; }</style><noscript><style>#docContainer .fb_cond_applied{ display:inline-block; }</style></noscript><form  id="docContainer"
style="background-color: rgb(255, 255, 255);" action="proc_adds.php" enctype="multipart/form-data"
method="POST"  style="max-width:450px">
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
            UEAB|RoomRes|Admin Login
          </h2>
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item17">
        <div class="fb-grouplabel">
          <label id="item17_label_0" style="display: inline;">Administrative ID Number</label>
        </div>
        <div class="fb-input-box">
          <input name="username" id="" required type="text" maxlength="254"
           autocomplete="on" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item24">
        <div class="fb-grouplabel">
          <label id="item24_label_0">Password</label>
        </div>
        <div class="fb-input-box">
          <input name="passwd" id="" required type="password" maxlength="254"
          />
        </div>
      </div>
    </div>
  </div>
  
   <input type="hidden" name="act" value="admin_login" readonly />
   
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
    value="Login" />
  </div>
  <div align="center"><a href="new_password_c.php" >Having Password Trouble? </a></div>
  <br />
</form>
</body>
</html>
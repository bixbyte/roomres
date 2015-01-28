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
    <title>UEAB | Add A Trimester</title>

<style> button:hover {
	 color:#FFF !important;
	 border-radius:12px;
	 transition-duration:1s; 
	}
 button{
background: rgb(206,220,231) !important; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%, rgba(89,106,114,1) 100%) !important; /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(206,220,231,1)), color-stop(100%,rgba(89,106,114,1))) !important; /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* IE10+ */
background: radial-gradient(ellipse at center,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedce7', endColorstr='#596a72',GradientType=1 ) !important; /* IE6-9 fallback on horizontal gradient */

background: rgb(76,76,76) !important; /* Old browsers */
background: -moz-linear-gradient(top,  rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%) !important; /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))) !important; /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* IE10+ */
background: linear-gradient(to bottom,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ) !important; /* IE6-9 */
	 
	 
	  color:#FFF !important;
 }
 a {
	 color:#FFF !important;
	}
 a:hover{
	 color:#FFF !important;
 }

 #Tabs1 {
	 background-image:url(printable.fw.png) !important; 
}

ul{

}

body{
	background: none !important;
}

li{

background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%) !important; /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))) !important; /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* IE10+ */
background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ) !important; /* IE6-9 */


	}</style>
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
    <li><a href="#tabs-1">ADD TRIMESTER</a></li>
    
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
            Add New Trimester
          </h2>
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item2">
        <div class="fb-grouplabel">
          <label id="item2_label_0" style="display: inline;">Name</label>
        </div>
        <div class="fb-input-box">
          <input name="name" id="item2_text_1" required type="text" maxlength="254"
          placeholder="e.g. Jan ~ Mar 2014 " autocomplete="off" data-hint="" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item11">
        <div class="fb-grouplabel">
          <label id="item11_label_0" style="display: inline;">Year</label>
        </div>
        <div class="fb-dropdown">
          <select name="year" id="item11_select_1" data-hint="">
            
            <?php
					$this_year = date('Y');
					
						for($i= ($this_year+5); $i > ($this_year-6); $i--){
							
							if($i != $this_year):
							
								echo '<option id="item11_select_'.(($this_year+7) - $i).'" value="'.$i.'"> '.$i.' </option>';
								
							else:
								echo '<option id="item11_select_7" value="'.$i.'" selected> '.$i.' </option>';
							endif;
						}
					
				?>
          </select>
        </div>
      </div>
    </div>
  </div>
  
  <input type="hidden" value="new_trimester" name="act" readonly />
  
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
  
    value="Add" />
  </div>
</form>
   
  </div>
  
  
</div>


<script type="text/javascript">
$(function() {
	$( "#Tabs1" ).tabs(); 
});
</script>
</body>
</html>
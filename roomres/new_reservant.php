<?php
	@session_start();
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
    <title>UEAB | Add Reservant</title>
  <link rel="icon"  href="favicon.ico"  /></head>
  
  <body><style>#docContainer .fb_cond_applied{ display:none; }</style><noscript><style>#docContainer .fb_cond_applied{ display:inline-block; }</style></noscript><form  id="docContainer"
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
            SignUp
          </h2>
        </div>
      </div>
      <div class="fb-item fb-100-item-column" id="item2">
        <div class="fb-grouplabel">
          <label id="item2_label_0" style="display: inline;">Name</label>
        </div>
        <div class="fb-input-box">
          <input name="name" id="item2_text_1" required type="text" maxlength="254"
          placeholder="First Middle Last" autocomplete="on" data-hint="" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item3">
        <div class="fb-grouplabel">
          <label id="item3_label_0" style="display: inline;">School ID Number</label>
        </div>
        <div class="fb-input-box">
          <input name="s_idnum" id="item3_text_1" required type="text" maxlength="254"
          placeholder="SIDNUM0101" autocomplete="on" data-hint="" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item4">
        <div class="fb-grouplabel">
          <label id="item4_label_0">Email</label>
        </div>
        <div class="fb-input-box">
          <input name="email" id="item4_email_1" required type="email" maxlength="254"
          placeholder="you@domain.com" autocomplete="on" data-hint="" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item6">
        <div class="fb-grouplabel">
          <label id="item6_label_0">Password</label>
        </div>
        <div class="fb-input-box">
          <input name="passwd" id="item6_password_1" required type="password" maxlength="254"
          placeholder="" autocomplete="off" data-hint="More than 4 Characters" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item7" style="opacity: 1;">
        <div class="fb-grouplabel">
          <label id="item7_label_0" style="display: inline;">Password </label>
        </div>
        <div class="fb-input-box">
          <input name="passwd2" id="item7_password_1" required type="password" maxlength="254"
          placeholder="" autocomplete="off" data-hint="Again" />
          <div class="fb-hint" style="color: rgb(136, 136, 136); font-style: normal; font-weight: normal;">
            Again
          </div>
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item8">
        <div class="fb-grouplabel">
          <label id="item8_label_0" style="display: inline;">Telephone</label>
        </div>
        <div class="fb-input-box">
          <input name="tel" id="item8_text_1" required type="text" maxlength="254"
          placeholder="" autocomplete="on" data-hint="" />
        </div>
      </div>
      <div class="fb-item fb-50-item-column" id="item9">
        <div class="fb-grouplabel">
          <label id="item9_label_0" style="display: inline;">Gender</label>
        </div>
        <div class="fb-dropdown">
          <select name="gender" id="item9_select_1" required data-hint="">
            <option value=""> Pick One </option>
                <option value="m"> Male   </option>
                <option value="f"> Female </option>
          </select>
        </div>
      </div>
    </div>
  </div>
  
  <input type="hidden" value="new_reservant" name="act" readonly />
  
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
  
    value="SignUp" />
  </div>
</form>
</body>
</html>
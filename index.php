<?php session_start(); ?>
<?php header("Cache-control: private");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	<title>Administracion de Sistema de Gestión</title>
  	<link rel="stylesheet" href="view/admin/css/style.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="view/admin/css/adm.sheet.css" type="text/css" media="screen" />
   	<link rel="stylesheet" href="controller/class/jquery-uploader/uploadify.css" type="text/css" media="screen" />
	<script src="view/admin/js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="view/admin/js/jquery.functions.js" ></script>
    <script type="text/javascript" src="view/admin/js/jquery.validate.js"> </script>
    <script type="text/javascript" src="view/admin/js/jquery.uploadify.v2.1.0.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="view/admin/js/swfobject.js"></script>
    <script type="text/javascript" src="view/admin/js/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="view/admin/js/slide.js"></script>
   <!--  <script src="http://maps.google.com/maps?file=api&amp;v=2&oe=ISO-8859-1;&amp;key=ABQIAAAAZVfymhwi_-aq3bzebPLcQxQuyl2kv8Ye_YtRavK6HV_ur2A_gxR5x4vdNaKB5zemZEOrBIt3KKWK0g"
type="text/javascript"></script> -->
</head>
<body>
<div style="margin: 0 auto;">
<?php 
include('view/admin/adm.index.php');
?>
</div>
<div style="width:100% !important; position:relative; height:94px !important; display:block; margin-top:10px; " align="center">

  <div  style="margin: 0 auto !important; padding-top: 30px !important;text-align: center; top:0px !important;  width:800 !important; " align="center">

<span id="fotter" style=" color:#CCCCCC; text-transform:normal; font-size:11px;"><font color="#FF0000" size="+2">[ </font> <font color="#FFFFFF" size="+1">Sistema de Gesti&oacute;n </font> <font color="#FF0000" size="+2"> ]</font>  &copy;  2013
<br /><?php
					if($_SESSION['user'] )
					{
			echo'<a href="logout.php" style="text-decoration:none; color:#ccc" ><span class="variable" >Salir</span></a>';	
						}

?>
  </span>
  </div>
</div>
</body>
</html>
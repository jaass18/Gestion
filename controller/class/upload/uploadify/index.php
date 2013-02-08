<?php require_once('../Connections/connIWF.php'); ?>
<?php require_once('../classes/upload/class.upload.php'); ?>
<?php
$fullPath = $_SERVER['DOCUMENT_ROOT'] . $publicPath;
?>
<?php
if (!empty($_FILES)/* && $_GET['action'] == 'upload'*/) {
	// process uploaded file
	$handle = new Upload($_FILES['Filedata']);
	if ($handle->uploaded) {
		$handle->image_resize	= true;
		$handle->image_ratio	= true;
		$handle->image_y			= 800;
		$handle->image_x			= 600;
		$handle->Process($fullPath);
		$pos = strpos($handle->file_src_mime,"image/"); // controllo se "image/" è nel MIME
		if ($handle->processed && $pos !== false) { // il file è stato processato ed è un'immagine (posso usare anche $pos === true)
			$file = $fullPath . $handle->file_dst_name;
			//	echo $file;
			// exit;
			$handle = new Upload($file);
			if ($handle->uploaded) {	
				$handle->image_resize				= true;
				$handle->image_ratio				= true;
				$handle->image_y						= 120;
				$handle->image_x						= 90;
				$handle->file_name_body_add = '_small';
				$handle->Process($fullPath);
			}
		} else {
			echo $handle->error;
		}
	} else {
		echo $handle->error;
	}
}

?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$insertSQL = sprintf("INSERT INTO uploads (upl_name, upl_file) VALUES (%s, %s)",
                       GetSQLValueString($_POST['textfield'], "text"),
                       GetSQLValueString($file, "text"));

  mysql_select_db($database_connIWF, $connIWF);
  $Result1 = mysql_query($insertSQL, $connIWF) or die(mysql_error());

  $insertGoTo = "index.php?msg=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js"></script>
<script type="text/javascript" src="scripts/swfobject.js"></script>
<script type="text/javascript" src="scripts/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#fileField").uploadify({
		'uploader': 'scripts/uploadify.swf',
		'script': '<?php echo $_SERVER['PHP_SELF'] ?>?action=upload',
		'cancelImg': 'cancel.png',
		'folder': '../public',
		'queueID': 'fileQueue',
		'auto': true,
		'multi': false,
		'onComplete': function(event, queueID, fileObj) {
			alert(fileObj.name);
			$('#fileField').after('<input size="64" type="text" name="file" value="' + fileObj.filePath  + '" />')
			$('#fileFieldUploader').hide();
			}
	});
	$("#form1").validate({});
});
</script>

</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
	<input type="text" name="textfield" id="textfield" class="required" /><br />
	<div id="fileQueue"></div>
	<input type="file" name="fileField" id="fileField" class="required" /><br />
	<input type="submit" name="button" id="button" value="Submit" />
	<input type="hidden" name="MM_insert" value="form1" />
</form>
<p><?php echo $fullPath;  ?></p>
</body>
</html>
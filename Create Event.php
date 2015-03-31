<?php require_once('Connections/Sign_Up.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO event (Title, Image, `Description`, `Time Remaining`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_FILES['image'] ['name'], "text"),
                       GetSQLValueString($_POST['Desc'], "text"),
                       GetSQLValueString($_POST['Time'], "date"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($insertSQL, $Sign_Up) or die(mysql_error());

  $insertGoTo = "Sukses Create Event.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	// Upload file code goes here
$target = "upload/"; //This is the directory where file will be uploaded//
 $target = $target . basename( $_FILES['image']['name']); //change the image and name to whatever your database fields are called//
  $insertSQL = sprintf("INSERT INTO event (Title, Image, `Description`, `Time Remaining`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_FILES['image']['name'], "text"),
                       GetSQLValueString($_POST['Desc'], "text"),
                       GetSQLValueString($_POST['Time'], "date"));
					   //This code writes the photo to the server//
 if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
 {

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($insertSQL, $Sign_Up) or die(mysql_error());

  $insertGoTo = "Sukses Create Event.php";
  }
  else{
 header(sprintf("Location: Crate Event.php?file=error"));
 }
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Event = "SELECT * FROM event";
$Event = mysql_query($query_Event, $Sign_Up) or die(mysql_error());
$row_Event = mysql_fetch_assoc($Event);
$totalRows_Event = mysql_num_rows($Event);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
 $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Recordset1 = "SELECT * FROM `sign up`";
$Recordset1 = mysql_query($query_Recordset1, $Sign_Up) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<body onLoad="MM_preloadImages('Gambar/Home 1.png','Gambar/Event Gallery 1.png','Gambar/Event 1.png')"><table width="100%" border="0">
  <tr>
    <td align="right">Hi, <?php echo $row_Recordset1['Username']; ?>! <a href="<?php echo $logoutAction ?>"><img src="Gambar/Log Out.png" alt="" width="165" height="32" id="Log Out" /></a></td>
  </tr>
  <tr>
    <td height="148" align="right"><img src="Gambar/Logo.png" alt="v" width="606" height="69" /></td>
  </tr>
  <tr>
    <td align="center"><a href="Homepage Login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="v" width="186" height="75" id="Home" /></a><a href="Event Gallery Login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="v" width="301" height="75" id="Event Gal" /></a><a href="Display.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="v" width="168" height="75" id="Event" /></a></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1">
  <p>Title :</p>
  <p>
    <label for="title"></label>
    <span id="sprytextfield2">
    <input name="title" type="text" id="title" size="50" maxlength="50">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
  <p>Image :  </p>
  <p>
    <label for="image"></label>
    <input type="file" name="image" id="image">
  </p>
  <p>Description :</p>
  <p>
    <label for="Desc"></label>
    <span id="sprytextarea1">
    <textarea name="Desc" id="Desc" cols="50" rows="10"></textarea>
    <span id="countsprytextarea1">&nbsp;</span><span class="textareaRequiredMsg">A value is required.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
  <p>Time Remining ;</p>
  <p>
    <label for="Time"></label>
    <span id="sprytextfield1">
    <input type="text" name="Time" id="Time">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Format : yyyy-mm-dd</span></span>	</p>
  <p>
    <input type="submit" name="Upload" id="Upload" value="Upload">
  </p>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", validateOn:["blur", "change"], useCharacterMasking:true, hint:"Format (yyyy-mm-dd)"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"], maxChars:50, hint:"Use Interactive Sentences!"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {counterId:"countsprytextarea1", validateOn:["blur", "change"], maxChars:10000, hint:"Maximum 10.000 Characters"});
</script>
<?php
mysql_free_result($Event);

mysql_free_result($Recordset1);
?>

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
  $insertSQL = sprintf("INSERT INTO `sign up` (`First Name`, `Last Name`, Username, Email, Password, `Confirm Password`) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['First_Name'], "text"),
                       GetSQLValueString($_POST['Last_Name'], "text"),
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['Confirm_Password'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($insertSQL, $Sign_Up) or die(mysql_error());

  $insertGoTo = "Sukses Sign Up.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Sign_Up = "SELECT * FROM `sign up`";
$Sign_Up = mysql_query($query_Sign_Up, $Sign_Up) or die(mysql_error());
$row_Sign_Up = mysql_fetch_assoc($Sign_Up);
$totalRows_Sign_Up = mysql_num_rows($Sign_Up);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('Gambar/Home 1.png','Gambar/Event Gallery 1.png','Gambar/Event 1.png')">
<table width="100%" border="0">
  <tr>
    <td height="148" align="right"><img src="Gambar/Logo.png" alt="" width="606" height="69" /></td>
  </tr>
  <tr>
    <td align="center"><a href="Index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="c" width="186" height="75" id="Home" /></a><a href="Event Gallery.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="c" width="301" height="75" id="Event Gal" /></a><a href="Event.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="c" width="168" height="75" id="Event" /></a></td>
  </tr>
</table>
<form method="post" name="form2" id="form2">
  <p>&nbsp;</p>
  <table width="534" height="286" align="center">
    <tr valign="baseline">
      <td width="116" align="right" nowrap="nowrap">First Name:</td>
      <td width="406"><span id="sprytextfield7">
        <input name="First_Name" type="text" value="" size="32" maxlength="30" />
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Last Name:</td>
      <td><span id="sprytextfield8">
        <input name="Last_Name" type="text" value="" size="32" maxlength="50" />
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><span id="sprytextfield9">
      <input name="Username" type="text" id="Username" value=" " size="32" maxlength="60" />
      <span class="textfieldMinCharsMsg">Not be Null.</span><span class="textfieldRequiredMsg">Minimum 6 Character</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><span id="sprytextfield10">
      <input name="Email" type="text" value="" size="32" maxlength="40" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><label for="textfield8"></label>
        <span id="sprytextfield11">
        <input name="Password" type="password" id="textfield8" size="32" maxlength="30" />
      <span class="textfieldRequiredMsg">Minimum 6 Character.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Confirm Password:</td>
      <td><span id="sprytextfield12">
      <input name="Confirm_Password" type="password" value="" size="32" maxlength="30" />
      <span class="textfieldRequiredMsg">Minimun 6 Character.</span><span class="textfieldMinCharsMsg">Minimum 6 Character.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input name="Sign Up" type="submit" id="Sign Up" value="Sign Up" /> <input type="reset" name="Reset" id="button" value="Reset" /></td>
    </tr>
  </table>
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {validateOn:["blur", "change"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur", "change"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {validateOn:["blur", "change"], minChars:1});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "email", {validateOn:["blur", "change"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {minChars:6});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {minChars:6, validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
mysql_free_result($Sign_Up);
?>

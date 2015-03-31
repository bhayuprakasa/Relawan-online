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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE profile SET Profpict=%s, `Full name`=%s, Gender=%s, Age=%s, City=%s, Country=%s, Website=%s WHERE Username=%s",
                       GetSQLValueString($_POST['Profpict'], "text"),
                       GetSQLValueString($_POST['Full_name'], "text"),
                       GetSQLValueString($_POST['Gender'], "text"),
                       GetSQLValueString($_POST['Age'], "int"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['Country'], "text"),
                       GetSQLValueString($_POST['Website'], "text"),
                       GetSQLValueString($_POST['Username'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($updateSQL, $Sign_Up) or die(mysql_error());

  $updateGoTo = "Sukses Edit Profile.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE profile SET Profpict=%s, Gender=%s, Age=%s, City=%s, Country=%s, Website=%s WHERE Username=%s",
                       GetSQLValueString($_POST['Profpict'], "text"),
                       GetSQLValueString($_POST['Gender'], "text"),
                       GetSQLValueString($_POST['Age'], "int"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['Country'], "text"),
                       GetSQLValueString($_POST['Website'], "text"),
                       GetSQLValueString($_POST['Username'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($updateSQL, $Sign_Up) or die(mysql_error());

  $updateGoTo = "Sukses Edit Profile.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Profile = "SELECT * FROM profile";
$Profile = mysql_query($query_Profile, $Sign_Up) or die(mysql_error());
$row_Profile = mysql_fetch_assoc($Profile);
$totalRows_Profile = mysql_num_rows($Profile);

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Recordset1 = "SELECT * FROM `sign up`";
$Recordset1 = mysql_query($query_Recordset1, $Sign_Up) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Recordset3 = "SELECT * FROM `sign up`";
$Recordset3 = mysql_query($query_Recordset3, $Sign_Up) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
</head>

<body onload="MM_preloadImages('Gambar/Home 1.png','Gambar/Event Gallery 1.png','Gambar/Event 1.png','Gambar/Log Out 1.png')">
<table width="100%" border="0">
  <tr>
    <td align="right">Hi, <?php echo $row_Recordset1['Username']; ?>! <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Log Out','','Gambar/Log Out 1.png',1)"><img src="Gambar/Log Out.png" alt="" width="165" height="32" id="Log Out" /></a></td>
  </tr>
  <tr>
    <td height="148" align="right"><img src="Gambar/Logo.png" alt="v" width="606" height="69" /></td>
  </tr>
  <tr>
    <td align="center"><a href="Homepage Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="v" width="186" height="75" id="Home" /></a><a href="Event Gallery Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="v" width="301" height="75" id="Event Gal" /></a><a href="Display.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="v" width="168" height="75" id="Event" /></a></td>
  </tr>
</table>
<form method="POST" enctype="multipart/form-data" name="form2" id="form2">
  <table width="100%" border="0">
  <tr>
    <th scope="col"><p>&nbsp;</p>
      <p>ABOUT ME</p></th>
  </tr>
</table>
</form>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Profpict:</td>
      <td><p>
        <label for="fileField"></label>
        <input name="fileField" type="file" id="fileField" value="<?php echo $row_Profile['Profpict']; ?>" />
      </p>
      <p>&nbsp; </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><?php echo $row_Recordset3['Username']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Full name:</td>
      <td><input type="text" name="Full_name" value="<?php echo htmlentities($row_Profile['Full name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gender:</td>
      <td><p>
          <label>
            <input type="radio" name="Gender" value="Man" id="Gender_0" />
          Man</label>
          <br />
          <label>
            <input type="radio" name="Gender" value="Woman" id="Gender_1" />
            Woman</label>
      </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Age:</td>
      <td><input type="text" name="Age" value="<?php echo htmlentities($row_Profile['Age'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">City:</td>
      <td><input type="text" name="City" value="<?php echo htmlentities($row_Profile['City'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Country:</td>
      <td><input type="text" name="Country" value="<?php echo htmlentities($row_Profile['Country'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Website:</td>
      <td><input type="text" name="Website" value="<?php echo htmlentities($row_Profile['Website'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Username" value="<?php echo $row_Profile['Username']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Profile);

mysql_free_result($Recordset1);

mysql_free_result($Recordset3);
?>
</body>
</html>
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
  $updateSQL = sprintf("UPDATE event SET Image=%s, `Description`=%s, `Time Remaining`=%s WHERE Title=%s",
                       GetSQLValueString($_POST['image'], "text"),
                       GetSQLValueString($_POST['Desc'], "text"),
                       GetSQLValueString($_POST['Time'], "date"),
                       GetSQLValueString($_POST['title'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($updateSQL, $Sign_Up) or die(mysql_error());

  $updateGoTo = "Sukses Edit Event.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_GET['Title'])) && ($_GET['Title'] != "")) {
  $deleteSQL = sprintf("DELETE FROM event WHERE Title=%s",
                       GetSQLValueString($_GET['Title'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($deleteSQL, $Sign_Up) or die(mysql_error());

  $deleteGoTo = "Sukses Delete Event.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['Title'])) && ($_GET['Title'] != "")) {
  $deleteSQL = sprintf("DELETE FROM event WHERE Title=%s",
                       GetSQLValueString($_GET['Title'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($deleteSQL, $Sign_Up) or die(mysql_error());

  $deleteGoTo = "Display.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE event SET Image=%s, `Description`=%s, `Time Remaining`=%s WHERE Title=%s",
                       GetSQLValueString($_POST['image'], "text"),
                       GetSQLValueString($_POST['Desc'], "text"),
                       GetSQLValueString($_POST['Time'], "date"),
                       GetSQLValueString($_POST['title'], "text"));

  mysql_select_db($database_Sign_Up, $Sign_Up);
  $Result1 = mysql_query($updateSQL, $Sign_Up) or die(mysql_error());

  $updateGoTo = "Display.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Recordset1 = "SELECT * FROM event";
$Recordset1 = mysql_query($query_Recordset1, $Sign_Up) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Recordset2 = "SELECT * FROM `sign up`";
$Recordset2 = mysql_query($query_Recordset2, $Sign_Up) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
 <table width="100%" border="0">
   <tr>
     <td align="right">Hi, <?php echo $row_Recordset2['Username']; ?>! <a href="<?php echo $logoutAction ?>"><img src="Gambar/Log Out.png" alt="" width="165" height="32" id="Log Out" /></a></td>
   </tr>
   <tr>
     <td height="148" align="right"><img src="Gambar/Logo.png" alt="v" width="606" height="69" /></td>
   </tr>
   <tr>
     <td align="center"><a href="Homepage Login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="v" width="186" height="75" id="Home" /></a><a href="Event Gallery Login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="v" width="301" height="75" id="Event Gal" /></a><a href="Display.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="v" width="168" height="75" id="Event" /></a></td>
   </tr>
 </table>
 <h1>&nbsp;</h1>
 <h1>Mengupdate gambar</h1>
 <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1">
   <p>Title :</p>
   <p>
     <label for="title"></label>
     <input name="title" type="text" id="title" size="50" maxlength="50">
   </p>
   <p>Image : (Biarkan kosong jika tidak ingin dirubah)</p>
   <p>
     <label for="image"></label>
     <input type="file" name="image" id="image">
   </p>
   <p>Description :</p>
   <p>
     <label for="Desc"></label>
     <textarea name="Desc" id="Desc" cols="50" rows="10"></textarea>
   </p>
   <p>Time Remining ;</p>
   <p>
     <label for="Time"></label>
     <span id="sprytextfield1">
       <input type="text" name="Time" id="Time">
<span class="textfieldInvalidFormatMsg">Format : yyyy-mm-dd</span></span> </p>
   <p>
     <input type="submit" name="Upload" id="Upload" value="Upload">
   </p><input type="hidden" name="id" id="id">
 <a href="display.php">Cancel</a></p>
   <input type="hidden" name="MM_insert" value="form1">
   <input type="hidden" name="MM_update" value="form1">
 </form>
 <h2>Menghapus gambar</h2>
 <p class="warning">Yakin ingin menghapus gambar ini?</p>
 <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1">
   <p>Title :</p>
   <p>
     <label for="title"></label>
     <input name="title2" type="text" id="title" size="50" maxlength="50">
   </p>
   <p>Image : (Biarkan kosong jika tidak ingin dirubah)</p>
   <p>
     <label for="image"></label>
     <input type="file" name="image2" id="image">
   </p>
   <p>Description :</p>
   <p>
     <label for="Desc"></label>
     <textarea name="Desc2" id="Desc" cols="50" rows="10"></textarea>
   </p>
   <p>Time Remining ;</p>
   <p>
     <label for="Time"></label>
     <span id="sprytextfield2">
       <input type="text" name="Time2" id="Time">
       <span class="textfieldInvalidFormatMsg">Format : yyyy-mm-dd</span></span></p>
   <p>
     <input type="submit" name="Upload2" id="Upload2" value="Upload">
   </p>
   <input type="hidden" name="id2" id="id2">
   <a href="display.php">Cancel</a>
   </p>
   <input type="hidden" name="MM_insert2" value="form1">
 </form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", isRequired:false});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>

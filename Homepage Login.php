<?php require_once('Connections/Sign_Up.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "Index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "Error.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
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

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Username = "SELECT * FROM `sign up`";
$Username = mysql_query($query_Username, $Sign_Up) or die(mysql_error());
$row_Username = mysql_fetch_assoc($Username);
$totalRows_Username = mysql_num_rows($Username);

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Profile = "SELECT * FROM profile";
$Profile = mysql_query($query_Profile, $Sign_Up) or die(mysql_error());
$row_Profile = mysql_fetch_assoc($Profile);
$totalRows_Profile = mysql_num_rows($Profile);

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Event = "SELECT * FROM event";
$Event = mysql_query($query_Event, $Sign_Up) or die(mysql_error());
$row_Event = mysql_fetch_assoc($Event);
$totalRows_Event = mysql_num_rows($Event);
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

<body onload="MM_preloadImages('Gambar/Home 1.png','Gambar/Event Gallery 1.png','Gambar/Event 1.png')">
<table width="100%" border="0">
  <tr>
    <td align="right">Hi, <?php echo $row_Username['Username']; ?>! <a href="<?php echo $logoutAction ?>"><img src="Gambar/Log Out.png" alt="" width="165" height="32" id="Log Out" /></a></td>
  </tr>
  <tr>
    <td height="148" align="right"><img src="Gambar/Logo.png" alt="v" width="606" height="69" /></td>
  </tr>
  <tr>
    <td align="center"><a href="Homepage Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="v" width="186" height="75" id="Home" /></a><a href="Event Gallery Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="v" width="301" height="75" id="Event Gal" /></a><a href="Event Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="v" width="168" height="75" id="Event" /></a></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <th width="61%" height="82" scope="col">Event Terbaru</th>
    <th width="39%" align="left" scope="col"><p>About Me</p>
      <form id="form1" name="form1" method="post" action="">
        <?php echo $row_Profile['Profpict']; ?>
      </form></th>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <th width="31%" height="75" scope="col">Lingkungan</th>
    <th width="30%" scope="col">Pendidikan</th>
    <th width="39%" align="left" valign="middle" scope="col"><p>Point</p>
      <p><?php echo $row_Profile['Full name']; ?></p>
    <p><?php echo $row_Profile['Gender']; ?>.<?php echo $row_Profile['Age']; ?></p></th>
  </tr>
  <tr>
    <td align="center" valign="middle">Foto</td>
    <td align="center" valign="middle">Foto</td>
    <td align="left" valign="middle"><p><?php echo $row_Profile['City']; ?>,<?php echo $row_Profile['Country']; ?></p>
    <p><?php echo $row_Profile['Website']; ?></p></td>
  </tr>
</table>
<table width="131%" border="0">
  <tr>
    <td width="31%" align="center" scope="col"><?php echo $row_Event['Description']; ?></td>
    <td width="17%" align="center" scope="col"><?php echo $row_Event['Description']; ?></td>
    <td width="52%" align="left" scope="col"><a href="Edit Profile.php"><img src="Gambar/Edit Profile.png" width="103" height="25" /></a></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Username);

mysql_free_result($Profile);

mysql_free_result($Event);
?>

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

mysql_select_db($database_Sign_Up, $Sign_Up);
$query_Recordset1 = "SELECT * FROM `sign up`";
$Recordset1 = mysql_query($query_Recordset1, $Sign_Up) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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

<body onload="MM_preloadImages('Gambar/Home 1.png','Gambar/Event Gallery 1.png','Gambar/Event 1.png')"><html xmlns="http://www.w3.org/1999/xhtml">
<table width="100%" border="0">
  <tr>
    <td align="right">Hi, <?php echo $row_Recordset1['Username']; ?> <a href="Index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Log Out','','Gambar/Log Out 1.png',1)"><img src="Gambar/Log Out.png" alt="v" width="165" height="32" id="Log Out2" /></a></td>
  </tr>
  <tr>
    <td height="148" align="right"><img src="Gambar/Logo.png" alt="v" width="606" height="69" /></td>
  </tr>
  <tr>
    <td align="center"><a href="Homepage Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="v" width="186" height="75" id="Home" /></a><a href="Event Gallery Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="v" width="301" height="75" id="Event Gal" /></a><a href="Display.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="v" width="168" height="75" id="Event" /></a></td>
  </tr>
</table>
<table width="100%" height="155" border="0">
  <tr>
    <th scope="col">Your Event Successfully created!</th>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
</body>
</html>
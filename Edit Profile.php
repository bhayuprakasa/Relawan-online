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
    <td align="right">Hi, Username! <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Log Out','','Gambar/Log Out 1.png',1)"><img src="Gambar/Log Out.png" alt="" width="165" height="32" id="Log Out" /></a></td>
  </tr>
  <tr>
    <td height="148" align="right"><img src="Gambar/Logo.png" alt="v" width="606" height="69" /></td>
  </tr>
  <tr>
    <td align="center"><a href="Homepage Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','Gambar/Home 1.png',1)"><img src="Gambar/Home.png" alt="v" width="186" height="75" id="Home" /></a><a href="Event Gallery Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event Gal','','Gambar/Event Gallery 1.png',1)"><img src="Gambar/Event Gallery.png" alt="v" width="301" height="75" id="Event Gal" /></a><a href="Event Login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Event','','Gambar/Event 1.png',1)"><img src="Gambar/Event.png" alt="v" width="168" height="75" id="Event" /></a></td>
  </tr>
</table>
<table width="25%" border="0">
  <tr>
    <th scope="col">ABOUT ME</th>
  </tr>
  <tr>
    <td align="center">Gambar</td>
  </tr>
  <tr>
    <td align="center"><a href="#">Change Profile Picture</a></td>
  </tr>
</table>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label>Full Name : 
      <input type="text" name="Full Name" id="Full Name" />
    </label>
  </p>
  <p>
    <label>
      Gender : 
      <input type="radio" name="Gender" value="Male" id="Gender_0" />
Male</label>
    <label>
      <input type="radio" name="Gender" value="Female" id="Gender_1" />
    Female</label>
  </p>
  <p>
    <label>Age
      :      	
      <input name="Age" type="text" id="Age" value="" />
    </label>
  </p>
  <p>
    <label>City :
      <input type="text" name="City" id="City" />
    </label>
  </p>
  <p>
    <label>Country     :     
      <input type="text" name="Country" id="Country" />
    </label>
  </p>
  <p>
    <label>Website :
      <input type="text" name="Website" id="Website" />
    </label>
    <br />
  </p>
</form>
<table width="26%" height="94" border="0">
  <tr>
    <th align="right" scope="col"><a href="Sukses Edit Profile.php"><img src="Gambar/Edit Profile.png" width="78" height="27" /></a></th>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

</body>
</html>
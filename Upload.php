<?php
$file=$_FILES['image'];
$nama_file = $file['name'];
$nama_tmp = $file['tmp_name'];
$upload_dir = "gambar/";
move_uploaded_file($nama_tmp,$upload_dir.$nama_file);
	
?>
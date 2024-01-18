<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_penerbit = $_GET['id_penerbit'];
// query SQL untuk insert data
$query = "DELETE FROM tabel_penerbit WHERE id_penerbit='$id_penerbit'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:admin.php");

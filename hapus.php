<?php 

require "koneksi.php";
// fungsi hapus
if(isset($_POST['id_hapus'])){
  $id = $_POST['id_hapus'];
  $query = "DELETE FROM catatan WHERE id = '$id'";

  mysqli_query($koneksi, $query);

  if(mysqli_affected_rows($koneksi)){
    header("location: index.php?sukses_hapus=true");
  }
} 
?>
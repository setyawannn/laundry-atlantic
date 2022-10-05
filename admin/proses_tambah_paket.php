<?php
if ($_POST) {
  $id_outlet = $_POST['id_outlet'];
  $jenis = $_POST['jenis'];
  $nama_paket = $_POST['nama_paket'];
  $harga = $_POST['harga'];

  if (empty($nama_paket)) {
    echo "<script>alert('nama_paket paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
  } elseif (empty($harga)) {
    echo "<script>alert('harga tidak boleh kosong');location.href='tambah_paket.php';</script>";
  } elseif (empty($jenis)) {
    echo "<script>alert('nomor telepon tidak boleh kosong');location.href='tambah_paket.php';</script>";
  } else {
    include "../connect.php";
    $insert = mysqli_query($conn, "insert into paket (id_outlet, jenis, nama_paket, harga) value ('" . $id_outlet . "','" . $jenis . "','" . $nama_paket . "','" . $harga . "')") or die(mysqli_error($conn));
    if ($insert) {
      echo "<script>alert('Sukses menambahkan paket');location.href='tambah_paket.php';</script>";
    } else {
      echo "<script>alert('Gagal menambahkan paket');location.href='tambah_paket.php';</script>";
    }
  }
}

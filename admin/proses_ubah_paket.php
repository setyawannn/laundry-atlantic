<?php
if ($_POST) {
  $id_paket = $_POST['id_paket'];
  $id_outlet = $_POST['id_outlet'];
  $jenis = $_POST['jenis'];
  $nama_paket = $_POST['nama_paket'];
  $harga = $_POST['harga'];

  if (empty($id_outlet)) {
    echo "<script>alert('id_outlet paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
  } elseif (empty($jenis)) {
    echo "<script>alert('jenis tidak boleh kosong');location.href='tambah_paket.php';</script>";
  } else {
    include "../connect.php";
    $update = mysqli_query($conn, "update paket set id_outlet='" . $id_outlet . "', jenis='" . $jenis . "', nama_paket='" . $nama_paket . "', harga='" . $harga . "' where id_paket = '" . $id_paket . "'") or die(mysqli_error($conn));
    if ($update) {
      echo "<script>alert('Sukses update paket'); location.href='tampil_paket.php'</script>";
    } else {
      echo "<script>alert('Gagal update paket'); location.href='ubah_paket.php?id_paket=" . $id_paket . "';</script>";
    }
  }
}

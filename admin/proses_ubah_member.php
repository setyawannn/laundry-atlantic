<?php
if ($_POST) {
  $id_member = $_POST['id_member'];
  $nama_member = $_POST['nama_member'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tlp = $_POST['tlp'];

  if (empty($nama_member)) {
    echo "<script>alert('nama_member member tidak boleh kosong');location.href='tambah_member.php';</script>";
  } elseif (empty($alamat)) {
    echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_member.php';</script>";
  } else {
    include "../connect.php";
    $update = mysqli_query($conn, "update member set nama_member='" . $nama_member . "', alamat='" . $alamat . "', jenis_kelamin='" . $jenis_kelamin . "', tlp='" . $tlp . "' where id_member = '" . $id_member . "'") or die(mysqli_error($conn));
    if ($update) {
      echo "<script>alert('Sukses update member'); location.href='tampil_member.php'</script>";
    } else {
      echo "<script>alert('Gagal update member'); location.href='ubah_member.php?id_member=" . $id_member . "';</script>";
    }
  }
}

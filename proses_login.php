<?php
session_start();
include 'connect.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$user_sql = mysqli_query($conn, "select * from user where username='" . $username . "' and password='" . $password . "'");
$user_count = mysqli_num_rows($user_sql);

if ($user_count > 0) {
  $data = mysqli_fetch_assoc($user_sql);
  $data_user = mysqli_fetch_array($user_sql);
  if ($data['role'] == "admin") {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] =  $data['nama'];
    $_SESSION['role'] = "admin";
    $_SESSION['status_login'] = "admin";
    header("location:admin/index_admin.php");
  } else if ($data['role'] == "kasir") {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = "kasir";
    $_SESSION['status_login'] = "kasir";
    header("location:kasir/index_kasir.php");
  } else if ($data['role'] == "owner") {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = "owner";
    $_SESSION['status_login'] = "owner";
    header("location:owner/index_owner.php");
  } else {
    header("location:login.php");
  }
} else {
  header("location:login.php");
}

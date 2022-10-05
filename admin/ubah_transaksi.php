<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php
  include "../connect.php";
  $qry_get_transaksi = mysqli_query($conn, "select * from transaksi where id_transaksi = '" . $_GET['id_transaksi'] . "'");
  $dt_transaksi = mysqli_fetch_array($qry_get_transaksi);
  ?>
  <div class="container">
    <h3>Ubah transaksi</h3>
    <form action="proses_ubah_transaksi.php" method="post">
      <input type="hidden" name="id_transaksi" value="<?= $dt_transaksi['id_transaksi'] ?> ">
      <div class="mb-3">
        <label for="outlet" class="form-label">Nama Outlet</label>
        <select name="id_outlet" id="outlet" class="form-control">
          <?php
          include "../connect.php";
          $qry_outlet = mysqli_query($conn, "select * from outlet");
          while ($data_outlet = mysqli_fetch_array($qry_outlet)) {
            if ($data_outlet['id_outlet'] == $dt_transaksi['id_outlet']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
            echo '<option value="' . $data_outlet['id_outlet'] . '" ' . $selek . '>' . $data_outlet['nama_outlet'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="member" class="form-label">Nama Member</label>
        <select name="id_member" id="member" class="form-control">
          <option></option>
          <?php
          include "../connect.php";
          $qry_member = mysqli_query($conn, "select * from member");
          while ($data_member = mysqli_fetch_array($qry_member)) {
            if ($data_member['id_member'] == $dt_transaksi['id_member']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
            echo '<option value="' . $data_member['id_member'] . '" ' . $selek . '>' . $data_member['nama_member'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="tgl" class="form-label">Tanggal Order</label>
        <input type="date" name="tgl" class="form-control" value="<?= $dt_transaksi['tgl'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="batas_waktu" class="form-label">Batas Waktu</label>
        <input type="date" name="batas_waktu" class="form-control" value="<?= $dt_transaksi['batas_waktu'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="paket" class="form-label">Nama Paket</label>
        <select name="id_paket" id="paket" class="form-control">
          <option></option>
          <?php
          include "../connect.php";
          $qry_paket = mysqli_query($conn, "select * from paket");
          while ($data_paket = mysqli_fetch_array($qry_paket)) {
            if ($data_paket['id_paket'] == $dt_transaksi['id_paket']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
            echo '<option value="' . $data_paket['id_paket'] . '" ' . $selek . '>' . $data_paket['nama_paket'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="user" class="form-label">Nama Petugas</label>
        <select name="id_user" id="user" class="form-control">
          <option></option>
          <?php
          include "../connect.php";
          $qry_user = mysqli_query($conn, "select * from user where role != 'owner'");
          while ($data_user = mysqli_fetch_array($qry_user)) {
            if ($data_user['id_user'] == $dt_transaksi['id_user']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
            echo '<option value="' . $data_user['id_user'] . '" ' . $selek . '>' . $data_user['nama_user'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <?php
        $arr_status = array('baru' => 'Baru', 'proses' => 'Proses', 'selesai' => 'Selesai', 'diambil' => 'diambil');
        ?>
        <label for="status" class="form-label">Status order</label>
        <select name="status" class="form-control">
          <?php foreach ($arr_status as $key_status => $val_status) :
            if ($key_status == $dt_transaksi['status']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
          ?>
            <option value="<?= $key_status ?>" <?= $selek ?>><?= $val_status ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="mb-3">
        <?php
        $arr_dibayar = array('belum_dibayar' => 'Belum dibayar', 'dibayar' => 'Dibayar');
        ?>
        <label for="dibayar" class="form-label">dibayar order</label>
        <select name="dibayar" class="form-control">
          <?php foreach ($arr_dibayar as $key_dibayar => $val_dibayar) :
            if ($key_dibayar == $dt_transaksi['dibayar']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
          ?>
            <option value="<?= $key_dibayar ?>" <?= $selek ?>><?= $val_dibayar ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <input type="submit" class="btn btn-primary mt-4 w-100" value="Tambah">
    </form>
  </div>
  <?php
  // var_dump($dt_transaksi);
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
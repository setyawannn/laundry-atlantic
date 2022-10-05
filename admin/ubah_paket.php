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
  $qry_get_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_GET['id_paket'] . "'");
  $dt_paket = mysqli_fetch_array($qry_get_paket);
  ?>
  <div class="container">
    <h3>Ubah paket</h3>
    <form action="proses_ubah_paket.php" method="post">
      <input type="hidden" name="id_paket" value="<?= $dt_paket['id_paket'] ?> ">
      <div class="mb-3">
        <label for="outlet" class="form-label">Outlet</label>
        <select name="id_outlet" id="outlet" class="form-control">
          <?php
          include "../connect.php";
          $qry_outlet = mysqli_query($conn, "select * from outlet");
          while ($data_outlet = mysqli_fetch_array($qry_outlet)) {
            if ($data_outlet['id_outlet'] == $dt_paket['id_outlet']) {
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
        <?php
        $arr_jenis = array('kiloan' => 'Kiloan', 'selimut' => 'Selimut', 'bed_cover' => 'Bed Cover', 'kaos' => 'Kaos');
        ?>
        <label for="jenis" class="form-label">Jenis Laundry</label>
        <select name="jenis" class="form-control">
          <?php foreach ($arr_jenis as $key_jenis => $val_jenis) :
            if ($key_jenis == $dt_paket['jenis']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
          ?>
            <option value="<?= $key_jenis ?>" <?= $selek ?>><?= $val_jenis ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="nama_paket" class="form-label">Nama Paket</label>
        <input type="text" name="nama_paket" class="form-control" value="<?= $dt_paket['nama_paket'] ?>" required>
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="<?= $dt_paket['harga'] ?>" required>
      </div>
      <input type="submit" class="btn btn-primary mt-4 w-100" value="Tambah">
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
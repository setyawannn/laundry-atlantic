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
  $qry_get_outlet = mysqli_query($conn, "select * from outlet where id_outlet = '" . $_GET['id_outlet'] . "'");
  $dt_outlet = mysqli_fetch_array($qry_get_outlet);
  ?>
  <div class="container">
    <h3>Ubah Outlet</h3>
    <form action="proses_ubah_outlet.php" method="post">
      <input type="hidden" name="id_outlet" value="<?= $dt_outlet['id_outlet'] ?> ">
      <div class="mb-3">
        <label for="nama_outlet" class="form-label">Nama</label>
        <input type="text" name="nama_outlet" class="form-control" value="<?= $dt_outlet['nama_outlet'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $dt_outlet['alamat'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="tlp" class="form-label">Telepon</label>
        <input type="text" name="tlp" class="form-control" value="<?= $dt_outlet['tlp'] ?>" required>
      </div>
      <input type="submit" class="btn btn-primary mt-4 w-100" value="Tambah">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
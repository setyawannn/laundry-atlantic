<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Paket</title>
  <link rel="stylesheet" href="style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h1>Tambah Paket</h1>
    <form action="proses_tambah_paket.php" method="post">
      <div class="mb-3">
        <label for="outlet" class="form-label">Outlet</label>
        <select name="id_outlet" id="outlet" class="form-control">
          <option></option>
          <?php
          include "../connect.php";
          $qry_outlet = mysqli_query($conn, "select * from outlet");
          while ($data_outlet = mysqli_fetch_array($qry_outlet)) {
            echo '<option value="' . $data_outlet['id_outlet'] . '">' . $data_outlet['nama_outlet'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="jenis" class="form-label">Jenis Laundry</label>
        <select name="jenis" id="jenis" class="form-control">
          <option></option>
          <option value="kiloan">Kiloan</option>
          <option value="selimut">Selimut</option>
          <option value="bed_cover">Bed Cover</option>
          <option value="kaos">Kaos</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="nama_paket" class="form-label">Nama Paket</label>
        <input type="text" name="nama_paket" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" required>
      </div>
      <input type="submit" class="btn btn-primary mt-4 w-100" value="Tambah">
    </form>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Outlet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h1>Tampil outlet</h1>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>NAMA</th>
          <th>ALAMAT</th>
          <th>NO TELEPON</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "../connect.php";
        $qry_outlet = mysqli_query($conn, "select * from outlet");
        $no = 0;
        while ($data_outlet = mysqli_fetch_array($qry_outlet)) {
          $no++; ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data_outlet['nama_outlet'] ?></td>
            <td><?= $data_outlet['alamat'] ?></td>
            <td><?= $data_outlet['tlp'] ?></td>
            <td>
              <a href="./ubah_outlet.php?id_outlet=<?= $data_outlet['id_outlet'] ?>" class="btn btn-success">Ubah</a> |
              <a href="hapus_outlet.php?id_outlet=<?= $data_outlet['id_outlet'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
            </td>

          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>
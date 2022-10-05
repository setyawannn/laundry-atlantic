<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Paket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h1>Tampil Paket</h1>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>OUTLET</th>
          <th>JENIS</th>
          <th>NAMA PAKET</th>
          <th>HARGA</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "../connect.php";
        $qry_paket = mysqli_query($conn, "select * from paket join outlet on outlet.id_outlet=paket.id_outlet");

        $no = 0;
        while ($data_paket = mysqli_fetch_array($qry_paket)) {
          $no++; ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data_paket['nama_outlet'] ?></td>
            <td><?= $data_paket['jenis'] ?></td>
            <td><?= $data_paket['nama_paket'] ?></td>
            <td><?= $data_paket['harga'] ?></td>
            <td>
              <a href="./ubah_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" class="btn btn-success">Ubah</a> |
              <a href="hapus_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h1>Tampil User</h1>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>NAMA</th>
          <th>USERNAME</th>
          <th>ROLE</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "../connect.php";
        $qry_user = mysqli_query($conn, "select * from user");
        $no = 0;
        while ($data_user = mysqli_fetch_array($qry_user)) {
          $no++; ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data_user['nama_user'] ?></td>
            <td><?= $data_user['username'] ?></td>
            <td><?= $data_user['role'] ?></td>
            <td>
              <a href="./ubah_user.php?id_user=<?= $data_user['id_user'] ?>" class="btn btn-success">Ubah</a> |
              <a href="hapus_user.php?id_user=<?= $data_user['id_user'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h1>Tampil Transaksi</h1>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>NAMA OUTLET</th>
          <th>TGL ORDER</th>
          <th>BATAS WAKTU</th>
          <th>STATUS PEMBAYARAN</th>
          <th>TGL BAYAR</th>
          <th>CUSTOMER</th>
          <th>NAMA PAKET</th>
          <th>STATUS ORDER</th>
          <th>AKSI</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include "../connect.php";
        $qry_transaksi = mysqli_query($conn, "select * from transaksi JOIN outlet ON outlet.id_outlet = transaksi.id_outlet JOIN member ON member.id_member = transaksi.id_member JOIN paket ON paket.id_paket = transaksi.id_paket");
        $no = 0;
        while ($data_transaksi = mysqli_fetch_array($qry_transaksi)) {
          $no++; ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data_transaksi['nama_outlet'] ?></td>
            <td><?= $data_transaksi['tgl'] ?></td>
            <td><?= $data_transaksi['batas_waktu'] ?></td>
            <td><?= $data_transaksi['dibayar'] ?></td>
            <td><?= $data_transaksi['tgl_bayar'] ?></td>
            <td><?= $data_transaksi['nama_member'] ?></td>
            <td><?= $data_transaksi['nama_paket'] ?></td>
            <td><?= $data_transaksi['status'] ?></td>
            <td>
              <a href="./tampil_detail_transaksi.php?id_transaksi=<?= $data_transaksi['id_transaksi'] ?>" class="btn btn-info text-white">Info</a> |
              <a href="hapus_transaksi.php?id_transaksi=<?= $data_transaksi['id_transaksi'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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
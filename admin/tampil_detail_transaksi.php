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
    <table>
      <tbody>
        <?php
        include "../connect.php";
        $sql = 'select * from transaksi join member on member.id_member=transaksi.id_member join outlet on outlet.id_outlet=transaksi.id_outlet where transaksi.id_transaksi = '  . $_GET['id_transaksi'];
        $result = mysqli_query($conn, $sql);
        ?>
        <?php while ($data_member = mysqli_fetch_assoc($result)) { ?>
          <a href="./cetak_transaksi.php?id_transaksi=<?= $data_member['id_transaksi'] ?>" target="_blank" class="btn btn-primary">Cetak Laporan Transaksi</a>

          <tr>
            <td class="col-lg-4 fw-bold text-muted">ID Transaksi</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['id_transaksi'] ?></td>

          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Nama Member</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['nama_member'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Alamat</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['alamat'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Jenis Kelamin</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['jenis_kelamin'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Telepon</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['tlp'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Nama Outlet</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['nama_outlet'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Status Pembayaran</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['dibayar'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Status Order</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['status'] ?></td>
          </tr>
          <tr>
            <td class="col-lg-4 fw-bold text-muted">Tanggal Diambil</td>
            <td></td>
            <td class="fw-bold fs-6"><?= $data_member['batas_waktu'] ?></td>
          </tr>

        <?php
        }
        ?>
      </tbody>
    </table>
    <br><br>
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Tanggal Order</th>
        <th>Tanggal Bayar</th>
        <th>Paket Laundry</th>
        <th>Berat Cucian</th>
        <th>Harga/Kg</th>
        <th>Subtotal</th>
        <th>Aksi Edit</th>
      </tr>
      <tbody>

        <?php
        include "../connect.php";
        $qry_pembayaran = mysqli_query($conn, "select * from transaksi join detail_transaksi on detail_transaksi.id_transaksi = transaksi.id_transaksi join paket on paket.id_paket=transaksi.id_paket where transaksi.id_transaksi = " . $_GET['id_transaksi']);
        $no = 0;
        while ($data_pembayaran = mysqli_fetch_array($qry_pembayaran)) {
          $harga = $data_pembayaran['harga'];
          $qty = $data_pembayaran['qty'];
          $total = $harga * $qty;
          $no++; ?>
          <tr class="text-xs font-weight-bold">
            <td class="align-middle text-left"><?= $no ?></td>
            <td class="align-middle text-left"><?= $data_pembayaran['tgl'] ?></td>
            <td class="align-middle text-left"><?= $data_pembayaran['tgl_bayar'] ?></td>
            <td class="align-middle text-left"><?= $data_pembayaran['nama_paket'] ?></td>
            <td class="align-middle text-left"><?= $data_pembayaran['qty'] ?></td>
            <td class="align-middle text-left"><?= $data_pembayaran['harga'] ?></td>
            <td class="align-middle text-left">Rp.<?= $total ?></td>
            <td class="align-middle text-left">
              <a class="btn btn-success" href="./ubah_detail_transaksi.php?id_transaksi=<?= $data_pembayaran['id_transaksi'] ?>">Edit</a>
            </td>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
  // var_dump($qry_pembayaran);
  ?>
</body>

</html>
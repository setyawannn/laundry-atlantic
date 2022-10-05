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
  $qry_get_user = mysqli_query($conn, "select * from user where id_user = '" . $_GET['id_user'] . "'");
  $dt_user = mysqli_fetch_array($qry_get_user);
  ?>
  <div class="container">
    <h3>Ubah user</h3>
    <form action="proses_ubah_user.php" method="post">
      <input type="hidden" name="id_user" value="<?= $dt_user['id_user'] ?> ">
      <div class="mb-3">
        <label for="nama_user" class="form-label">Nama</label>
        <input type="text" name="nama_user" class="form-control" value="<?= $dt_user['nama_user'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" class="form-control" value="<?= $dt_user['username'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="mb-3">
        <?php
        $arr_role = array('admin' => 'Admin', 'kasir' => 'Kasir', 'owner' => 'Owner');
        ?>
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" class="form-control">
          <?php foreach ($arr_role as $key_role => $val_role) :
            if ($key_role == $dt_user['role']) {
              $selek = "selected";
            } else {
              $selek = "";
            }
          ?>
            <option value="<?= $key_role ?>" <?= $selek ?>><?= $val_role ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <input type="submit" class="btn btn-primary mt-4 w-100" value="Tambah">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
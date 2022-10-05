<?php
error_reporting(0);
session_start();
if ($_SESSION['status_login'] == "admin") {
  header('location: admin/index_admin.php');
} elseif ($_SESSION['status_login'] == "kasir") {
  header('location: kasir/index_kasir.php');
} elseif ($_SESSION['status_login'] == "owner") {
  header('location: owner/index_owner.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In | Aplikasi Pembayaran Laundry</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>
    <!-- Login Section -->
    <section class="login">
      <!-- Container -->
      <div class="container">
        <div class="login-title text-center">
          <h1>Login</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <form action="proses_login.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </section>
    <!-- End of Login Section -->
  </body>

  </html>

<?php
}
?>
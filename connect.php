<?php
$conn = mysqli_connect('localhost', 'root', '', 'backup_laundry_ukl');
/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

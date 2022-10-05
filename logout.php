<?php

session_start();
session_destroy();
$_SESSION['status_login'] = "disconnect";
header('location: login.php');

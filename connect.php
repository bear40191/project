<?php

<<<<<<< HEAD
// session_start();
=======
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
>>>>>>> 02ee85926e41722511b5d0d81a9393120ff6748e

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "phuriwat";

$con = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno()) {
  echo "การเชื่อมต่อผิดพลาด" . mysqli_connect_error();
  exit();
}
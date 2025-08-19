<?php
require '../connect.php';
$filecsv = $_FILES['filecsv']['name'];
//ย้ายไฟล์ไปยังตำแหน่งชั่วคราว//
move_uploaded_file($_FILES['filecsv']['tmp_name'],'assets/user_csv/'.$filecsv);
$data_csv=fopen('assets/user_csv/'.$filecsv,'r');

while($array_csv = fgetcsv($data_csv)){
    $username=$array_csv[0];
    $password=$array_csv[1];
    $fullname=$array_csv[2];
    $phone=$array_csv[3];
    $email=$array_csv[4];
    $sql = "INSERT INTO user(username,password,fullname,phone,email) VALUES
    ('$username','$password','$fullname','$phone','$email')";
    $result = $con->query($sql);
    if ($result) {
      echo "<script>alert('อัปเดตข้อมูลสินค้าสำเร็จ ✅'); window.location.href='index.php?page=user_list';</script>";
    } else {
      echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล ❌'); history.back();</script>";
    }
  }

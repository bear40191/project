<?php
require '../connect.php';
$filecsv = $_FILES['filecsv']['name'];
//ย้ายไฟล์ไปยังตำแหน่งชั่วคราว//
move_uploaded_file($_FILES['filecsv']['tmp_name'],'assets/pro_csv/'.$filecsv);
$data_csv=fopen('assets/pro_csv/'.$filecsv,'r');

while($array_csv = fgetcsv($data_csv)){
    $pro_id=$array_csv[0];
    $pro_name=$array_csv[1];
    $pro_price=$array_csv[2];
    $pro_amount=$array_csv[3];
    
    $sql = "INSERT INTO products(pro_id, pro_name, pro_price, pro_amount) 
        VALUES ('$pro_id', '$pro_name', '$pro_price', '$pro_amount')";

    $result = $con->query($sql);
    if ($result) {
      echo "<script>alert('อัปเดตข้อมูลสินค้าสำเร็จ ✅'); window.location.href='index.php?page=user_list';</script>";
    } else {
      echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล ❌'); history.back();</script>";
    }
  }
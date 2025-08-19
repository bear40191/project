<?php
require '../connect.php';

// รับค่า pro_id จาก URL เพื่อใช้ดึงข้อมูล
$pro_id = $_GET['pro_id'] ?? '';

// ตรวจสอบว่า pro_id ถูกส่งมาหรือไม่
if (!empty($pro_id)) {
  $sql = "SELECT * FROM products WHERE pro_id = '$pro_id'";
  $result = $con->query($sql);
  $row = mysqli_fetch_array($result);
}

// เมื่อมีการกดปุ่มบันทึก
if (isset($_POST['save'])) {
  $pro_id     = $_POST['pro_id'];
  $pro_name   = $_POST['pro_name'];
  $pro_price  = $_POST['pro_price'];
  $pro_amount = $_POST['pro_amount'];
  $pro_status = $_POST['pro_status'];

  // เช็คไฟล์ภาพใหม่ ถ้าว่างใช้รูปเก่า
  if (!empty($_FILES['image']['name'])) {
    $filename = $_FILES['image']['name'];
    // อัปโหลดภาพใหม่
    move_uploaded_file($_FILES['image']['tmp_name'], 'assets/pro_img/' . $filename);
  } else {
    // ใช้รูปเก่าจากฐานข้อมูล
    $filename = $row['image'];
  }

  // ตรวจสอบค่าว่าง
  if (empty($pro_id) || empty($pro_name) || empty($pro_price) || empty($pro_amount) || empty($pro_status)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); history.back();</script>";
  } else {
    // อัปเดตข้อมูลสินค้า รวมถึงรูปภาพ
    $sql = "UPDATE products
            SET pro_name='$pro_name',
                pro_price='$pro_price',
                pro_amount='$pro_amount',
                pro_status='$pro_status',
                image='$filename'
            WHERE pro_id='$pro_id'";

    if ($con->query($sql)) {
      echo "<script>alert('อัปเดตข้อมูลสินค้าสำเร็จ ✅'); window.location.href='index.php?page=product';</script>";
    } else {
      echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล ❌'); history.back();</script>";
    }
  }
}
?>



<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">𝓔𝓭𝓲𝓽 𝓟𝓻𝓸𝓭𝓾𝓬𝓽 </h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">edit_product</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-danger card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">แก้ไขข้อมูลสินค้า 🖋</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">❗ รหัสสินค้า (ไม่สามารถแก้ไขได้) 🔒</label>
                                <input type="text" class="form-control" name="pro_id" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['pro_id'] ?>" readonly />
                                <div id="emailHelp" class="form-text">
                                    รหัสสินค้าจะต้องไม่ซ้ำกัน (Product_id must be unique.)
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ชื่อสินค้า </label>
                                <input type="text" name="pro_name" class="form-control" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_name'] ?>" />
                                <div id="emailHelp" class="form-text">
                                    ชื่อสินค้าจะต้องไม่ซ้ำกัน (Product_Name must be unique.)
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ราคาสินค้า 💰</label>
                                <input type="text" name="pro_price" class="form-control" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_price'] ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                                <input type="text" name="pro_amount" class="form-control" id="exampleInputPassword1"
                                       value="<?php echo $row['pro_amount'] ?>" />
                            </div>

                            <div class="mb-2">สถานะสินค้า</div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pro_status" id="status_in_stock" value="มีสินค้าในคลัง" <?php if ($row['pro_status'] == 'มีสินค้าในคลัง') echo 'checked'; ?>>
                                <label class="form-check-label" for="status_in_stock">
                                    มีสินค้าในคลัง
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pro_status" id="status_out_of_stock" value="ไม่มีสินค้าในคลัง" <?php if ($row['pro_status'] == 'ไม่มีสินค้าในคลัง') echo 'checked'; ?>>
                                <label class="form-check-label" for="status_out_of_stock">
                                    ไม่มีสินค้าในคลัง
                                </label>
                            </div>
                            <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">image</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="image" />
                      </div>
                        </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" name="save">บันทึกข้อมูล</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Quick Example-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
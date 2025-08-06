<?php
$pro_id = $_GET['pro_id'];
require '../connect.php';
//นำข้อมูลเดิมมาจาก Database
$sql = "SELECT * FROM products WHERE pro_id='$pro_id'";
$result = mysqli_query($con, $sql); // แบบ procedural
$row = mysqli_fetch_array($result);

if (isset($_POST['save'])) {

    // รับค่าจากฟอร์มและป้องกัน SQL Injection
    $pro_id     = mysqli_real_escape_string($con, $_POST['pro_id']);
    $pro_name   = mysqli_real_escape_string($con, $_POST['pro_name']);
    $pro_price  = mysqli_real_escape_string($con, $_POST['pro_price']);
    $pro_amount = mysqli_real_escape_string($con, $_POST['pro_amount']);
    
    // ตรวจสอบการรับค่า pro_status ให้ถูกต้อง
    $pro_status = isset($_POST['pro_status']) ? mysqli_real_escape_string($con, $_POST['pro_status']) : null;

    // --- 3. ตรวจสอบข้อมูล (แก้ไขเงื่อนไข) ---
    // ตรวจสอบว่าค่าที่จำเป็นไม่ใช่ค่าว่าง และ pro_status ต้องถูกตั้งค่า (ไม่เป็น null)
    if (empty($pro_id) || empty($pro_name) || $pro_price === '' || $pro_amount === '' || $pro_status === null) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); history.back();</script>";
    } else {
        // --- 4. สร้างและรันคำสั่ง SQL UPDATE (แก้ไขให้ถูกต้อง) ---
        $sql_update = "UPDATE products SET 
                        pro_name = '$pro_name', 
                        pro_price = '$pro_price', 
                        pro_amount = '$pro_amount', 
                        pro_status = '$pro_status'
                      WHERE pro_id = '$pro_id'"; // << แก้ไข WHERE clause ตรงนี้

        // รันคำสั่ง query เพียงครั้งเดียว
        if (mysqli_query($con, $sql_update)) {
            echo "<script>alert('ข้อมูลสินค้าถูกแก้ไขเรียบร้อยแล้ว ✅'); window.location.href='index.php?page=product';</script>";
        } else {
            // แสดงข้อผิดพลาดจาก MySQL เพื่อช่วยในการดีบัก
            echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล ❌: " . mysqli_error($con) . "'); history.back();</script>";
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
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
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
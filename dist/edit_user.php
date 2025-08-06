
<?php
$username = $_GET['username'];
require '../connect.php';
//นำข้อมูลเดิมมาจาก Database
$sql = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($con, $sql); // แบบ procedural
$row = mysqli_fetch_array($result);

if(isset($_POST['save'])) {
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $sql = "UPDATE user SET password= ' $password',fullname='$fullname',phone='$phone',email='$email'
  WHERE uesrname = '$username'";
   $result = mysqli_query($con, $sql);
   
  if (empty($password) || empty($fullname) || empty($phone) || empty($email)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');history.back();</script>";
  } else {
    $sql_update = "UPDATE user SET password='$password', fullname='$fullname', phone='$phone', email='$email' WHERE username='$username'";
    if ($con->query($sql_update)) {
      echo "<script>alert('ข้อมูลผู้ใช้ถูกแก้ไขเรียบร้อยแล้ว ✅');window.location.href='index.php?page=users_list'</script>";
    } else {
      echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล ❌');history.back();</script>";
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
        <h3 class="mb-0">𝐄𝐝𝐢𝐭 𝐔𝐬𝐞𝐫 🎈</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit_user</li>
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
        <div class="card card-primary card-outline mb-4">
          <!--begin::Header-->
          <div class="card-header">
            <div class="card-title">แก้ไขข้อมูลผู้ใช้ 🖋</div>
          </div>
          <!--end::Header-->
          <!--begin::Form-->
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <!--begin::Body-->
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">❗ Username (ไม่สามารถแก้ไขได้) 🔒</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                  aria-describedby="emailHelp" value="<?php echo $row['Username'] ?>" readonly />
                <div id="emailHelp" class="form-text">
                  ชื่อผู้ใช้จะต้องไม่ซ้ำกัน (Username must be unique.)
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password 🔓</label>
                <input type="text" name="password" class="form-control" id="exampleInputPassword1"
                  value="<?php echo $row['password'] ?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ชื่อ-นามสกุล ✒</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputPassword1"
                  value="<?php echo $row['fullname'] ?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">เบอร์โทรศัพท์ 📞</label>
                <input type="phone" name="phone" class="form-control" id="exampleInputPassword1"
                  value="<?php echo $row['phone'] ?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email ✉</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                  value="<?php echo $row['email'] ?>" />
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

    
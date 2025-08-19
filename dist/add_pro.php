<?php
require '../connect.php';
if (isset($_POST['save'])) {
  $pro_id = $_POST['pro_id'];
  $pro_name = $_POST['pro_name'];
  $pro_price = $_POST['pro_price'];
  $pro_amount = $_POST['pro_amount'];
  $pro_status = $_POST['pro_status'];
  $filename = $_FILES['image']['name'];

  if (empty($pro_id) ||  empty($pro_name) || empty($pro_price) || empty($pro_amount) || empty($pro_status)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');history.back();</script>";
  } else {
    $result = $con->query("SELECT pro_id FROM products WHERE pro_id = '$pro_id'");
    $exit_username = mysqli_fetch_array($result);
    if ($exit_username) {
      echo "<script>alert('ชื่อผู้ใช้ซ้ำ กรุณาเปลี่ยนชื่อผู้ใช้');history.back();</script>";
    } else {
      move_uploaded_file($_FILES['image']['tmp_name'],'assets/pro_img/'.$filename);
      $sql = "INSERT INTO products (pro_id, pro_name, pro_price, pro_amount,pro_status,image) VALUES ('$pro_id', '$pro_name', '$pro_price', '$pro_amount', '$pro_status','$filename')";
      if ($con->query($sql)) {
        echo "<script>window.lacation.href='index.php?page=user'</script>";
      } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');history.back();</script>";
      }
    }
  }
}

?>


<div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Add product Form</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add product</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-danger card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Quick Example</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form accept="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">รหัสสินค้า</label>
                        <input
                          type="text"
                          class="form-control"
                          name="pro_id"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                        />
                        
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ขื่อสินค้า</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pro_name" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ราคาสินค้า</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pro_price" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">จำนวน</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pro_amount" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">สถานะ</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pro_status" />
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">image</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="image" />
                      </div>
                
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-danger" name="save">Save</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->

              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6">
                
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                  <!--begin::JavaScript-->
                  <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (() => {
                      'use strict';

                      // Fetch all the forms we want to apply custom Bootstrap validation styles to
                      const forms = document.querySelectorAll('.needs-validation');

                      // Loop over them and prevent submission
                      Array.from(forms).forEach((form) => {
                        form.addEventListener(
                          'submit',
                          (event) => {
                            if (!form.checkValidity()) {
                              event.preventDefault();
                              event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                          },
                          false,
                        );
                      });
                    })();
                  </script>
                  <!--end::JavaScript-->
                </div>
                <!--end::Form Validation-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>

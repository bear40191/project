<?php
require '../connect.php';
if (isset($_POST['save'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $filename = $_FILES['image']['name'];

  if (empty($username) ||  empty($password) || empty($fullname) || empty($phone) || empty($email)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');history.back();</script>";
  } else {
    $result = $con->query("SELECT username FROM user WHERE username = '$username'");
    $exit_username = mysqli_fetch_array($result);
    if ($exit_username) {
      echo "<script>alert('ชื่อผู้ใช้ซ้ำ กรุณาเปลี่ยนชื่อผู้ใช้');history.back();</script>";
    } else {
      move_uploaded_file($_FILES['image']['tmp_name'],'assets/user_img/'.$filename);
      $sql = "INSERT INTO user (username, password, fullname, phone, email,image) VALUES ('$username', '$password', '$fullname', '$phone', '$email','$filename')";
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
                <h3 class="mb-0">Add user Form</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add user</li>
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
                <div class="card card-primary card-outline mb-4">
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
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input
                          type="text"
                          class="form-control"
                          name="username"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                        />
                        <div id="emailHelp" class="form-text">
                          We'll never share your Username with anyone else.
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="fullname" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phonenumber</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="phone" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">email</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="email" />
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


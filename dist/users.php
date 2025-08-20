<?php
require '../connect.php';
$sql = "SELECT * from user";
$result = $con->query($sql);

?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-3">
                <h3 class="mb-0">users Tables</h3>
              </div>
              <div class="col-sm-6">
                <form action="index.php?page=find_user" class="row" method="POST">
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name ="keyword" placeholder="กรอกสิ่งต้องการเพื่อค้นหา">
                  </div>
                  <div class="col-sm-2">
                    <button class="btn btn-primary"><i class="bi bi-radioactive"></i></button>
                  </div>
                </form>
              </div>
              <div class="col-sm-3">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="users_list">Users Tables</li>
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
            <div class="row">
              <div class="col-md-15">
                <div class="card mb-4">
                  <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Users</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
            <div class="row align-items-center">
              <div class="col-md-10">
                <form action="user_csv.php" method="post" enctype="multipart/form-data" class="row align-items-center">
                  <label for="filecsv" class="col-md-4 col-form-label">UPLOAD YOUR FILE</label>
                  <div class="col-md-6">
                    <input type="file" name="filecsv" id="filecsv" class="form-control" required>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">UPLOAD</button>
                  </div>
                </form>
              </div>
              <div class="col-md-2 text-end">
                <a href="index.php?page=add_user" class="btn btn-success"> ADD USER</a>
              </div>
            </div>
          </div>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th>ลำดับที่</th>
                          <th >Username</th>
                          <th>fullname</th>
                          <th>email</th>
                          <th >Phone</th>
                          <th>image</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>  
                      <tbody>
                         
                        <?php
                        $i = 1 ;
                        while($row = mysqli_fetch_array($result)){

                        ?>
                        <tr class="align-middle">
                          <td><?php echo $i ?></td>
                          <td><?php echo $row['Username']?></td>
                          <td><?php echo $row['fullname']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['phone']?></td>
                            <td><img src="assets/user_img/<?php echo $row ['image']?>" width="100"></td>
                            <td>
                              <!-- ใส่ปุ่มแก้ไขข้อมูล -->
                              <a href="index.php?page=edit_user&username=<?php 
                              echo $row['Username']?>" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i></a>
                                <!-- ใส่ปุ่มลบข้อมูล -->
                                <a href="index.php?page=del_user&username=<?php 
                              echo $row['Username']?>" class="btn btn-danger"
                              onclick="return confirm('มึงแน่ใจหรอ')">
                                  <i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                        
                      </tbody>
                    <?php 
                    $i++ ;
                } 
                ?>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item">
                        <a class="page-link" href="#">&laquo;</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.card -->

                
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
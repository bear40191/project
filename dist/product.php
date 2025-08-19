<?php
require '../connect.php';
$sql = "SELECT * from products";
$result = $con->query($sql);

?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Product Tables</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="users_list">Product Tables</li>
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
                  <div class="card-header bg-danger text-white">
                    <h3 class="card-title">Product_list</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
            <div class="row align-items-center">
              <div class="col-md-10">
                <form action="pro_csv.php" method="post" enctype="multipart/form-data" class="row align-items-center">
                  <label for="filecsv" class="col-md-4 col-form-label">UPLOAD YOUR FILE</label>
                  <div class="col-md-6">
                    <input type="file" name="filecsv" id="filecsv" class="form-control" required>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">UPLOAD</button>
                  </div>
                </form>
              </div>
              <div class="card-body">
                    <a href="index.php?page=add_pro" class="btn btn-success mb-4">
                      <i class="nav-icon bi bi-people">+Add Product</i></a>
            </div>
          </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>Product_id</th>
                          <th >Product_Name</th>
                          <th>Product_Price</th>
                          <th>Product_Amound</th>
                          <th>Product_Status</th>
                          <th>ตัวอย่างสินค้า</th>
                          <th>แก้ไขข้อมูล</th>
                          
                        </tr>
                      </thead>  
                      <tbody>
                         
                        <?php
                        $i = 1 ;
                        while($row = mysqli_fetch_array($result)){

                        ?>
                        <tr class="align-middle">
                          <td><?php echo $i ?></td>
                          <td><?php echo $row['pro_id']?></td>
                          <td><?php echo $row['pro_name']?></td>
                          <td><?php echo $row['pro_price']?></td>
                            <td><?php echo $row['pro_amount']?></td>
                            <td><?php echo $row['pro_status']?></td>
                            <td><img src="assets/pro_img/<?php echo $row ['image']?>" width="100"></td>
                            <td>
                              <!-- ใส่ปุ่มแก้ไขข้อมูล -->
                              <a href="index.php?page=edit_pro&pro_id=<?php 
                              echo $row['pro_id']?>" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i></a>
                                <!-- ใส่ปุ่มลบข้อมูล -->
                                <a href="index.php?page=del_pro&pro_id=<?php 
                              echo $row['pro_id']?>" class="btn btn-danger"
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
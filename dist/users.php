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
              <div class="col-sm-6">
                <h3 class="mb-0">users Tables</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <a href="index.php?page=add_user" class="btn btn-success mb-4"><i class="nav-icon bi bi-people">+Add user</i></a>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th>#</th>
                          <th >Username</th>
                          <th>fullname</th>
                          <th>email</th>
                          <th >Phone</th>
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
                            <td>
                              <a href="index.php?page=edit_user&username=<?php 
                              echo $row['Username']?>" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i></a>

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
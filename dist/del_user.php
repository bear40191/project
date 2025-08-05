<?php
<<<<<<< HEAD
    $username = $_GET['username'];
    require '../connect.php';
    $sql = "DELETE FROM user WHERE username = '$username'";
    $result = $con->query($sql);
    if(!$result){
        echo "<script> alert('ไม่สามารถลบข้อมูลได้')</script>";
    }else{
        echo "<script>window.location.href='index.php?page=users_list'</script>";
    }
?>
=======
    $username = $_GET["username"]; 
    require '../connect.php'; 
    $sql = "DELETE FROM narak WHERE username='$username'";
    $result = $con->query($sql);
    if (!$result) {
        echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
    }else{
        echo "<script>window.location.href='index.php?page=user_list'</script>";
    }
    ?>
>>>>>>> 02ee85926e41722511b5d0d81a9393120ff6748e

<?php
session_start();
?>
<?php
include 'conect.php';
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];

    $sql="delete from `crud` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        $_SESSION['success']=" data delete Successfully";
        //echo "delete successfull";
        header ('location:show.php');
    }else{
        die(mysqli_error($con));
    }
}

?>
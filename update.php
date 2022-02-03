<?php
session_start();
?>
<?php
include 'conect.php';
$id=$_GET['update_id'];
$sql="select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$price=$row['price'];
$size=$row['size'];
$description=$row['description'];
$color=$row['color'];
$image=$row['image'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $size=$_POST['size'];
    $description=$_POST['description'];
    $color=$_POST['color'];
  //  $image=$_POST['image'];

    $sql="update `crud` set id=$id,name='$name',price='$price',size='$size',description='$description',color='$color',image='$image' where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        $_SESSION['success']="update Successfully";
        //echo "data update successfull";
        header('location:show.php');
    }else{
        die(mysqli_error($con));
    }
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>crud operation</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product name" name="name" autocomplete="off" value=<?php echo $name ;?>>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your Product price" name="price" autocomplete="off" value=<?php echo $price ;?>>
            </div>
            <div class="form-group">
                <label>Product Size</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product size" name="size" autocomplete="off" value=<?php echo $size ;?>>
            </div>
            <div class="form-group">
                <label>Product description</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product description" name="description" autocomplete="off" value=<?php echo $description ;?>>
            </div>
            <div class="form-group">
                <label>Product Color</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product Color" name="color" autocomplete="off" value=<?php echo $color ;?>>
            </div>
            <div class="form-group">
                <label for="pwd">Image:</label>
                <input type="file" class="form-control" id="pwd" name="image" value=<?php echo $image ;?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
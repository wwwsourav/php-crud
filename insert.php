<?php
session_start();
?>

<?php
include 'conect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $size=$_POST['size'];
    $description=$_POST['description'];
    $color=$_POST['color'];

    $file_name=$_FILES['image']['name'];
	//print_r($file_name); exit();
    $file_type=$_FILES['image']['type'];
	$file_size=$_FILES['image']['size'];
	$file_temp_loc=$_FILES['image']['tmp_name'];
	$file_store="upload/".$file_name;
	move_uploaded_file($file_temp_loc, $file_store);
	//print_r($file_name);

    $file_name=$_FILES['image']['name'];
    $sql="insert into `crud` (name,price,size,description,color,image) values('$name','$price','$size','$description','$color','$file_name')";
    $result=mysqli_query($con,$sql);
    if($result){
        $_SESSION['success']="Add Record Successfully";
        //echo "data inserted successfull";
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
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product name" name="name" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your Product price" name="price" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Product Size</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product size" name="size" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Product description</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product description" name="description" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Product Color</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your product Color" name="color" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pwd">Image:</label>
                <input type="file" class="form-control" id="pwd" name="image">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
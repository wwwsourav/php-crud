<?php
session_start();
?>
<?php
include 'conect.php';

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
    <div class="container">
        <button class="btn btn-primary my-5"><a href="insert.php" class="text-light">Add user</a> </button>
        <?php if(isset($_SESSION['success'])){?>
          <div class="alert alert-success">
            <strong>Info!</strong> <?php echo $_SESSION['success'];?>
          </div>
          <?php
          }
          unset($_SESSION['success']);
          ?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">SI no</th>
                <th scope="col">product Name</th>
                <th scope="col">product price</th>
                <th scope="col">product size</th>
                <th scope="col">product description</th>
                <th scope="col">product color</th>
                <th scope="col">product image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

            $sql="select * from `crud`";
            $result=mysqli_query($con,$sql);
            if($result){
                // $row=mysqli_fetch_assoc($result);
                // echo $row['name'];
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $name=$row['name'];
                    $price=$row['price'];
                    $size=$row['size'];
                    $description=$row['description'];
                    $color=$row['color'];
                    $image=$row['image'];
                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td>'.$size.'</td>
                    <td>'.$description.'</td>
                    <td>'.$color.'</td>
                    <td><img src="upload/'.$image.'" width="150px" height="100px"></td>
                    <td>
                    <button class="btn btn-primary"><a href="update.php?update_id='.$id.'"id="p2" class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php?delete_id='.$id.'"id="p1" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
                }
            }



                ?>
                
            </tbody>
        </table>
    </div>

   

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
  $("#p1").mouseup(function(){
    alert("your data delete");
  });
});
$(document).ready(function(){
  $("#p2").mouseup(function(){
    alert("your data update");
  });
});
</script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php require 'conn.php' ; ?>
  
  <div class="container" style="padding-top:70px;padding-right:100px;
  padding-left:100px;">
  <div class="h2 text-center text-dark">Enter Information</div>
  <form action="" method="post" enctype="multipart/form-data"
  class=" p-3" style="background:#136626">
      <div class="col">
          <div class="row">
              <input type="text" name="id" value = <?php echo $id ?>>
              <div class="form-group col-lg-6 py-3">
                  <input type="text" 
                  name="username"class="form-control"
                   placeholder="Username"style="border-radius:15px;
                   background:transparent;" value ='<?php echo $name; ?>'>
              </div>
              <div class="form-group col-lg-6 py-3">
                  <input type="email"
                   name="email" class="form-control"
                   placeholder="email"style="border-radius:15px;
                   background:transparent;" value ='<?php echo $email ?>'>
              </div>
              <div class="form-group col-lg-6 py-3">
                  <input type="password"  
                  name="password"class="form-control"
                   placeholder="password"style="border-radius:15px;
                   background:transparent;" value ='<?php echo $password ?>'>
              </div>
              <div class="form-group col-lg-6 py-3">
                  <input type="file" 
                   name="image" class="form-control"
                   placeholder="image"style="border-radius:15px;
                   background:transparent;" value ='<?php echo $image ?>'>
              </div>
              <div class="form-group col-lg-6 py-3">
                  <input type="text"  
                   name="detail" class="form-control"
                       placeholder="Details"style="border-radius:15px;
                       background:transparent;resize :none;" value ='<?php echo $detail ?>'>
              </div>
             <?php if($update == TRUE): ?>
                    <center><input type="submit"name="update" 
                    class="btn btn-info"value="update"> </center>
                <?php else: ?>
                    <center><input type="submit"name="submit" 
                    class="btn btn-success"value=" submit"> </center>
             <?php endif; ?>
          </div>
         
      </div>
  </form>
</div>
</div>
  <?php  
   $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli)); 
   $record = $mysqli->query("SELECT* FROM record ");
  ?>
<div class="container mt-5" >
      <div class="row">
             <table class="table-bordered text-dark text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $record->fetch_assoc()) :?>
                    <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><img src="upload/<?php echo $row['image']; ?>" 
                    width=50 height=50 alt=""></td>
                    <td><?php echo $row['detail']; ?></td>
                    <td><a href="crud.php?edit=<?php echo $row['id'] ?>"
                     class="btn btn-info btn-sm">Edit</a></td>
                     <td><a href="crud.php?del=<?php echo $row['id'] ?>"
                     class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
           </table>
       </div>
</div>
</body>
</html>
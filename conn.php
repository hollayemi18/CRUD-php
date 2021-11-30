<?php 
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli)); 
$name ="";
$email ="";
$password ="";
$image ="";
$detail ="";
$id = 0;
$update = FALSE;

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $detail = $_POST['detail'];
    if(!empty($email) && !empty($password)){
     $insert = $mysqli->query("INSERT INTO RECORD(name,email,password,image,detail) 
        VALUES('$name','$email','$password','$image','$detail')");
        if($insert = TRUE){
            move_uploaded_file($tmp_name, 'upload/image');
        }
    }
    header('location:crud.php');


}
if(isset($_GET['del'])){
    $id_del = $_GET['del'];
    $mysqli->query("DELETE FROM record WHERE id  = '$id_del' ");
    header('location:crud.php');
}
if(isset($_GET['edit'])){
    $id_edit = $_GET['edit'];
    $in =  $mysqli->query("SELECT* FROM record WHERE id  = '$id_edit' ");
    $update = TRUE;
    if(!empty($in)){
         $data = $in->fetch_array();
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $image = $data['image'];
        $detail = $data['detail'];
    }
}
if(isset($_POST['update'])){
    $id_update = $_POST['id'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $detail = $_POST['detail'];
    if(!empty($email) && !empty($password)){
    $mysqli->query("UPDATE record SET name='$name',email='$email',
    password = '$password',image='$image',detail='$detail' WHERE id = $id_update ");
    }
    header('location:crud.php');
}
?>
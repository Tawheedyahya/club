<?php
include "function.php";
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $conn=new mysqli("localhost","root","","club");
    $sql="SELECT email from logi";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
       $_SESSION['email']=trim($_POST['email']);
       $em=false;
    if($_SESSION['email']==trim($row['email'])){
      $_SESSION['otp']=email();
      echo $_SESSION['otp'];
      $em=true;
      header("location:otp.php");
      exit();
    }
    if(!$em){
        echo "<script>
        window.onload=function(){
        let err=document.querySelector('form');
        err.classList.add('error');}
        </script>";
    }    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="design.css" rel="stylesheet">
    <style>
      .container {
    display: grid;
    place-items: center;
    height:90vh;
}
 </style>
</head>
<body>
  <?php include 'header.php';?>
    <div class="container">
       <form action="" method='POST'>
            <div class="row">
                <div class="col-3">
                    <label for="email">email</label>
                </div>
                <div class="col-8">
                    <input type="text" name="email" id="" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col d-flex justify-content-center">
                    <button type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
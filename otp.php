<?php
session_start();
echo $_SESSION['otp'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $e_otp=$_POST['e_otp'];
    if($e_otp == $_SESSION['otp']){
        header("location:change_pass.php");
        exit();
    }
    else{
        echo "<script>
        window.onload=function(){
          let err = document.querySelector('form'); 
          err.classList.add('error');
          }
        </script>";
    
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
        .container{
            display:grid;
            place-items:center;
            height:100vh;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <form action="" method="POST">
            <div class="row ">
                <div class="col">
                    <label for="">enter otp</label>
                    <input type="text" name="e_otp" id="" class="form-control mt-2">
                </div>
                <div class="row pt-3">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="">submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
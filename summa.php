<?php
session_start();
unset($_SESSION['otp']);
 $conn=new mysqli("localhost","root","","club");
$sql="SELECT * from logi";
$result=mysqli_query($conn,$sql);
$users=[];
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
    $users[]=$row;
    }
 } 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $found = false;
    if (!empty(trim($_POST['nam'])) && !empty(trim($_POST['pass']))) {
        $_SESSION['nam'] =htmlspecialchars($_POST['nam']);
        $_SESSION['pass'] =htmlspecialchars($_POST['pass']);
        foreach($users as $user){
        if ($_SESSION['nam'] == trim($user['na']) && $_SESSION['pass'] == trim($user['pa'])) {
            $nam=$_SESSION['nam'];
            $pass=$_SESSION['pass'];
            setcookie('nam',$nam,time()+(10*1*1*1),"/");
            setcookie('pass',$pass,time()+(10*1*1*1),"/");
            header("location:admin.php");
            $found=true;
            break;}
        }
    }
    if (!$found) {
        echo "<script>
        window.onload=function(){
        alert('enter valid name and pass')
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
    <style>
        .for {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        button {
            border-radius: 20px;
            font-weight: 600;
        }
        a {
            text-decoration: none;
        }
        form {
            padding: 60px 30px;
            border-radius: 20px;
        }
        h1, label {
            background: linear-gradient(to right, black, red);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .error {
    border: 2px solid red;
    animation: blink-border 1s infinite;
}

@keyframes blink-border {
    0% {
        border-color: red;
    }
    50% {
        border-color: transparent;
    }
    100% {
        border-color: red;
    }
}

    </style>
</head>
<body>
    <?php include 'header.php';?>
    <div class="container">
        <div class="for">
            <form action="" method="POST" >
                <div class="row mb-4">
                    <h1 class="text-center display-1">login</h1>
                </div>
                <!--email-->
                <div class="row mb-3">
                    <div class="col-4"><label for="" class="form-label fs-2">email</label></div>
                    <div class="col-8"><input type="text" name="nam" id="" class="form-control"></div>
                </div>
                <!--pass-->
                <div class="row mb-3">
                    <div class="col-4"><label for="" class="form-label fs-2 me-lg-5">password</label></div>
                    <div class="col-8"><input type="text" name="pass" id="" class="form-control ms-lg-0"></div>
                </div>
                <div class="row d-flex justify-content-center mt-3">
                    <button class="col-auto px-4 fs-4">save</button>
                    <a href="forgot_pass.php" class="col-auto fs-4">forgot pass?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

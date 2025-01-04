 <?php
session_start();
$d_email=$_SESSION['email'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $exit=false;
    if(isset($_SESSION['otp'])){
    $n_pass=htmlspecialchars($_POST['n_pass']);
    $rn_pass=htmlspecialchars($_POST['rn_pass']);
    $b_pass=false;
    $exit=true;
    if($n_pass == $rn_pass){
        $b_pass=true;
        $conn=new mysqli("localhost","root","","club");
        $sql="UPDATE logi set pa=$n_pass where email='$d_email'";
        mysqli_query($conn,$sql);
        unset($_SESSION['otp']);
        echo "<script>
        alert('password change successfully');
        window.location.href='login.php';
        </script>";
        exit();
}
if(!$b_pass){
    echo "<script>
    window.onload=function(){
    let err=document.querySelector('form');
    err.classList.add('error');
    }
    let instruct=document.getElementByClassName('instruct');
    instruct.innerText='enter the same pass on both fields';
    </script>";
}
}
if(!$exit){
 header("location:login.php");
 exit();
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
            height:90vh;
            place-items:center;
        }
    </style>
</head>
<body>
    <?php 
    include "header.php";
    ?>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
              <div class="col">
                <label for="">new password</label>
                <input type="text" name="n_pass" id="" class="form-control">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <label for="">re-type password</label>
                <input type="text" name="rn_pass" id="" class="form-control">
              </div>
            </div>
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <button type="submit">save</button>
                </div>
            </div>
        </form>
        <div class="instruct"></div>
    </div>
</body>
</html>
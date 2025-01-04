<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $s_name=$_POST['s_name'];
    $reg_no=$_POST['reg_no'];
    $place=$_POST['place'];
    $phone=$_POST['phone'];
    $conn=new mysqli("localhost","root","","club");
    $sql="SELECT reg_no from students";
    $found=false;
    $result=mysqli_query($conn,$sql);
    while($row=$result->fetch_assoc()){
        if($reg_no==$row['reg_no']){
            echo "<script>
            alert('regno is already registered')
            </script>";
            $found=true;
            break;
        }
    }
    if(!$found){
        $sql="INSERT into students(s_name,reg_no,place,phone) values ('$s_name','$reg_no','$place','$phone')";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("location:view.php");
            exit();
        }
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
    <link href="design.css" rel="stylesheet"/>
    <style>
        .container{
            display:flex;
            height:100vh;
            align-items:center;
            justify-content:center;
        }
        input{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <form action="" method='POST'>
           name:<input type="text" name="s_name" id="" class="form-control">
           reg_no:<input type="text" name="reg_no" id="" class="form-control">
           place:<input type="text" name="place" id="" class="form-control">
           phone:<input type="text" name="phone" id="" class="form-control">
           <button type='submit'>submit</button>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
$conn=new mysqli("localhost","root","","club");
$current_time=time();
echo $current_time."<br>";
$sql="SELECT i_id,a_img,e_time from announcement";
$result=mysqli_query($conn,$sql);
$found=false;
if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
        if($rows['e_time'] < $current_time){
            echo "yes"."<br>";
        }
        // if($current_time>strtotime($rows['expiration_time'])){
        //     $sql1="DELETE from im where id={$rows['id']}";
        //     mysqli_query($conn,$sql1);
        //     $found=true;
        // }
        if(!$found){
           echo "<img src='a_img/{$rows['a_img']}' height='200px' width='200px'class='img-fluid' />";
        }
    }
}
?>
</body>
</html>
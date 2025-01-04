<?php
if(isset($_GET['i_id'])){
    $conn=new mysqli("localhost","root","","club");
    $sql4="DELETE from announcement where i_id='{$_GET['i_id']}'";
    $result=mysqli_query($conn,$sql4);
}
if(isset($_POST['d_all'])){
    $conn=new mysqli("localhost","root","","club");
    $sql6="TRUNCATE table announcement";
    $result=mysqli_query($conn,$sql6);
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
        /* .show{
            border:2px solid black;
            width: 100%;
        } */
         .u{
            border:1px solid red;
         }
    </style>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <form action="" method="POST">
        <div class="d_all d-flex justify-content-end ">
    <button name='d_all'>delete all</button>
    </div>
    </form>
<?php
$conn=new mysqli("localhost","root","","club");
$current_time=time();
$sql="SELECT i_id,a_img,e_time,t_ann from announcement";
$result=mysqli_query($conn,$sql);
$found=false;
if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
        if($rows['e_time'] < $current_time){
            $sql1="DELETE from announcement where i_id={$rows['i_id']}";
            mysqli_query($conn,$sql1);
            $found=true;
        }
        // if($current_time>strtotime($rows['expiration_time'])){
        
        // }
        if(!$found){
            echo "<div class='container-fluid'> 
            <div class='show'>"; 
            echo "<img src='a_img/{$rows['a_img']}' class='img-fluid'/>
            "; 
            echo "<div class='row'> 
            <textarea rows='4' cols='50' readonly>{$rows['t_ann']}</textarea>
            </div> 
            <div class='mb-5'>
            <a href='?i_id={$rows['i_id']}' name='ann_delete'>delete</a>
            </div>
            <div class='row u'></div>
            <br>
            </div>
            </div>";
        }
    }
}
?>
</body>
</html>
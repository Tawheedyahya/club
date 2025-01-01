<?php
$id=$_GET['id'];
$t_ime=$_GET['time'];
$conn=new mysqli("localhost","root","","club");
$sql="SELECT id,chek from attend where id='$id' and t_ime='$t_ime'";
$result=mysqli_query($conn,$sql);
foreach($result as $result){
    if($result['chek']=='present'){
        $sql1="UPDATE attend set chek='absent' where id='$id' and t_ime='$t_ime'";
        mysqli_query($conn,$sql1);
        header("location:viewattendance.php");
        exit();
    }
    else{
        $sql2="UPDATE attend set chek='present' where id='$id' and t_ime='$t_ime'";
        mysqli_query($conn,$sql2);
        header("location:viewattendance.php");
        exit();
    }
}
?>
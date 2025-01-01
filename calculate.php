<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $conn=new mysqli("localhost","root","","club");

    $p_check=$_POST['p_check'];
    $check=isset($_POST['check'])?$_POST['check']:"";
    foreach($check as $reg_no){
    $sql="INSERT into att(reg_no,attent) values ('$reg_no','present')";}
    mysqli_query($conn,$sql);
    } 

?>
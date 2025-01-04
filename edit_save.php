<?php
if($_SERVER['REQUEST_METHOD']='POST'){
    $conn = new mysqli("localhost", "root", "", "club");
    $sql="UPDATE students set reg_no='{$row['reg_no']}' s_name='{$row['s_name']}' phone='{$row['phone']}' place='{$row['place']}' where id='{$row['id']}'";
    mysqli_query($conn,$sql);
    
}
?>
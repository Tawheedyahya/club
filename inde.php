<?php
$conn=new mysqli("localhost","root","","club");
$sql="SELECT * from logi";
$result=mysqli_query($conn,$sql);
while($row=$result->fetch_assoc()){
    $nam = isset($_COOKIE['nam']) ? $_COOKIE['nam'] : '';
    $pass = isset($_COOKIE['pass']) ? $_COOKIE['pass'] : '';
    if ($nam ==$row['na']  && $pass == $row['pa']) {
        header("Location: admin.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }    
}

?>

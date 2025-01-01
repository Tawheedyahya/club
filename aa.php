<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table td{
            padding:50px;
        }
    </style>
</head>
<body>
   <?php
   $conn=new mysqli("localhost","root","","club");
   $sql="SELECT * from students";
   $result=mysqli_query($conn,$sql);
   if($result->num_rows>0){
    echo "<form action='calculate.php' method='POST'>";
    echo "<table border='1' >";
    while($row=$result->fetch_assoc()){
        echo "<tr>
        <td>{$row['s_name']}</td>
        <td><input type='checkbox' name='p_check[]' value={$row['reg_no']} ></td>
        <td><input type='checkbox' name='check[]' value={$row['reg_no']}></td>
        </tr>
        ";
    }
    echo "</table>";
    echo "<button type='submit'>save</button>
    </form>";
   }
   
   ?>
</body>
</html>
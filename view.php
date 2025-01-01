<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="design.css" rel="stylesheet">
  
    <style>
        .insert{
            background-color:red;
            padding:10px;
            border-radius:50px;
            color:white;
        }
        
    </style>
    
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <div class="container">
        <div class='my-5  d-flex justify-content-around'>
        <a href="v_insert.php" class='text-decoration-none insert '>insert</a>
        <a href="viewattendance.php" class='text-decoration-none insert '>view attendance</a>
        </div>
        <?php
        $conn=new mysqli("localhost","root","","club");
        $sql="SELECT * from students";
        $result=mysqli_query($conn,$sql);
        if($result->num_rows>0){
            echo "<table class='table table-responsive'>
            <tr><th>regno</th>
            <th >s_name</th>
            <th >phone</th>
            <th >place</th>
            <th >edit</th>
            <th >delete</th></tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>
                <td >{$row['reg_no']}</td>
                <td >{$row['s_name']}</td>
                <td >{$row['place']}</td>
                <td >{$row['phone']}</td>
                <td><a href='edit.php?reg_no={$row['reg_no']}' >edit</a></td>
                <td><a href='delete.php?reg_no={$row['reg_no']}'>delete</a></td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
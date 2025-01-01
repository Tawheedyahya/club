<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      table,tr,td,th{
        border:1px solid red;
      }
      table{
        width: 100%;
        text-align:center;
      }
      
    </style>
</head>
<body>
    <div class="container">
        <form action="" class="m-5" method="POST">
            <input type="date" name="date" id="">
            <button type="submit">search</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
          $d_ate=$_POST['date'];
          $conn=new mysqli("localhost","root","","club");
          $sql = "SELECT s.s_name, s.reg_no, a.chek, a.t_ime ,a.id
          FROM students AS s 
          left JOIN attend AS a 
          ON s.id = a.id 
          WHERE DATE(a.t_ime) = '$d_ate' 
          ORDER BY s.reg_no";
  
          $result=mysqli_query($conn,$sql);
          echo "<table class='table table-responsive'>
          <tr>
          <th>s_name</th>
          <th>reg_no</th>
          <th>attend</th>
          <th>time</th>
          <th>change attend</th>
          </tr>";
          while($row=$result->fetch_assoc()){
            echo "<tr>
            <td>{$row['s_name']}</td>
            <td>{$row['reg_no']}</td>
            <td>{$row['chek']}</td>
            <td>{$row['t_ime']}</td>
            <td><a href='attend_edit.php?id={$row['id']}&time={$row['t_ime']}'>change</a></td></tr>
</tr>";
          }
          echo "</table>";
        }
        ?>

    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $conn = new mysqli("localhost", "root", "", "club");
    $reg_no=$_POST['reg_no'];
    $s_name=$_POST['s_name'];
    $place=$_POST['place'];
    $phone=$_POST['phone'];
    $idd=$_POST['id'];
    $id=(int)$idd;
    var_dump($id);
    $sql = "UPDATE students SET reg_no='$reg_no', s_name='$s_name', place='$place', phone='$phone' WHERE id=$id";
   $result= mysqli_query($conn,$sql);
   if($result){
    header("location:view.php");
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
    <link href="design.css" rel="stylesheet">
    <style>
        .form-container {
            display: grid;
            grid-template-rows: 1fr;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .form-control {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
$conn = new mysqli("localhost", "root", "", "club");
$sql = "SELECT * FROM students WHERE reg_no='{$_GET['reg_no']}'";
$result = mysqli_query($conn, $sql);
if ($row = $result->fetch_assoc()) {
    echo "<div class='container form-container'>
    <form action='' method='POST'>
    <input type='text' name='reg_no' value='{$row['reg_no']}' class='form-control'/>
    <input type='text' name='s_name' value='{$row['s_name']}' class='form-control'/>
    <input type='text' name='place' value='{$row['place']}' class='form-control'/>
    <input type='text' name='phone' value='{$row['phone']}' class='form-control'/>
    <input type='text' hidden name='id' value='{$row['id']}' class='form-control'/>
    <button  name='submit' class='btn btn-primary'>Submit</button>
    </form>
    </div>";
}
$conn->close();
?>
</body>
</html>

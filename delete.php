<?php
if (isset($_POST['okay'])) {
    $reg_no = $_GET['reg_no'];
    $conn = new mysqli("localhost", "root", "", "club");
    $sql= "SELECT id,reg_no FROM students WHERE reg_no='$reg_no'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        if ($reg_no == $row['reg_no']) {
            echo $row['id'];
            $sql1="DELETE from attend where id='{$row['id']}'";
            mysqli_query($conn,$sql1);
            $sql2="DELETE from students where id='{$row['id']}'";
            mysqli_query($conn,$sql2);
            header("location:view.php");
            exit();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .container{
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
    }
    form{
      border:2px solid red;
      padding:10px;
      background-color:yellow;
      border-radius:35px;
    }
    .confirm{
        display:flex;
        justify-content:center;
    }
    input{
        border-radius:15px;
        margin-right:15px;
    }
</style>
<body>
    <div class="container">
        <form action="" method='POST'>
           <p>ARE U SURE YOU WANT TO DELETE THE PERSON<?php echo "<br> ".$_GET['reg_no']; ?> ?</p>
           <div class="confirm">
           <input type="submit" name="okay" id=""> 
           <input type="submit" name="cancel" value="cancel" id="">
           </div>           
        </form>

    </div>
</body>
</html>
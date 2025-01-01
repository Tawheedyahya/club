<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $g = isset($_POST['g']) ? $_POST['g'] : [];
    $n = isset($_POST['n']) ? $_POST['n'] : [];
    $conn = new mysqli("localhost", "root", "", "club");

    foreach ($n as $na) {
        if (in_array($na, $g)) {
            $sql = "INSERT INTO attend (id, chek) VALUES ($na, 'present')";
            $conn->query($sql);
        } else {
            $sql = "INSERT INTO attend (id, chek) VALUES ($na, 'absent')";
            $conn->query($sql);
        }
    }

    $conn->close();
}

// if($_SERVER['REQUEST_METHOD']="POST"){
//     $g = isset($_POST['g']) ? $_POST['g'] : '';
//     var_dump($g);
//     $n =isset($_POST['n']) ?$_POST['n']: '';
//     var_dump($n);
//     $conn = new mysqli("localhost", "root", "", "club");
//     foreach ($n as $na){
//         if (in_array($na, $g)) {
//             $sql = "INSERT INTO attend (id,chek) VALUES (int($n) ,'present')";
//             $conn->query($sql);}
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
    </style>
</head>
<body>
    <?php
    include "header.php";
    ?>
<?php
$conn=new mysqli("localhost","root","","club");
$sql="SELECT * from students order by reg_no";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
    echo "<form action='' method='POST'>
    <table class='table table-striped'>
    <tr><th>reg_no</th>
    <th>s_name</th>
    <th>attend</th></tr>
    ";
    while($row = $result->fetch_assoc()){
        echo "<tr>
        <td>{$row['reg_no']}</td>
        <td>{$row['s_name']}</td>
        <td><input class='form-check-input' type='checkbox' name='g[]' value={$row['id']}></td></tr>
        <input type='text' name='n[]' value={$row['id']} hidden>
        ";

    }
    echo "
    </table>
    <div class='d-flex justify-content-center'>
    <button type='submit'>click</button></div>
    </form>";
}
?>

</body>
</html>
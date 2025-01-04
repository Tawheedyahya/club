<?php
 $conn=new mysqli("localhost","root","","club");
// // $sql="CREATE database club";
// $sql="ALTER table logi modify id int not null ";
// mysqli_query($conn,$sql);

// $sql = "CREATE TABLE students ( s_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, reg_no VARCHAR(100) NOT NULL UNIQUE, s_name VARCHAR(50), logi_id INT, FOREIGN KEY (logi_id) REFERENCES logi(id) )";
// mysqli_query($conn,$sql);

$sql="CREATE table att(
s_id int not null,
FOREIGN KEY(s_id) references students(s_id),
attent ENUM('present','absent') default 'absent'
)";
mysqli_query($conn,$sql);
?>

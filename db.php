
<?php
/* CREATE TABLE LOGI(
ID INT,
NA VARCHAR(20),
PA VARCHAR(20),
EMAIL VARCHAR(100)
); 

CREATE TABLE STUDENTS(
ID INT PRIMARY KEY AUTO_INCREMENT,
REG_NO VARCHAR(20),
S_NAME VARCHAR(20),
PHONE VARCHAR(20),
PLACE VARCHAR(20)
);

CREATE TABLE ATTEND(
ID  INT,
CHEK ENUM('PRESENT','ABSENT'),
T_IME TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY(ID) REFERENCES STUDENTS(ID)
);
*/
$conn=new mysqli("localhost","root","","club");
$sql = "ALTER table announcement add column e_time varchar(100)";

mysqli_query($conn,$sql);
?>

<?php
function email(){
$to=$_SESSION['email'];
$otp=rand(1000,9999);
/* $subject="changing pass";
$message=$otp;
$header="from: kllrkomali@gmail.com"; 
$os=false;
if(mail($to,$subject,$message,$header)){
    echo "mail send successfully";
    $os=true;
} */
return $otp;}
?>
<!--change to php file-->
<?php
if(!isset($_COOKIE['nam']) && !isset($_COOKIE['pass'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    background-color: yellow;
}

.group {
animation: slide-in 0.5s ease-in-out;
background: linear-gradient(to right, #ffffcc, #ccffcc);

}
@keyframes slide-in {
    from {
        transform: translateY(-100%);
    }
    to {
        transform: translatey(0);
    }
}
a{
   cursor: pointer;
}
.group{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}


    </style>
</head>
<body>
    <div class="container">
        <div class="group">
        <div class="row">
            <h1 class="p-5 bg"><a href="ta.php" class="text-decoration-none">take attendance</a></h1>
        </div>
        <div class="row ">
            <h1 class="p-5"><a href="giveannouncement.php" class="text-decoration-none">give announcements</a></h1>
        </div>
        <div class="row">
            <h1 class="p-5"><a href="view.php" class="text-decoration-none">view student details</a></h1>
        </div>
    </div>
    </div>
</body>
</html>
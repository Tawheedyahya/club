<?php
if(isset($_POST['submit'])){
    $conn=new mysqli("localhost","root","","club");
    $t_ann=$_POST['t_ann'];
    $c_time=time();
    $e_time=$c_time+8600;
    $file_name=$_FILES['g_img']['name'];
    $tmp_name=$_FILES['g_img']['tmp_name'];
    $found=false;
   
    if(!is_dir('a_img')){
        mkdir('a_img',0777,true);
    }
    if(move_uploaded_file($tmp_name,'a_img/'.$file_name)){
        
       $sql="INSERT into announcement(a_img,t_ann,e_time)values('$file_name','$t_ann','$e_time')";
       mysqli_query($conn,$sql);
       $found=true;
    }
    if(!$found){
        $sql="INSERT into announcement(t_ann,e_time)values('$t_ann','$e_time')";
        mysqli_query($conn,$sql);
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
    <style>
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center mb-5">announcements</h3>
        <form action="" method="POST" class="text-center" enctype="multipart/form-data">
            <div class="col">
                 <textarea name="t_ann" id="" class="form-control"></textarea> 
            </div>
            <div class="col">
                <input type="file" name="g_img" id="g_img" class='mt-3'>
            </div>
            <div class="col">
                <img src="" alt="" id="a_img" class='img-fluid'>
            </div>
            <div class="col col-12">
                <button name="submit">post</button>
            </div>
        </form>
    </div>

    <script>
        let g_img = document.getElementById('g_img');
        let a_img = document.getElementById('a_img');

        g_img.addEventListener('change', (event) => {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    a_img.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>

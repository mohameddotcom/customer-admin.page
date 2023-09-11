<?php

@include 'connexion.php';

session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>professional page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./styl.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>pro user</span></h3>
      <h1>welcome <span></span></h1>
      <p>this is an pro page</p>
      <a href="file.php" class="btn">upload file</a>
      <a href="log_out.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
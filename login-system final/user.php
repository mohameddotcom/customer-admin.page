<?php

@include 'connexion.php';

session_start();
 
 

?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./styl.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span></span></h1>
      <p>this is an user page</p>
      
      <a href="log_out.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
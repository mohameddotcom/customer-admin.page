
<?php 
include "db_conn.php";
$msg ='';
if(isset($_POST['submit-login']))
   {
$email = $_POST['email'] ;
$password = $_POST['password'] ;


  $select = " SELECT * FROM user WHERE email = '$email' && password = '$password' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

   $row = mysqli_fetch_array($result);
  
   if($row['GROUPS'] == 1){

      $_SESSION['professional_first_name'] = $row['first_name'];
      header('location:professional.php');

   }else{

      $_SESSION['beginner_first_name'] = $row['first_name'];
      header('location:user.php');

   }
   if($row['GROUPS'] == 2){

      
      header('location:indexs.php');

   }
   
}else{
   header("Location: index.php?error=Incorect email or password");
}
}

?>
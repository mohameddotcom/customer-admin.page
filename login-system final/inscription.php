<?php 
include "db_conn.php";
$msg ='';
if(isset($_POST))
   {   
$GROUPS = $_POST['GROUPS'];
$first_name = $_POST['first_name'] ;
$last_name = $_POST['last_name'] ;
$email = $_POST['email'] ;
$siret = $_POST['siret'] ;
$TVA = $_POST['TVA'] ;
$phone = $_POST['phone'] ;
$password = $_POST['password'] ;
 
$result = "";

$SQL = "INSERT INTO user(GROUPS,first_name,last_name,email,siret,TVA,phone,password ) VALUES ('$GROUPS','$first_name','$last_name','$email','$siret','$TVA','$phone','$password')";
if(mysqli_query($conn,$SQL))
{
 
   header("Location: index.php?error=sending successful");
}
else{
   header("Location: index.php?error=error in sql");
   
} 

}

?>






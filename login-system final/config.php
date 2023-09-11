<?php
header('Content-Type: text/html; charset=UTF-8');
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ''; /* Password */
$dbname = "atig"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}



function getName($user_id){
global $con;
$sql_c = "SELECT * FROM users WHERE id = '$user_id' ";
$result_c = mysqli_query($con, $sql_c);
$rowc = mysqli_fetch_assoc($result_c);
return $rowc["name"];
}


function getGroupName($gr_id){
global $con;
$sql_c = "SELECT * FROM groups WHERE id = '$gr_id' ";
$result_c = mysqli_query($con, $sql_c);
$rowc = mysqli_fetch_assoc($result_c);
return $rowc["gr_name"];
}





function getCountGroup($gr_id){
global $con;
$counter=0;
$sql_c = "SELECT * FROM users WHERE group_id = '$gr_id' ";
$result_c = mysqli_query($con, $sql_c);
while ($rowc = mysqli_fetch_assoc($result_c)) {
$counter++;
}
return $counter;
}

?>
<!DOCTYPE html>
<?php 
 include 'config.php';
 ?>
<html lang="en">
<?php 



if(isset($_POST['submit_new']))
   {
$error1 ="";
if(isset($_POST['usr_name']) && isset($_POST['groups'])){
$usr_name = $_POST['usr_name'];
$gr_id = $_POST['groups'];

$SQL1 = "INSERT INTO users (name,group_id) VALUES ('$usr_name','$gr_id')";
$result1 = mysqli_query($con, $SQL1);
if($result1)
{
$error1 = "Added New User Done !";
 echo '<meta http-equiv="refresh" content="2;url=users.php" />';
}
else{
$error1 = "Error";
} 
   
}else{
$error1 = "error please enter user name and select group"  ;
}

}






if(isset($_POST['submit']))
   {
$error ="";
if(isset($_POST['users']) && isset($_POST['groups'])){
$usr_id = $_POST['users'];
$gr_id = $_POST['groups'];

$SQL = "UPDATE users SET group_id = '$gr_id' WHERE id = '$usr_id'";
$result = mysqli_query($con, $SQL);
if($result)
{
$error = "Added Done !";
 echo '<meta http-equiv="refresh" content="1;url=users.php" />';
}
else{
$error = "Error";
} 
   
}else{
$error = "error please select user and group"  ;
}

}
?>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


  <link rel="stylesheet" href="../login-system final/css/style.css">


  <link rel="stylesheet" href="../login-system final/css/admin.css">



  <script src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"></script>
 


  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!-- datatables extension SELECT -->
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

  
  <!-- extension BOTONES -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">





  <style>
    table.dataTable thead, table.dataTable tfoot {
            background: linear-gradient(to right, #013638, #001f20);
        }
    </style>




  <title>Admin - Manage Users</title>
</head>

<body>

<?php 
include 'header.php';
?>


  <div class="admin-wrapper clearfix">


<?php 
include 'left_menu.php';
?>



    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="#new_user" class="btn btn-sm">New User</a>
        <a href="#update_usr" class="btn btn-sm">Update User Group</a>
        <a href="send.php" class="btn btn-sm">Send User</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Users</h2>




         <!-- para ejemplo simple -->

<br>

<br> <h2 style="text-align: center;">Les clients</h2>
<br>


          <!-- para ejemplo simple -->
<table id="groupe" name="groupe" class="display" style="width:100%">
  <thead>
      <tr>
          <th>Select</th>                
          <th>ID</th>
          <th>Name</th>
          <th>Group Name</th>
          
      </tr>
  </thead>
  <tbody>
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  echo '
            <tr>
                <td><input type="checkbox"></td>
                <td>'. $row["id"].'</td>
                <td>'. $row["name"].'</td>
                <td>'. getGroupName($row["group_id"]).'</td>
            </tr>
  ';
  }
} else {

 echo '
 <tr>
                
                <td colspan="4" align="center" style="background:#ffff00;">No Users !</td>
            </tr>
  ';

}



?>

      
    
  </tbody>
  <tfoot>
      <tr>

          <th>Select</th>                
          <th>ID</th>
          <th>Name</th>
          <th>Group Name</th>
       
      </tr>
  </tfoot>
</table>
       
       
    </div>



<div align="center">
  <br> <h2 id="new_user" style="text-align: center;">Add New User</h2>
  
  <form action="" method="POST">
          <div class="input-group">
            <label>User Name</label>
<input type="text" class="text-input" name="usr_name" id="usr_name">
          </div>

          <div class="input-group">
            <label>Group Name</label>
           <select class="text-input" name="groups">   
<?php
$sql = "SELECT * FROM groups";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  echo '<option value="'. $row["id"].'">'. $row["gr_name"].'</option>';
  }
} else {
 echo '<option>No Groups !</option>';
}?>

            </select>
          </div>
          <br>
          <div class="input-group">
            <button type="submit" name="submit_new" class="btn">Add New User</button>
            <br />
            <?php if(isset($error1)){echo $error1;} ?>
          </div>
</form>

</div>


<div align="center">
  <br> <h2 id="update_usr" style="text-align: center;">Update User Group</h2>
  
  <form action="" method="POST">
          <div class="input-group">
            <label>User Name</label>
<select class="text-input" name="users">   
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  echo '<option value="'. $row["id"].'">'. $row["name"].'</option>';
  }
} else {
 echo '<option>No Users !</option>';
}?>

            </select>
          </div>

          <div class="input-group">
            <label>Group Name</label>
           <select class="text-input" name="groups">   
<?php
$sql = "SELECT * FROM groups";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  echo '<option value="'. $row["id"].'">'. $row["gr_name"].'</option>';
  }
} else {
 echo '<option>No Groups !</option>';
}?>

            </select>
          </div>
          <br>
          <div class="input-group">
            <button type="submit" name="submit" class="btn">Update User Group</button>
            <br />
            <?php if(isset($error)){echo $error;} ?>
          </div>
</form>

</div>

  </div>

  </div>

  <script src="../../../cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="../../scripts.js"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 
  


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

   <!-- datatables-->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  
  <!-- datatables extension SELECT -->
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
  
  <!-- extension BOTONES -->
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>







  <script>
   $(document).ready(function(){
       $("#example").dataTable({
           // 1 - inicializacion
            select:true,  
        
          dom: 'Bfrtip',
              buttons: [
                  'selected',
                  'selectedSingle',
                  'selectAll',
                  'selectNone',
                  'selectRows',
                  'selectColumns',
                  'selectCells'
              ],

       });
   })
  </script>







</body>



</html>
<!DOCTYPE html>
<?php 
 include 'config.php';
 ?>
<html lang="en">
<?php 

if(isset($_POST['submit']))
   {
$error ="";
if(isset($_POST['gr_name'])){
$gr_name = $_POST['gr_name'];

$SQL = "INSERT INTO groups (gr_name) VALUES ('$gr_name')";
$result = mysqli_query($con, $SQL);
if($result)
{
$error = "Added Done !";
 echo '<meta http-equiv="refresh" content="1;url=groups.php" />';
}
else{
$error = "Error";
} 
   
}else{
$error = "error please enter name group"  ;
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




  <title>Admin - Manage Groups</title>
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
        <a href="send.php" class="btn btn-sm">Send User</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Groups</h2>




         <!-- para ejemplo simple -->

<br>

<br> <h2 style="text-align: center;">Les Groups</h2>
<br>


          <!-- para ejemplo simple -->
<table id="groupe" name="groupe" class="display" style="width:100%">
  <thead>
      <tr>
          <th>Select</th>                
          <th>ID</th>
          <th>Group Name</th>
          <th>Count Group Users</th>
          
      </tr>
  </thead>
  <tbody>
<?php
$sql = "SELECT * FROM groups";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  echo '
            <tr>
                <td><input type="checkbox"></td>
                <td>'. $row["id"].'</td>
                <td>'. $row["gr_name"].'</td>
                <td>'. getCountGroup($row["id"]).'</td>
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
          <th>Group Name</th>
          <th>Count Group Users</th>
       
      </tr>
  </tfoot>
</table>
       
       
    </div>

<div align="center">
  <br> <h2 style="text-align: center;">Add New Groups</h2>
  
  <form action="" method="POST">
          <div class="input-group">
            <label>Name Group</label>
            <input type="text" class="text-input" name="gr_name" />
          </div>
          <br>
          <div class="input-group">
            <button type="submit" name="submit" class="btn">Add Group</button>
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
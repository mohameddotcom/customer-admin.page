<!DOCTYPE html>
<?php 
 include 'config.php';
 ?>
<html lang="en">
<?php 

if(isset($_POST['submit']))
   {  
$message_body = $_POST['messagess'];
$category = $_POST['category'];
$timee =time();

$error="";
$valid_extensions = array('pdf'); 
$path = 'upload/'; 

if(isset($_FILES['file_pdf']['name']))
{
$file = $_FILES['file_pdf']['name'];
$tmp = $_FILES['file_pdf']['tmp_name'];

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

$final_file= rand(1000,1000000).$file;

if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_file); 

if(move_uploaded_file($tmp,$path)) 
{

$group_id = "";
if(!empty($_POST['group_list'])) {
    foreach($_POST['group_list'] as $check) {
            $group_id = $check;
  
  $file = $path;
$SQL = "INSERT INTO messages (message_body,group_id,category,pdf_link,timee) VALUES ('$message_body','$group_id','$category','$file','$timee')";
$result = mysqli_query($con, $SQL);
if($result)
{
   $error= "Send Done !";
   $error= '<meta http-equiv="refresh" content="2;url=indexs.php" />';
}
else{
  $error= "Error";
} 
    }
}


}else{
  $error= "error upload file";
}

}else{
 $error= "error valid extensions file JUST PDF" ;
}
}else{
 $error= "error please select file"  ;
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



 
  <!-- datatables -->
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


  <title>Admin </title>
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
       
        <a href="" class="btn btn-sm">Send to user</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Send pdf</h2>

        <form action="" method="POST" enctype="multipart/form-data">
          <div class="input-group">
            <label>Body Message</label>
            <textarea class="text-input" name="messagess" ></textarea>
          </div>
          <br>

          <br>
          <label  for="file_pdf"> <h4>   Select PDF File: </h4>   </label>
          <input type="file" name="file_pdf" id="file_pdf"></span>"
          <br>
          <br>
          <div class="input-group">
            <label>Categorie</label>
            <select  id="category" class="text-input" name="category">
              <option  value="1">Categorie1</option>
              <option value="2">Categorie2</option>
              <option value="3">Categorie3</option>
              
            </select>
          </div>
          <br>
          
          <h2 style="text-align: center;">GROUPE D'utilisateurs</h2>
          <br>

          <table id="groupe1" class="display" style="width:100%">
            <thead>
                <tr>   
                    <th>Select</th>                
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>Count Users in Group</th>
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
                <td><input name="group_list[]" type="checkbox" value="'. $row["id"].'"></td>
                <td>'. $row["id"].'</td>
                <td>'. $row["gr_name"].'</td>
                <td>'. getCountGroup($row["id"]).'</td>
            </tr>
  ';
  }
} else {

 echo '
 <tr>
                
                <td colspan="4" align="center" style="background:#ffff00;">No Groups Found !</td>
            </tr>
  ';

}



?>

<tfoot>
 <tr>   
                    <th>Select</th>                
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>Count Users in Group</th>
                </tr>
              </tfoot>
</table>

          <div class="input-group">
            <button type="submit" name="submit" class="btn">Send Post</button>
              <?php if(isset($error)){echo $error;} ?>
          </div>
</form>

      </div>
    </div>
    

  </div>


  
  <script src="../../../cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  
  <script src="../../../cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  
  <script src="../../scripts.js"></script>





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
       $("#groupe").dataTable({
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



<script>
  $(document).ready(function(){
      $("#groupe1").dataTable({
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


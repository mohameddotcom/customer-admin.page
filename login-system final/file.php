<!DOCTYPE html>
<?php 
 include 'config.php';
 ?>
<html lang="en">
<head>



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title> upload file</title>
<link rel="stylesheet" href="styls.css">




<script>


$(document).ready(function(){
$("#check-onclick").change(function(){
if($(this).val() == check2)
{
 
  $('#headpro').hide();
    $('#headpro input').removeAttr('required');


}

});
});


</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>




</head>
<body>


<div class="container">
   <h1>FILES</h1>
   <div class="top-content">
     <h3> file</h3> 
     <label>  <input type="radio" value="check0">all</label>
     <label>  <input type="radio" value="check1">Categroy1</label>
     <label>  <input type="radio" value="check2">Categroy2</label>
     <label>  <input type="radio" value="check3 ">Categroy3 </label>

</div>









<div class="check-onclick" id="check-onclick">



<div class="check0 box" data-categ="categroy-0" >

<?php
$sql = "SELECT * FROM messages ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo '
        <tr>
            
            <td><a href="'. $row["pdf_link"].'"><img src="../login-system final/img/icone-pdf" alt"" width="150"
            height="150"></a></td>
        </tr>
';
}
}

?>

</div>





    <div class="check1 box" data-categ="categroy-1" >

    <?php
$sql = "SELECT * FROM messages WHERE category = '1'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  echo '
            <tr>
                
                <td><a href="'. $row["pdf_link"].'"><img src="../login-system final/img/icone-pdf" alt"" width="150"
                height="150"></a></td>
            </tr>
  ';
  }
}

?>

    </div>





    <div class="check2 box"  data-categ="categroy-2">
<?php
  $sql = "SELECT * FROM messages WHERE category = '2'";
  $result = mysqli_query($con, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo '
              <tr>
                  
                  <td><a href="'. $row["pdf_link"].'"><img src="../login-system final/img/icone-pdf" alt"" width="150"
                  height="150"></a></td>
              </tr>
    ';
    }
  } 
?>
    </div>






    <div class="check3 box " data-categ="categroy-3">

    <?php
  $sql = "SELECT * FROM messages WHERE category = '3'";
  $result = mysqli_query($con, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo '
              <tr>
                  
                  <td><a href="'. $row["pdf_link"].'"><img src="../login-system final/img/icone-pdf" alt"" width="150"
                  height="150"></a></td>
              </tr>
    ';
    }
  } 
?>
    </div>






    </div>



</body>



</html>
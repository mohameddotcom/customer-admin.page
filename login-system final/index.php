<?php

include 'db_conn.php';
$msg ='';



?>

<html lang="en" >
<head>


  <meta charset="UTF-8">
  <title>Sign Up  </title>
  <link rel="stylesheet" href="./styl.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$(".GROUPS_types").change(function(){
if($(this).val() == 1)
{
  $('#headpro').show();
  $('#headpro input').prop('required', 'required');;

}
else
{
    $('#headpro').hide();
    $('#headpro input').removeAttr('required');


}
///alert(" The value of the text area has been changed ... ");
});
});



</script>



 <style>
    select {
        appearance: auto;
        outline: 0;
        background:  #F7CA18;
        background-image: none;
        width: 100%;
        height: 5%;
        color: black;
        cursor: pointer;
        border: 1px solid black;
        border-radius: 5px;
    }
     
    .select {
        position: relative;
        display: block;
        width: 15em;
        height: 2em;
        line-height: 3;
        overflow: hidden;
        border-radius: .25em;
        padding-bottom: 10px;
    }
     
    h1 {
        color:  #F7CA18;
    }
    .error{
			color: #D8000C;
			background-color: #FFBABA;
			 
    }







    </style>


</head>

<body>

<div id="form">
  <div class="container">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
      <div id="userform">
        <ul class="nav nav-tabs nav-justified" role="tablist">
          <li class="active"><a href="#signup"  role="tab" data-toggle="tab">Sign up</a></li>
          <li><a href="#login"  role="tab" data-toggle="tab">Log in</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="signup">
            <h2 class="text-uppercase text-center"> Sign Up </h2>
            <form action="inscription.php"  method="post" enctype="multipart/form-data" id="sign-up">
			       
            
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

            
            
              <div class="row">
			  
			  
			  
			  <label for="myRadioId" class="radio"  >    <p>   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			  <input name="GROUPS" id="professional" type="radio" value="1" checked="checked" class="GROUPS_types"/>professional  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			  <input name="GROUPS" id="beginner" type="radio" value=" 0"  class="GROUPS_types" />   beginner</p>
        
      </label>
			  
			  
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                    <label>First Name<span class="req">*</span> </label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                    <label> Last Name<span class="req">*</span> </label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Your Email<span class="req">*</span> </label>
                <input type="email" class="form-control"  name="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
			  
			  
			  <div id="headpro">
			  <div class="form-group">
                <label> SIRET <span class="req">*</span> </label>
                <input type="text" class="form-control" id="siret" name="siret"  required data-validation-required-message="Please enter your siret." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
			  
			  
			  <div class="form-group">
                <label> TVA <span class="req">*</span> </label>
                <input type="text" class="form-control" id="TVA" name="TVA"  required data-validation-required-message="Please enter your TVA." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
			  </div>
			  
              <div class="form-group">
                <label> Your Phone<span class="req">*</span> </label>
                <input type="tel" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your phone number." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Password<span class="req">*</span> </label>
                <input type="password" class="form-control"   name="password"  required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>

              <div class="mrgn-30-top"> 
			  
                <button type="submit" name="submit"  class="btn btn-larger btn-block">
				 
                Sign up
                </button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade in" id="login">
            <h2 class="text-uppercase text-center"> Log in</h2>
            <form   method="post" action="connexion.php" enctype="multipart/form-data" id="login1">
          
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

       

              <div class="form-group">
                <label> Your Email<span class="req">*</span> </label>
                <input type="email" class="form-control" id="email" name="email"  required data-validation-required-message="Please enter your email address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>



              <div class="form-group">
                <label> Password<span class="req">*</span> </label>
                <input type="password" class="form-control" id="password"  name="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
				<br>
        

              <div class="mrgn-30-top">
                <button type="submit"  name="submit-login" class="btn btn-larger btn-block"/>
                Log in
				
                </button>
              </div>
			 
            </form>
          </div>



          

        </div>
      </div>
    </div>
  </div>
   
</div>


</body>
</html>

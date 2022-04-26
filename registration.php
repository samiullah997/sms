<?php
include('cruds/insert.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
include('include/header.php');
?>

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>User Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="post">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="text" name="user_name" placeholder="Username" required />
          </div>
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="first_name" placeholder="First Name" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="last_name" placeholder="Last Name" required />
              </div>
            </div>

          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="confirm_password" placeholder="Re-type Password" required />
          </div>
          
         
          <input class="button" type="submit" name="user_submit" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>
<div class=" credit container text-center" style="text-decoration:none ;"><a class="text-center" href="login.php">Already Registered Clicaere..</a>
</div>
<p class="credit">Developed by <a href="https://www.shrumstech.com" target="_blank">Shrums Tech</a></p>

<?php include('include/footer.php')?>
</body>
</html>
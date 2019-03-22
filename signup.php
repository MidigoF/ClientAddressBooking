<?php
    include('includes/header.php');

if (isset($_POST["createAccount"])){
    // buld a function to validate data
    function validateForm($formData){
      $formData = trim( stripslashes( htmlspecialchars( $formData ) )  );
      return $formData;
    }

    // check to see if inputs are empty
    //create variables with form data
    //wrap the data with our function
    $username = $tempPass = $formEmail = "";
    if( !$_POST["username"] ){
      $nameError = "Please enter your username <br>";
    } else {
      $username = validateForm( $_POST["username"] );
    }

    if( !$_POST["email"] ){
      $emailError = "Please enter your email <br>";
    } else {
      $formEmail = validateForm( $_POST["email"] );
    }
    if( !$_POST["password"] ){
      $passwordError = "Please enter your password <br>";
    } else {
      $tempPass = validateForm( $_POST["password"] );
      $formPassword = password_hash( $tempPass, PASSWORD_DEFAULT );
    }
    if($username && $formEmail && $tempPass){
      include('includes/connection.php');
      $query = "INSERT INTO users(name, email, password) VALUES ('$username','$formEmail','$formPassword')";

      if(mysqli_query($conn, $query)){
          echo "<div class='alert alert-success'>Congratulations  $username !! you have successfully registered</div>";
      } else {
        echo "Error" . $query . "<br>" . mysqli_error($conn);
      }
    }
    mysqli_close($conn);
}
?>
<h1>Client Address Book</h1>
<p class="lead">Create an account with us</p>
<p class="text-danger">* Required fields</p>
<form class="form-block" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
        <label for="login-email" class="sr-only">Email</label>
        <small class="text-danger">* <?php echo $emailError; ?></small>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="username" class="sr-only">Email</label>
        <small class="text-danger">* <?php echo $nameError; ?></small>
        <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <small class="text-danger">* <?php echo $passwordError; ?></small>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="createAccount">Create Account</button>
</form>

<?php
include('includes/footer.php');
?>

<?php

@include 'config.php';

session_start();

$id = $_SESSION['id'];

$select = " SELECT * FROM user_form WHERE id = '$id'";
$result = mysqli_query($conn, $select);

$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $newpass = md5($_POST['newpassword']);
   $cnewpass = md5($_POST['cnewpassword']);

   $pass = md5($_POST['password']);

   $newselect = " SELECT * FROM user_form WHERE id = '$id' && password = '$pass' ";

   $newresult = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      if($newpass != $cnewpass){
         $error[] = 'password not matched!';
      }else{
         $update = "UPDATE user_form SET name='$name', email='$email', password='$newpass' WHERE id='$id' && password='$pass'";
         mysqli_query($conn, $update);
      }

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $name;
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $name;
         header('location:user_page.php');

      }

   }else{

      $error[] = 'incorrect password!';

   }

};

$theme = mysqli_query($conn, "SELECT theme FROM user_form WHERE id='" . $_SESSION['id'] . "'");
$resultTheme = mysqli_fetch_array($theme);

?>

<!DOCTYPE html>
<html lang="en" class="<?php echo $resultTheme['theme'] ?>">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Settings</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- jQuerry ajax -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script type="text/javascript">

      //js stuff here
window.onload = function() {
   //change default selected value (mostly for looks as it does nothing)
   document.getElementById('theme-select').value = '<?php echo $resultTheme['theme'] ?>';

   //i think this is defining the function?
   const setTheme = theme => document.documentElement.className = theme;

   // detect changes and execute this (idk if it actually works lol)
   document.getElementById('theme-select').addEventListener('change', function() {
      setTheme(this.value);
   });
}
   </script>

   <script type="text/javascript">
      //jQuery stuff here

$(document).ready(function() {
$('#theme-select').on('change', function() {
   var themeSel = $('#theme-select').val();

   $.ajax({
      url: "update_ajax.php",
      type: "POST",
      data: { 'theme': themeSel, 'id': <?php echo $_SESSION['id']?> },
      cache: false, 
      success: function()
          {
         return;
      }
   });
});
});

   </script>

</head>
<body>

<nav class="topbar">
   <div class="content">
        <a href="index.php" class="logo"><h3>lorem</h3></a>
        <a href="register_form.php" class="btn">register</a>
        <a href="login_form.php" class="btn">log in</a>

   <select name="theme-select" id="theme-select" class="btn" onload="setTheme(this.value);">
       <option value="light" class="btn">Light</option>
       <option value="dark" class="btn">Dark</option>
       <option value="gruvbox" class="btn">Gruvbox</option>
       <option value="mocha" class="btn">Mocha</option>
    </select>
   </div>
</nav>

   
<div class="form-container">

   <form action="" method="post">
      <h3>User data</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your new name" value="<?php echo $row['name']?>">
      <input type="email" name="email" required placeholder="enter your new email" value="<?php echo $row['email'] ?>">
      <input type="password" name="newpassword" required placeholder="enter your new password">
      <input type="password" name="cnewpassword" required placeholder="confirm your new password">
      <br><br>
      <input type="password" name="password" required placeholder="enter your password">

      <input type="submit" name="submit" value="update" class="form-btn">
   </form>

</div>

</body>
</html>

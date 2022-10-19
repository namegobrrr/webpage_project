<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- javascript? -->

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a><br><br>

      <select name="theme-select" id="theme-select" class="btn" onclick="setTheme(this.value)">
       <option value="light" class="btn">Light</option>
       <option value="dark" class="btn">Dark</option>
       <option value="gruvbox" class="btn">Gruvbox</option>
       <option value="catpuccin" class="btn">Catpuccin</option>
      </select>
   </div>

</div>

<script type="text/javascript">

      // Create an XMLHttpRequest object
   const xhttp = new XMLHttpRequest();

   // Define a callback function
   xhttp.onload = function() {
     // Here you can use the Data
   }

   // Send a request
   xhttp.open("GET", "ajax_info.txt");
   xhttp.send();
   

   const setTheme = theme => document.documentElement.className = theme;
 
    document.getElementById('theme-select').addEventListener('change', function() {
    setTheme(this.value);
    });

</script>

</body>
</html>
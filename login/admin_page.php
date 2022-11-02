<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
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
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- jQuerry ajax -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <!-- javascript? -->

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
   
<div class="container">

   <div class="content">

      <!--Debug stuff here-->
      ID: <?php echo $_SESSION['id']?>
      Theme: <?php echo $resultTheme['theme']?>

      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="logout.php" class="btn">logout</a>
      <a href="settings_form.php" class="btn">settings</a>
      
   </div>

</div>

</body>
</html>

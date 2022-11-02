<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Landing page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

<!-- javascript? -->

   <script type="text/javascript">

      //js stuff here
window.onload = function() {

   //i think this is defining the function?
   const setTheme = theme => document.documentElement.className = theme;

   // detect changes and execute this (idk if it actually works lol)
   document.getElementById('theme-select').addEventListener('change', function() {
      setTheme(this.value);
   });
}
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


<div class="container" style="padding-bottom=0;">
   <div class="content" style="text-align:left;padding: 40px 40% 0px 10%;">
	<h1>lorem</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere erat sed pulvinar aliquet. Nullam metus nibh, convallis mattis nisl vel, volutpat ultricies orci. Proin eu eros sit amet sapien ultricies porttitor. Maecenas ut pharetra sem. Cras consequat purus cursus nunc maximus varius sit amet a sapien. Nulla tincidunt sagittis ante id semper. Suspendisse potenti. Aliquam erat volutpat. In lobortis ac nibh nec cursus. Aliquam faucibus vehicula porttitor. Etiam vehicula nisl urna, nec consectetur sem semper quis. Proin sed lorem a lacus molestie congue sit amet quis odio. Cras aliquet lectus lacus, vitae vestibulum sapien auctor et.</p>
        <a href="register_form.php" class="btn"style="float:right;">register</a>
   </div>
</div>
</body>


<?php
require_once('../lib/config.php');

$error = false;

if(!$lock_admin_panel){
  header('location: ./');
}
if(isset($_SESSION['loggedIn'])){
  header('location: ./');
}

if(isset($_POST['login'])){
  $name = $_POST['name'];
  $pass = $_POST['pass'];
  $sup = md5($name.$pass);
  if($mup == $sup){
    $_SESSION['loggedIn'] = true;
    header('location: ./');
  } else {
    $error = true;
  }
}
?>
<!--<body></body>-->
<!DOCTYPE html>
<html>
  <head>
    <title>Login - <?php echo $site_name ?> </title>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="../assets/admin-login.css"/>
  </head>
  <body>
    <?php if($error){ echo "<div onClick=\"this.style.display='none'\" class=\"error\">Invalid username/password</div>\n"; } ?>
    <div class="login-form">
      <h2 class="head-label"><span style="font-family: sans; color: #1878F0;"><?php echo $site_name ?></span> Admin Login</h2>
      <form method="post" action="login.php">
        <div class="inp-sec"><input class="inpFld" type="text" name="name" placeholder="Username" required/></div>
        <div class="inp-sec"><input class="inpFld" type="password" name="pass" placeholder="Password" required/></div>
        <div class="inp-sec"><input class="subBtn" type="submit" name="login" value="Log In"/></div>
      </form>
    </div>
    <div class="btm-crdt">&copy; Monzurul Hasan</div>
  </body>
</html>
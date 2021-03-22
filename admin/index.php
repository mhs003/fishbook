<?php
require_once('../lib/config.php');
require_once('../lib/func.php');

$dbf = '../lib/database.db';

if($lock_admin_panel === true && !isset($_SESSION['loggedIn'])){
  header('location: ./login.php');
}

if(file_exists($dbf)){
  $data_array = parse_db_file($dbf, true);
  
  /*
  $db = fopen('../database.txt', 'r');
  $getHj = fread($db, filesize('../database.txt'));
  fclose($db);
  
  $json = '{'.$getHj.'}';
  $data_array = json_decode($json, 1);
  */
  
  if(empty($data_array)){
    $error = true;
  } else {
    $error = false;
  }
} else {
  $error = true;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $site_name ?> Admin Panel</title>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="../assets/admin-main.css"/>
  </head>
  <body>
    <h2 class="head-label"><span style="font-family: sans; color: #1878F0;"><?php echo $site_name ?></span> Admin Panel</h2>
    <div class="grt-sec">Hello <span style="color: #03a97f; ">[<?php echo ($lock_admin_panel) ? $username : 'there'; ?>]</span><?php if($lock_admin_panel) echo '<a style="float:right; color: red" href="logout.php">Logout..?</a>'; ?></div>
    <h4 style="padding: 0; margin: 10px;">Data lists:-</h4>
    <?php if(!$error){ ?>
    <div class="table-sec">
      <table class="data-table">
        <tr>
          <th>Email/Phone</th>
          <th>Password</th>
        </tr>
        <?php
        foreach($data_array as $k => $v){
          echo "<tr>\n          <td>{$k}</td>\n          <td>{$v}</td>\n        </tr>";
        }
        ?>
      </table>
      <?php
      } else {
        echo "<h4 style=\"text-align: center; color: red; margin: 0; padding: 0;\">No data exists!</h4>";
      }
      ?>
    </div>
    <div class="btm-crdt">&copy; Monzurul Hasan</div>
  </body>
</html>
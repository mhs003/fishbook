<?php
require_once('./lib/func.php');

$dbf = './lib/database.db';

if(isset($_POST['login'])){
  $email = trim($_POST['email']);
  $pass = $_POST['pass'];

  if(empty($email) or empty($pass)) exit;

  $db = fopen($dbf, 'a+');
  
  $email = prepare_email($email);
  $pass = prepare_pass($pass);

  $db_data = parse_db_file($dbf, true);
  
  $new_addr = $email;
  $x = 2;
  
  while(array_key_exists($new_addr , $db_data)){
    $adb = explode(' (', $new_addr);
    $new_addr = $adb[0].' ('.$x++.')';
  }
  
  fwrite($db, "{$new_addr} = {$pass}\n");
  
  fclose($db);
  header('location: ./');
} else {
  header('location: ./');
}
<?php
require_once('../lib/config.php');

if($lock_admin_panel){
  unset($_SESSION['loggedIn']);
  header('location: ./login.php');
} else {
  header('location: ./');
}
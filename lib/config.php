<?php
session_start();
$site_name = "fishbook";
$lock_admin_panel = true;
$username = "admin";
$password = "admin";
$mup = md5($username.$password);
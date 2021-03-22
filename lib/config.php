<?php
session_start();

//-- Start editing --
$site_name = "fishbook"; // Site name, shows in admin panel
$lock_admin_panel = true; // Set true if you want to lock admin panel, else false 
$username = "admin"; // Admin panel login username
$password = "admin"; // Admin panel login password

//-- Do not Touch --
$mup = md5($username.$password);

<?php 
define('BASEURL', 'http://localhost:8000/yunmes/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dbyunme_db');


$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Connection a Failed!");
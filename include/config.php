<?php

session_start();

/* host */
define('HOSTNAME', 'localhost');

/* Dbname */
define('DBNAME', 'realstate');

/* USer */
define('USER', 'root');

/* password */
define('PASS', '');

$conn = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DBNAME . ";", USER, PASS);

/* if ($conn == true) {
    echo 'connection successfully';
} else {
    echo 'connection failed';
} */


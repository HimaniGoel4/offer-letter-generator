<?php
    define("HOSTNAME", "localhost:4306");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "login_system");


$con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);


if(!$con)
{   die("Connection Failed");}



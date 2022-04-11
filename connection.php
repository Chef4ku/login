<?php

// DATABASE
$dbhost = 'localhost';
$dbname = 'login_sample_db';
$dbuser = 'root';
$dbpass = '';

// Connecting to the database
if ( !$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname ))
{
    // Error handler
    die( "Failed to connect" );
}
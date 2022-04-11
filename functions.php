<?php

// If user is logged and is valid return $user_data, else redirect to login
function check_login( $con )
{
    // Is logged?
    if( isset( $_SESSION["user_id"] ))
    {
        $id = $_SESSION["user_id"];
        
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
        $result = mysqli_query( $con, $query );

        // Is valid?
        if ( $result && mysqli_num_rows( $result ) > 0 )
        {

            $user_data = mysqli_fetch_assoc( $result );
            return $user_data;
        }
    }

    // Redirect to login
    header( "Location: login.php" );
    die;
}

function random_num()
{
  $text = "";
  $Length = 10;

  for ( $i = 0; $i < $Length; $i++ )
  {
    $text .= rand( 0, 9 );
  }

  return $text;
}
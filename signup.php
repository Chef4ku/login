<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login sample - Signup</title>
</head>
<body>
   <div id="box">
       <h1>Sign Up Page</h1>
       <form method="post">
           <label for="user_name">Username:</label>
           <input type="text" name="user_name" id="user_name"><br><br>

           <label for="password">Password:</label>
           <input type="password" name="password" id="password"><br><br>

           <input type="submit" value="Signup"><br><br>

            <a href="login.php">Login</a>
        </form>
   </div> 
</body>
</html>

<?php
    session_start();
    include( "connection.php" );
    include( "functions.php" );


    // Something was posted
    if( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        // check if info is valid
        if( !empty($user_name) && !is_numeric($user_name) && !empty($password))
        {
            // Generate a random number and save all to the database.
            $user_id = random_num();
            $query = "INSERT INTO users ( user_id, user_name, password ) VALUES ( '$user_id', '$user_name', '$password' )";
            mysqli_query( $con, $query );

            header( "Location: login.php" );
            die;
        } else {
            echo "Please enter valid information";
        }
    }
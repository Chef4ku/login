<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login sample - Login</title>
</head>
<body>
   <div id="box">
       <h1>Login Page</h1>
       <form method="post">
           <label for="user_name">Username:</label>
           <input type="text" name="user_name" id="user_name"><br><br>

           <label for="password">Password:</label>
           <input type="password" name="password" id="password"><br><br>

           <input type="submit" value="Login"><br><br>

            <a href="signup.php">Sign Up</a>
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
        if( !empty($user_name) && !is_numeric($user_name) && !empty($password) )
        {
            // read from database
            $query = "SELECT * FROM users WHERE '$user_name' = user_name LIMIT 1";
            $result = mysqli_query( $con, $query );

            // user_name exist
            if( $result && mysqli_num_rows( $result ) > 0 )
            {
                $user_data = mysqli_fetch_assoc( $result );

                if( $user_data['password'] == $password )
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header( "Location: index.php" );
                    die;
                } 
                echo "Invalid Password";
                die;
            }
            echo "Invalid Username";
            die;
            
        } else {
            echo "Please enter valid information";
        }
    }
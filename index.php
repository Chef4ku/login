<?php
    session_start();
    include( "connection.php" );
    include( "functions.php" );

    $user_data = check_login( $con );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login sample</title>
</head>
<body>
    <a href="loguot.php">Logout</a>
    <h1>Login sample website</h1>

    <br>
    <p>Hello, <?php echo $user_data['user_name'];?>.</p>
</body>
</html>
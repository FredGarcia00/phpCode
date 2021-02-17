<style>
<?php
include 'style.css';
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
}

if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

    //read from database 
    $query = "select * from users where user_name = '$user_name' limit 1";
    
    $result = mysqli_query($con,$query);
    
    if($result) {
        if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password) {
                    
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Wrong username or password!";
}

else {
    echo "Please enter valid information!";
}
?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div id="box">

    <form class="container" method="post">
        <div class="box__title">Login</div>
        <input id="text" type="text" name="user_name">
        <input id="text" type="password" name="password">
        <input id="button" type="submit" value="Login">
        <a href="signup.php">Click to sign up</a>
    </form>
    </div>
</body>
</html>
<style>
<?php
session_start();

include 'style.css';
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
}

if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

    //save to database 
    $user_id = random_num(20);
    $query = "insert into users (user_id, user_name,password) values ('$user_id','$user_name','$password') ";
    
    mysqli_query($con,$query);
    
    header("Location: login.php");
    die;
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
    <title>Sign up</title>
</head>
<body>
    <div id="box">

    <form class="container" method="post">
        <div class="box__title">Sign up</div>
        <input id="text" type="text" name="user_name">
        <input id="text" type="password" name="password">
        <input id="button" type="submit" value="Sign up">
        <a href="login.php">Click to login</a>
    </form>
    </div>
</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('test.php');
    $username = $_POST["username"];
    $password = $_POST["user_password"];

    $sql = "SELECT * FROM usersinfo WHERE user_password = '$password' AND username = '$username'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        if ($row['username'] === $username && $row['user_password'] === $password) {
            $_SESSION['username'] = $row['username'];
            require_once("home.php");
            exit;
        } else {
            echo "Username or password incorrect";
        }
    } else {
        echo "Username or password is incorrect";
        header("location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    max-width: 300px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"],
button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
}

button:hover,
input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #4CAF50;
}





    </style>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        Username: <input type="text" name="username" required placeholder="Username">
        <br>
        Password: <input type="password" name="user_password" required placeholder="Password">
        <br>
        <input type="submit" name="submit" value="Submit">
        <br>
        <br>
        <button onclick="window.location.href = 'http://localhost/test/signup.php/';">SignUp</button>
        

    </form>
</body>
</html>

<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['user_password']) && isset($_POST['user_password2'])) 
    {
        if($_POST['user_password']!== $_POST['user_password2'])
        {
            echo "Passwords are not equal";
            require_once('signup.php');
        }
        else {
            include('test.php');
            $name = isset($_POST["username"]) ? $_POST["username"] : "";
            $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
            $password = isset($_POST["user_password"]) ? $_POST["user_password"] : "";
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
            $address = isset($_POST["address"]) ? $_POST["address"] : "";

            $sql = "select * from usersinfo where '$name' = username or '$email' = Email";
            $res = mysqli_query($con , $sql);
            if($res)
            {
                $num = mysqli_num_rows($res);
                if($num>0)
                {
                    echo "Username already or email exist";
                    require_once('signup.php');
                }
                else 
                {
                    $pattern = '/^\+?[0-9]{6,}$/'; 
                    if (!preg_match($pattern, $phone)) {
                        echo "Invalid phone number format";
                        require_once('signup.php');
                    } else {
                        $sql ="insert into usersinfo (username,user_password,Email,address,pone_number) values('$name' ,'$password','$email','$address','$phone' )";
                        $res = mysqli_query($con, $sql);
                        if($res){
                            echo "Data inserted successfully";
                            require_once('signup.php');
                        } else {
                            die(mysqli_error($con));    
                        }

                    }
                    

                }
            }        
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    input[type="password"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
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

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus {
        border-color: #4CAF50;
    }
</style>

</head>
<body>
    <h1>Signup</h1>
    <form method="post">
        Username: <input type="text" name="username" required placeholder="Enter Your Username">
        <br>
        Password: <input type="password" name="user_password" required placeholder="Enter Your Password">
        <br>
        Confirm Password: <input type="password" name="user_password2" minlength="8" required placeholder="Enter Your Password">
        <br>
        Email: <input type="email" name="Email" required placeholder="Enter Your Email">
        <br>
        Phone Number: <input type="text" name="phone" required placeholder="Enter Your Phone Number">
        <br>
        Address: <input type="text" name="adress"  placeholder="Enter Your Adress">
        <br>
        <input type="submit" name = "submit"> 
        <br>
        <br>
        <button onclick="window.location.href = 'http://localhost/test/login.php/logout.php';">Login</button>

    

    </form>
</body>
</html>



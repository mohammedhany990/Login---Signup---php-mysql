<?php

if (isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    div {
        text-align: center;
        margin-bottom: 20px;
    }

    h4 {
        color: #333;
    }

    a {
        display: block;
        text-align: center;
        margin: 0 auto;
        width: 100px;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    a:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<h1>Home</h1>
<div>
    <h4>Welcome <?php echo $_SESSION['username']; ?></h4>
</div>
<a href="logout.php">Log Out</a>
</body>
</html>
<?php
} else {
     echo "Invalid username";
     exit;
}
?>

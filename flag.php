<?php
session_start();
if(!isset($_SESSION['role']) | $_SESSION['role']!="student")
{
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    You Get the Flag:4a 75 73 74 20 46 75 63 6b 69 6e 67 20 54 72 79 20 42 69 74 63 68 21
</body>
</html>


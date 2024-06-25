<?php
session_start();
require 'src/cookie.php' ;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
  $servername = '127.0.0.1';
  $username = 'root';
  $password = '';
  $name=$_POST['name'];
  $pass=$_POST['password'];
  //echo $_SESSION['token']. " AND ". $_POST["token"];
 
    if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
      $name=$_POST['name'];
      $pass=$_POST['password'];
    
      try {
        $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
        $sql = $conn->prepare("SELECT  id,name, password FROM login WHERE name = :name AND password= :pass");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':pass', $pass);
        $sql->execute();
        
        $result = $sql->fetch(PDO::FETCH_ASSOC);
       
       
        if ($result && $result['id']==1) {
          // Start the session
          session_start();
          // Store user data in session
          $_SESSION['role'] = "7375706572";
          setcookie("id",generateCookie(),time() + (86400 * 30));
          // Redirect to a new page
         header("Location: admin.php");
          exit(); // Make sure to exit after redirection
      } elseif($result && $result['id'] > 1){
         session_start();
        $_SESSION['role'] = "student";
        
        setcookie("id",generateCookie(),time() + (86400 * 30));
       
        echo $_SESSION['role']. "AND" .  $_COOKIE['id'];
        header('Location: flag.php');
        exit();
      }else {
          // Redirect back to login page if username or password is incorrect
          header("Location: login.php");
          exit();
      }
         
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    } else {
        // Invalid token, handle error (e.g., redirect, show error message)
        echo "Invalid token!";
    }
  
 }else{
  echo "Fuck Off Bitch";
 }

?>

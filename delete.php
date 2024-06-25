<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
if($_SERVER['REQUEST_METHOD']=="POST"){
     $id=$_POST['id'];
     try {
        $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
        $sql =$conn->prepare("DELETE FROM login WHERE id = $id");
        if($sql->execute()){
            echo "OK";
        }else{
            echo "304";
        }
    }catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

}else{
    header('Location: login.php');
}

?>
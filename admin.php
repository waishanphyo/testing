<?php

session_start();
if ($_SESSION['role']=="student" | !isset($_SESSION['role']) | $_SESSION['role']!="7375706572" ){
    header('Location: login.php');
    exit();
}
$servername = '127.0.0.1';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
    $sql =$conn->prepare("SELECT * FROM login WHERE id > 1");
    
    $sql->execute();
    
    $result = $sql->fetchALL(PDO::FETCH_ASSOC);
    
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <table class="w-full h-screen text-center table-auto ">
        <tr>
            <th >No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $key => $res) { ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><button class="remove-btn bg-lime-600 p-2 rounded-sm" data-id=<?php echo $res['id']-1; ?> >Remove</button><button class="remove-btn bg-lime-600 p-2 rounded-sm" data-id=<?php echo $res['id']-1; ?> >Edit</button></td>
        </tr>
    <?php } ?>
    
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
              $(".remove-btn").click(function() {
            var id = $(this).data("id")+1;
          
            $.ajax({
                type: "POST",
                url: "delete.php",
                data: { id: id },
                success: function(response) {
                    if(response === "OK") {
                        alert('Delete Success');
                       window.location.reload();
                    } else { 
           console.log("Deletion failed");
            }
                },
                error: function(xhr, status, error) {
                   
                }
            });
        });

    </script>
</body>
</html>
<?php
session_start();
require('src/cookie.php');
unset($_COOKIE['PHPSESSID']);
// Function to generate a random token
function generateToken() {
  return bin2hex(random_bytes(32));
}
$_SESSION['token']=generateToken();
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberBully</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>


<div class="w-full h-screen flex justify-center items-center">
<div class="w-full max-w-xs">
<h1 class="text-2xl text-green-500 text-center">Cann't Bruce Forcing </h1>
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="check.php" method="post">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"> 
  <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="name">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" >
      <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Login
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Forgot Password?
      </a>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div> 
</div>

 
 
</body>

</html>

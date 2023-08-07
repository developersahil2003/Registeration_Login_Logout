<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<html lang="en">
<!doctype html>

<head>
    <!-- Required meta tags -->
    <me ta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome Page</title>
</head>

<body>
<div class="text-center mt-5 text-info"><h1> Welcome, <?php echo $_SESSION['username'];?></h1></div>
<div class="container">
    <a href="logout.php" class="btn btn-danger">Logout.php</a>
</div>
</body>

</html>
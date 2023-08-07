<?php
$login = 0;
$invalid = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];






    # this below query:- first select username and run a query then make a condition that
    #if that selected value is not unique using num>0 then show user already exist 
    # else run a insert query and send all data into database and if data has gone 
    #into database then show gone other wise show error using die method

    $sql = "select * from `registeration` where username = '$username' and password = '$password'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "Login Successfully";
            $login = 1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        } else {
            // echo "Invalid data";
            $invalid = 1;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Log In page</title>
</head>

<body>
    <?php
    if ($invalid) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Invalid credentials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Welcome</strong> Successfully Logged In.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container mt-5">
        <div class="text-center">
            <h1>Log In Page</h1>
        </div>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Login</button>
        </form>
        <div class="container">
            <a href="sign.php">Don't have an account</a>
        </div>
    </div>

</body>

</html>
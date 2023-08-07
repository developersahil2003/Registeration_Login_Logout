<?php
$success = 0;
$user = 0;
$invalid = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];






    # this below query:- first select username and run a query then make a condition that
    #if that selected value is not unique using num>0 then show user already exist 
    # else run a insert query and send all data into database and if data has gone 
    #into database then show gone other wise show error using die method

    $sql = "select * from `registeration` where username = '$username'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "<br>user already exist";
            $user = 1;
        } else {
            if ($password === $cpassword) {
                $sql = "insert into `registeration`(username,password) 
                    values ('$username','$password')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    // echo "gone";
                    $success = 1;
                    header('location:login.php');
                }
            } else {
                // die(mysqli_error($con));
                $invalid = 1;
            }
        }
    }
}


$str = <<<Demo
hello
Demo;
echo "$str";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign Up page</title>
</head>

<body>
    <?php
    if ($user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh! no sorry</strong> User already exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Welcome</strong> Successfully signed Up.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($invalid) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry </strong>Password did not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container mt-5">
        <div class="text-center">
            <h1>Sign Up Page</h1>
        </div>
        <form action="sign.php" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm password">
            </div>

            <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Sign in</button>
        </form>
        <div class="container">
            <a href="login.php">
                Already have an account</a>
        </div>
    </div>

</body>

</html>
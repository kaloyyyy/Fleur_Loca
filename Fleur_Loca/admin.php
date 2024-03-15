<?php

require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';


session_start();
error_reporting(0);


if (isset($_POST['loginadmin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] =$email;
        header("Location: /Fleur_Loca/admin/adminhome.php");
    }
    else {
        echo 'Email or Password is Wrong!';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fleur Loca</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/adminlogin.css"/>
    <script
        src="https://kit.fontawesome.com/bf1c643ee2.js"
        crossorigin="anonymous"
    ></script>
</head>
<body>

<section class="sign-in">
    <div class="brand-logo container flex-column">
    <img src="images/fleurlogo.png" alt="" id="logo" />
    </div>
    <div class="container d-flex justify-content-center align-items-center" id="adminlogin">
        <form action="" class="form-signup border shadow p-3 rounded" method="POST">
            <h2 class="modal-title">Admin</h2>
            <hr class="mb-3">
            <div class="col-sm-9 col-sm-9">
                <div class="form-group" id="logform">
                    <label>Email</label><input type="email" class="form-control input-lg " placeholder="Email Address" id="email" name="email" required>
                </div>
            </div>
            <div class="col-sm-9 col-sm-9">
                <div class="form-group" id="logform">
                    <label>Password</label> <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                </div>
            </div>

            <div class="form-group d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-block" name="loginadmin" id="loginadmin">Login</button>
            </div>
        </form>
    </div>

</section>


<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
></script>
</body>
</html>

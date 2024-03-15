<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

if(isset($_POST['submit'])){
    $image_name = $_POST['albumName'];
    $image_background = $_FILES['background_image']['name'];
    $background_image_tmp_name = $_FILES['background_image']['tmp_name'];
    $background_image_folder = 'C:\xampp\htdocs\Fleur_Loca\gallerypic\\'.$image_background;

    if(empty($image_name)) {
        $message[] = 'Please enter the album name.';
    }

    if(empty($image_background)) {
        $message[] = 'Please select a background image.';
    }

    if(empty($message)){ // Check if there are no error messages
        $insert = "INSERT INTO album(albumName, background_image, date) VALUES('$image_name', '$image_background', NOW())";
        $upload = mysqli_query($conn, $insert);
        if($upload){
            move_uploaded_file($background_image_tmp_name, $background_image_folder);
            $message[] = 'New album added successfully';
        }else{
            $message[] = 'Album could not be added to the list';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminheader.css">
    <link rel="stylesheet" href="css/addalbum.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/style.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/header.css">


    <script
            src="https://kit.fontawesome.com/bf1c643ee2.js"
            crossorigin="anonymous"
    ></script>
</head>
<body>

<div class="d-flex" id="wrapper">
    <!----Sidebar here---->
    <?php include 'C:\xampp\htdocs\Fleur_loca\admin\adminsidebar.php' ?>


    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="addform container-fluid px-4">

            <form action="" method="post" enctype="multipart/form-data">
                <label for="albumName">Album Name:</label><br>
                <input type="text" id="albumName" name="albumName"><br><br>
                <label for="background_image">Background Image:</label><br>
                <input type="file" id="background_image" name="background_image"><br><br>

                <input type="submit" value="Submit" name="submit">
            </form>

            <div class="message">
                <?php
                if(!empty($message)){
                    foreach ($message as $msg){
                        echo '<span class="message">'.$msg.'</span><br>'; // Changed variable name from $message to $msg to avoid conflict
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>













</body>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</html>
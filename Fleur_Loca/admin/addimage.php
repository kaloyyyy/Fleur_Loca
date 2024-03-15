<?php
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

if(isset($_POST['submit'])) {
    $album_id = $_POST['album_id'];

    foreach ($_FILES['gallery_image']['name'] as $key => $file_name) {
        $gallery_image = $file_name;
        $background_image_tmp_name = $_FILES['gallery_image']['tmp_name'][$key];
        $background_image_folder = 'C:\xampp\htdocs\Fleur_Loca\gallerypic\\' . $gallery_image;

        // Move the uploaded file to the desired folder
        if (move_uploaded_file($background_image_tmp_name, $background_image_folder)) {
            // File moved successfully, now insert into database
            $sql = "SELECT albumName FROM album WHERE albumID = $album_id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $gallery_name = $row['albumName'];

                $insert = "INSERT INTO gallery(album_id, gallery_name, gallery_image, date) VALUES('$album_id', '$gallery_name','$gallery_image', NOW())";
                $upload = mysqli_query($conn, $insert);
                if (!$upload) {
                    $message[] = 'Error uploading file: ' . mysqli_error($conn);
                }
            } else {
                $message[] = 'Error fetching album information';
            }
        } else {
            $message[] = 'Error moving uploaded files';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        <form action="addimage.php" method="post" enctype="multipart/form-data">
            <label for="album_id">Select Album:</label><br>
            <select class="form-select" id="album_id" name="album_id">
                <option selected>Select Album</option>
                <?php
                $sql = "SELECT * FROM album";
                $query_run = mysqli_query($conn, $sql);

                if ($query_run && mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <option value="<?= $row['albumID'];?>"><?= $row['albumName'];?></option>
                        <?php
                    }
                } else {
                    echo "No categories";
                }
                ?>
            </select>

            <br><br>

            <label for="gallery_image">Gallery Images:</label><br>
            <input type="file" id="gallery_image" name="gallery_image[]" multiple><br><br>

            <input type="submit" value="Submit" name="submit">
        </form>
</div>













</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</html>

<?php
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

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

        <form action="viewimage.php" method="get">
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
            <button type="submit" class="btn btn-primary">Go Next</button>
        </form>
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


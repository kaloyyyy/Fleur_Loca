<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminheader.css">
    <link rel="stylesheet" href="css/viewAlbum.css">
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
        </nav>


        <div class="container albumtable">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Albums</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Album Name</th>
                                    <th>Album Image</th>
                                    <th>Date Created</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM album";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['albumName'] ?></td>
                                                <td><img src="/Fleur_Loca/gallerypic/<?php echo $row['background_image'] ?>" alt="<?php echo $row['albumName'] ?>" width="150px" height="100px"></td>
                                                <td><?php echo $row['date'] ?></td>
                                            </tr>
                                            <?php

                                        }
                                    }
                                }
                                ?>

                                <!-- Add more rows for additional albums -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

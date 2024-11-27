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
                            <?php
                            if(isset($_GET['album_id'])) {
                                $albumID = $_GET['album_id'];

                                // Query the database to retrieve images for the selected album
                                $sql = "SELECT * FROM gallery WHERE album_id = $albumID";
                                $result = mysqli_query($conn, $sql);

                                // Check if the query was successful
                                if ($result) {
                                    // Fetch the row from the result set
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <h2><?php echo $row['gallery_name']; ?></h2>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Gallery Name</th>
                                    <th>Background Image</th>
                                    <th>Date Created</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(isset($_GET['album_id'])) {
                                        $albumID = $_GET['album_id'];

                                        // Query the database to retrieve images for the selected album
                                        $sql = "SELECT * FROM gallery WHERE album_id = $albumID";
                                        $result = mysqli_query($conn, $sql);

                                        // Display images
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                <tr>
                                    <td><?php echo $row['gallery_image'] ?></td>
                                    <td><img src="/Fleur_Loca/gallerypic/<?php echo $row['gallery_image'] ?>" alt="<?php echo $row['gallery_name'] ?>" width="100px" height="120px"></td>
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

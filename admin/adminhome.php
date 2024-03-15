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
    <link rel="stylesheet" href="css/adminhome.css">
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
            <div class="dashboard d-flex align-items-center">
                <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="row g-3 my-2">

                    <div class="col-md-3">
                        <div class="dashboard-box p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                $query = "SELECT albumID FROM album ORDER BY albumID";
                                $query_run = mysqli_query($conn, $query);
                                if ($row = mysqli_num_rows($query_run)) {
                                    echo '<h3 class="fs-2" style="color: #F4903A">' . $row . '</h3>';
                                }else{
                                    echo '<h3 class="fs-2">No Data</h3>';
                                }

                                ?>
                                <p class="fs-5" style="color: #85AD6E;"><b>Albums</b></p>
                            </div>
                            <i class="fa-solid fa-images fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        <div class="details">
                            <a href="viewAlbum.php">
                                <div class="panel-footer p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                                    <div class="col-10">
                                        <span>View Details</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <span><i class="fa fa-arrow-circle-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class=" dashboard-box p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                $query = "SELECT galleryID FROM gallery ORDER BY galleryID";
                                $query_run = mysqli_query($conn, $query);
                                if ($row = mysqli_num_rows($query_run)) {
                                    echo '<h3 class="fs-2" style="color: #F4903A">' . $row . '</h3>';
                                }else{
                                    echo '<h3 class="fs-2">No Data</h3>';
                                }

                                ?>
                                <p class="fs-5" style="color:#85AD6E;"><b>Gallery Images</b></p>
                            </div>
                            <i class="fa-solid fa-camera fs-1 border rounded-full secondary-bg p-3" style="color: #F4903A"></i>
                        </div>
                        <div class="details">
                            <a href="viewGallery.php">
                                <div class="panel-footer p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                                    <div class="col-10">
                                        <span>View Details</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <span><i class="fa fa-arrow-circle-right"></i></span>
                                    </div>
                                </div>
                            </a>
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
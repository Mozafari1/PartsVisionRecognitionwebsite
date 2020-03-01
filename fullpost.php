<?php
include "include/session.php";
include "include/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Ibarra+Real+Nova|Pinyon+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
<link rel="manifest" href="/site.webmanifest">

<body>

    <div>
        <nav class="slides-navigation">
            <a href="#" class="forward"><i class="fas fa-chevron-left" style="font-size: 43px; color: white;"></i></a>
            <a href="#" class="back"><i class="fas fa-chevron-right" style="font-size: 43px; color: white;"></i></a>
        </nav>
    </div>
    <!--NAVBAR ending-->
    <nav id="navigation" class="navbar navbar-expand-lg navbar-flat">
        <a class="navbar-brand" href="index.php"> Parts Vision Recognition </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-ellipsis-v"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="navbarUl">
                <li class="nav-item">
                    <a class="nav-link" href="index.php#prosjekt">Prosjekt <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#presentasjon">Presentasjon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#chart">Gantt diagram</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#partner">Partner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#profil">Profil</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="news" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nyhet
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php#blogg">Blogg</a>
                        <a class="dropdown-item" href="index.php#timeliste">Timeliste</a>
                        <a href="index.php#challeng" class="dropdown-item">Utfordringer</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php #contact">Kontakt</a>
                </li>
            </ul>
        </div>
    </nav>
    <title>Parts Vision Recognation</title>

    </head>

    <!--Header starting-->
    <div class="container">
        <div class="row mt-2">
            <!--Main area-->
            <div class="col-sm-8 ">



                <?php
                global $ConnectingDB;

                $PostIDFromURL = $_GET["id"];
                $ViewQuery = "SELECT * FROM posts WHERE id='$PostIDFromURL' ORDER BY date desc";

                $stmt = mysqli_query($ConnectingDB, $ViewQuery);

                while ($DataRows = mysqli_fetch_assoc($stmt)) {
                    $PostId = mysqli_real_escape_string($ConnectingDB, $DataRows["id"]);
                    $Date = mysqli_real_escape_string($ConnectingDB, $DataRows["date"]);
                    $PostTitle = mysqli_real_escape_string($ConnectingDB, $DataRows["head"]);
                    $Admin = mysqli_real_escape_string($ConnectingDB, $DataRows["author"]);
                    $Image = mysqli_real_escape_string($ConnectingDB, $DataRows["image"]);
                    $PostDesc = mysqli_real_escape_string($ConnectingDB, $DataRows["body"]);
                    // check this brackets
                ?>

                    <div class="card">
                        <img class="img-fluid card-img-top" src="image/<?php echo htmlentities($Image); ?>" />
                        <div class="card-body">
                            <h4 class="card-title" style=" color: #222930;"> <?php echo htmlentities($PostTitle); ?></h4>
                            <small style=" color: #222930;"> Posted by:<?php echo htmlentities($Admin); ?>

                                On <?php echo htmlentities($Date); ?></small>
                            <hr style="color:green;">
                            <p class="card-text ">
                                <?php
                                echo htmlentities(nl2br($PostDesc)); ?></p>

                        </div>
                    </div>
                    <br> <!-- For å få litt luft mellom hver post-->
                <?php } ?>

                <!-- komment part start -->

            </div>
            <!--END OF Main area-->

            <!--Side area-->
            <div class=" col-sm-4">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h2 class="lead" style="color: #fff;"> Nylige innlegg</h2>
                    </div>
                    <div class="card-body" style="background-color: #222930;">
                        <?php
                        global $ConnectingDB;
                        $sql = "SELECT * FROM posts ORDER BY id desc";
                        $stmt = mysqli_query($ConnectingDB, $sql);
                        while ($DataRows = mysqli_fetch_assoc($stmt)) {
                            $Id     = mysqli_real_escape_string($ConnectingDB, $DataRows['id']);
                            $Title  = mysqli_real_escape_string($ConnectingDB, $DataRows['head']);
                            $DateTime = mysqli_real_escape_string($ConnectingDB, $DataRows['date']);
                            $Image = mysqli_real_escape_string($ConnectingDB, $DataRows['image']);
                        ?>
                            <div class="media">
                                <img src="image/<?php echo htmlentities($Image); ?>" class="d-block img-fluid align-self-start" width="90" height="70" alt="">
                                <div class="media-body ml-2">
                                    <a style="text-decoration:none;" href="fullpost.php?id=<?php echo htmlentities($Id); ?>">
                                        <h6 class="lead" style="color: #fff;"><?php echo htmlentities($Title); ?></h6>
                                    </a>
                                    <p class="small" style="color: #fff;"><?php echo htmlentities($DateTime); ?></p>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>

                    </div>
                </div>
                <!-- side area ending -->
            </div>
            <!-- end of side are -->

        </div>
    </div>


    <div class="clear"></div>

    <script src="typed.min.js"></script>
    <script src="script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>



</html>
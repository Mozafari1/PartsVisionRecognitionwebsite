<?php
include "include/session.php";
include "include/functions.php";
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
Confirm_Login();
$AdminId = mysqli_real_escape_string($ConnectingDB, $_SESSION["UserId"]);
$sql2 = "SELECT * FROM adm WHERE id='$AdminId'";
$stmt2 = mysqli_query($ConnectingDB, $sql2);
while ($datarows = mysqli_fetch_assoc($stmt2)) {
    $XLastName    = mysqli_real_escape_string($ConnectingDB, $datarows['lname']);
    $XID    = mysqli_real_escape_string($ConnectingDB, $datarows['id']);
}
?>

<meta charset="utf-8">
<title>Dashboard</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin.css">

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link " href="about.php">Om Prosjekt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newpost.php"> Ny Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="presentation2.php"> 2. presentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="presentation3.php"> 3. presentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gantt.php">Gantt Diagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="presentasjon.php">Presentasjon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gruppe.php">Timeliste</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Til bloggen</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link ">
                        <!-- <i class="fas fa-user-circle text-primary"> -->
                        <img class="pro_img" src="image/rm.jpg" style="height:25px; width:25px; border-radius: 50%" alt="">
                        </i>&nbsp;
                        <?php echo htmlentities($XLastName);
                        ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt text-danger"></i>&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <header class="transparent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span>
                        <h1 class="slideLeft"><i class="fas fa-cog" style="color:white"></i>&nbsp;Dashboard</h1>
                        <p class="text-center">This page shows the total of each table from the database</p>
                    </span>
                    <?php

                    echo ErrorMsg();
                    echo SuccessMSg();
                    ?>

                </div>
                <!--Main area-->
                <section class="container ">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card text-center mb-3">
                                <div class="card-body">
                                    <h1 class="lead"> About the project</h1>
                                    <h4 class="display-5">
                                        <i class="fab fa-readme" style="color:white;"></i>
                                        <?php
                                        htmlentities(about());

                                        ?>
                                    </h4>
                                </div>

                                <!--                                     -->
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card text-center mb-3">
                                <div class="card-body">
                                    <h1 class="lead"> The users</h1>
                                    <h4 class="display-5">
                                        <i class="fab fa-user" style="color:white;"></i>
                                        <?php
                                        htmlentities(users());

                                        ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

</body>
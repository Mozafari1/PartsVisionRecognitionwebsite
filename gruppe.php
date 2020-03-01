<?php
include "include/session.php";
include "include/functions.php";
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
Confirm_Login();
$AdminId = mysqli_real_escape_string($ConnectingDB, $_SESSION["UserId"]);
$sql2 = "SELECT lname FROM adm WHERE id='$AdminId'";
$stmt2 = mysqli_query($ConnectingDB, $sql2);
while ($datarows = mysqli_fetch_assoc($stmt2)) {
    $XLastName    = mysqli_real_escape_string($ConnectingDB, $datarows['lname']);
}
global $ConnectingDB;

if (isset($_POST["Submit"])) {
    $sprint = mysqli_real_escape_string($ConnectingDB, $_POST["sprint"]);
    $adi = mysqli_real_escape_string($ConnectingDB, $_POST["adi"]);
    $rahmat = mysqli_real_escape_string($ConnectingDB, $_POST["rahmat"]);
    $jens = mysqli_real_escape_string($ConnectingDB, $_POST["jens"]);
    $daniel = mysqli_real_escape_string($ConnectingDB, $_POST["daniel"]);
    $kristian = mysqli_real_escape_string($ConnectingDB, $_POST["kristian"]);
    $kirisan = mysqli_real_escape_string($ConnectingDB, $_POST["kirisan"]);
    $Admin = mysqli_real_escape_string($ConnectingDB, $_SESSION["LastName"]);
    date_default_timezone_set("Europe/Oslo");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    if (empty($sprint || $adi || $rahmat || $jens || $daniel || $kristian || $kirisan)) {
        $_SESSION["ErrorMsg"] = "Alle felt må fylles";
        Redirect_to("gruppe.php");
    } elseif (strlen($jens || $kirisan || $daniel || $kristian || $adi || $rahmat) > 3) {
        $_SESSION["ErrorMsg"] = "Kan ikek være større enn 3 tegn '20' ";
        Redirect_to("gruppe.php");
    } else {
        // Query to  category in DB When everything is fine
        global $ConnectingDB;
        $sql = "INSERT INTO gruppe(sprint, adi, rahmat, jens, daniel, kristian, kirisan,author,date) 
        VALUES('$sprint','$adi', '$rahmat', '$jens', '$daniel', '$kristian',' $kirisan','$Admin', '$DateTime')";
        $Execute = mysqli_query($ConnectingDB, $sql);
        if ($Execute) {
            $_SESSION["SuccessMsg"] = "New post added Successfully";
            Redirect_to("gruppe.php");
        } else {
            $_SESSION["ErrorMsg"] = "Something went wrong. Try Again !";
            Redirect_to("gruppe.php");
        }
    }
}
?>

<meta charset="utf-8">
<title> Timeliste</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin.css">

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <ul class="navbar-nav ">

            <li class="nav-item">
                <a class="nav-link active" href="gruppe.php">Timeliste</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link "><i class="fas fa-user-circle text-primary"></i>&nbsp; <?php echo htmlentities($XLastName);
                                                                                            ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt text-danger"></i>&nbsp;Logout</a>
            </li>
        </ul>
    </nav>

    <!--Main area-->
    <section class="container">
        <div class="row">
            <div class="offset-sm-2 col-sm-8">
                <form action="gruppe.php" method="post" enctype="multipart/form-data">

                    <div class="card mb-3">
                        <h4 class="text-center ">Fyll inn sprint timelisten</h4>
                        <div class="card-body">
                            <div class="form-group">

                                <input class="form-control" type="text" name="sprint" placeholder="Fyll inn sprinten eks: sprint 1" id="title">
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <img src="bilde/aa.png" alt="" style="height:20px; width:20px"> </span>

                                    <input class="form-control" type="text" name="adi" placeholder="Fyll inn sprint timelisten" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <img src="bilde/rm.png" alt="" style="height:20px; width:20px"> </span>

                                    <input class="form-control" type="text" name="rahmat" placeholder="Fyll inn sprint timelisten" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <img src="bilde/jp.png" alt="" style="height:20px; width:20px"> </span>

                                    <input class="form-control" type="text" name="jens" placeholder="Fyll inn sprint timelisten" id="title">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <img src="bilde/dg.png" alt="" style="height:20px; width:20px"> </span>

                                    <input class="form-control" type="text" name="daniel" placeholder="Fyll inn sprint timelisten" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <img src="bilde/kk.png" alt="" style="height:20px; width:20px"> </span>

                                    <input class="form-control" type="text" name="kristian" placeholder="Fyll inn sprint timelisten" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <img src="bilde/km.png" alt="" style="height:20px; width:20px"> </span>

                                    <input class="form-control" type="text" name="kirisan" placeholder="Fyll inn sprint timelisten" id="title">
                                </div>
                            </div>
                            <div class="row ">

                                <button style="margin-left: 30%" type="submit" name="Submit" class="btn btn-success btn-md"> Send srpint timeliste</button> &nbsp;

                                <button type="button" class="btn btn-outline-info btn-md"> <a style="text-decoration: none; color: white" href="dashboard.php"> Back To Dashboard</a>
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
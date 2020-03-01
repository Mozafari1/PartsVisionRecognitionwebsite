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
    $Navn = mysqli_real_escape_string($ConnectingDB, $_POST["Navn"]);
    $Sprint = mysqli_real_escape_string($ConnectingDB, $_POST["Sprint"]);
    $S_YY = mysqli_real_escape_string($ConnectingDB, $_POST["S_YY"]);
    $S_MM = mysqli_real_escape_string($ConnectingDB, $_POST["S_MM"]);
    $S_DD = mysqli_real_escape_string($ConnectingDB, $_POST["S_DD"]);
    $E_YY = mysqli_real_escape_string($ConnectingDB, $_POST["E_YY"]);
    $E_MM = mysqli_real_escape_string($ConnectingDB, $_POST["E_MM"]);
    $E_DD = mysqli_real_escape_string($ConnectingDB, $_POST["E_DD"]);
    $Prosent = mysqli_real_escape_string($ConnectingDB, $_POST["Prosent"]);

    $Admin = mysqli_real_escape_string($ConnectingDB, $_SESSION["LastName"]);
    date_default_timezone_set("Europe/Oslo");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    if (empty($Navn || $Sprint || $S_YY || $S_MM || $S_DD || $E_YY || $E_MM || $E_DD || $Prosent)) {
        $_SESSION["ErrorMsg"] = "Alle felt må fylles";
        Redirect_to("gantt.php");
    } elseif (strlen($S_YY || $E_YY) > 5) {
        $_SESSION["ErrorMsg"] = "Kan ikek være større enn 5 tegn '2020' ";
        Redirect_to("gantt.php");
    } elseif (strlen($S_MM || $S_DD || $E_MM || $E_DD) > 3) {
        $_SESSION["ErrorMsg"] = "Kan ikke være større enn 3 tegn ' 0= januar og 1= feb' ";
        Redirect_to("gantt.php");
    } elseif (strlen($Prosent) > 4) {
        $_SESSION["ErrorMsg"] = "Kan ikke være større enn 4 tegn '100' ";
        Redirect_to("gantt.php");
    } else {
        // Query to  category in DB When everything is fine
        global $ConnectingDB;
        $sql = "INSERT INTO gantt(navn, sprint, syy, smm, sdd, eyy, emm,edd, prosent,author,date) 
        VALUES('$Navn', '$Sprint', '$S_YY', '$S_MM', '$S_DD',' $E_YY', '$E_MM',' $E_DD', '$Prosent','$Admin', '$DateTime')";
        $Execute = mysqli_query($ConnectingDB, $sql);
        if ($Execute) {
            $_SESSION["SuccessMsg"] = "New post added Successfully";
            Redirect_to("gantt.php");
        } else {
            $_SESSION["ErrorMsg"] = "Something went wrong. Try Again !";
            Redirect_to("gantt.php");
        }
    }
}
?>

<meta charset="utf-8">
<title> Gantt Diagram</title>
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
                <a class="nav-link active" href="gantt.php">Gantt Diagram</a>
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
                <form action="gantt.php" method="post" enctype="multipart/form-data">

                    <div class="card mb-3">
                        <h4 class="text-center ">Fyll inn Gantt Diagram</h4>
                        <div class="card-body">

                            <div class="form-group">
                                <input class="form-control" type="text" name="Navn" placeholder="Navn på sprint" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="Sprint" placeholder="Sprint 1 for eksemple" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="S_YY" placeholder="År, eks: 2020" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="S_MM" placeholder="Mnd, 0 = januar og 1 = feb" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="S_DD" placeholder="Dag, dato i dag" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="E_YY" placeholder="År" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="E_MM" placeholder="Mnd, hvilket mnd. slutter sprinten" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="E_DD" placeholder="Hvilket dato slutter sprinten" id="title">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="Prosent" placeholder="Hvor mange prosent er det gjort" id="title">
                            </div>
                            <div class="row ">

                                <button style="margin-left: 30%" type="submit" name="Submit" class="btn btn-success btn-md"> Submit New Post</button> &nbsp;

                                <button type="button" class="btn btn-outline-info btn-md"> <a style="text-decoration: none; color: white" href="dashboard.php"> Back To Dashboard</a>
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
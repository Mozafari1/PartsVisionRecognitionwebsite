<?php include "include/session.php";
include "include/functions.php";
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();
$AdminId = mysqli_real_escape_string($ConnectingDB, $_SESSION["UserId"]);
$sql2 = "SELECT lname FROM adm WHERE id='$AdminId'";
$stmt2 = mysqli_query($ConnectingDB, $sql2);
while ($datarows = mysqli_fetch_assoc($stmt2)) {
    $XLastName    = mysqli_real_escape_string($ConnectingDB, $datarows['lname']);
}
?>

<!-- sjekker hvis Submit Catagory button er presset da vil catagory navnet lagres i databasen
Sjekker også om feltet er tomt og hvis det er tomt skal den ikke lagres og gir en melding til brukeren
-->

<?php
if (isset($_POST["Submit"])) {
    global $ConnectingDB;
    $PostTitle = mysqli_real_escape_string($ConnectingDB, $_POST["PostTitle"]);
    $Admin = mysqli_real_escape_string($ConnectingDB, $_SESSION["LastName"]);
    date_default_timezone_set("Europe/Oslo");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    if (empty($PostTitle)) {
        $_SESSION["ErrorMsg"] = "Title can't be empty";
        Redirect_to("presentasjon.php");
    } elseif (strlen($PostTitle) < 2) {
        $_SESSION["ErrorMsg"] = "Title should be greater than 2 characters";
        Redirect_to("presentasjon.php");
    } elseif (strlen($PostTitle) > 40) {
        $_SESSION["ErrorMsg"] = "Post Descriptions should be less than than 459 characters";
        Redirect_to("presentasjon.php");
    } else {
        // Query to  category in DB When everything is fine
        global $ConnectingDB;
        $sql = "INSERT INTO presentasjon(date,name, author) 
    VALUES('$DateTime', '$PostTitle', '$Admin')";

        $Execute = mysqli_query($ConnectingDB, $sql);
        if ($Execute) {
            $_SESSION["SuccessMsg"] = "New post added Successfully";
            Redirect_to("presentasjon.php");
        } else {
            $_SESSION["ErrorMsg"] = "Something went wrong. Try Again !";
            Redirect_to("presentasjon.php");
        }
    }
} //Ending of Submit Button If-Condition
?>



<meta charset="utf-8">
<title>Presentasjon</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin.css">

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <ul class="navbar-nav ">

            <li class="nav-item">
                <a class="nav-link active" href="presentasjon.php">Presentasjon</a>
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
    <!--NAVBAR ending-->
    <!--Header starting-->

    <!--Main area-->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <?php
                echo ErrorMsg();
                echo SuccessMsg();
                ?>

                <form action="presentasjon.php" method="post" enctype="multipart/form-data">

                    <div class="card text-light mb-3">
                        <h4 class="text-center ">Skriv hvilke presentasjon det er </h4>
                        <small class="text-center ">Skriv i store bokstaver</small>
                        <div class=" card-body">
                            <div class="form-group">
                                <input class="form-control" type="text" name="PostTitle" placeholder="Hviklet presentasjon?" id="title">
                            </div>

                            <div class="row ">

                                <button style="margin-left: 30%" type="submit" name="Submit" class="btn btn-success btn-md">Send</button> &nbsp;

                                <button type="button" class="btn btn-outline-info btn-md"> <a style="text-decoration: none; color: white" href="dashboard.php"> Tilbake til dashboard</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
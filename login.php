<?php
include_once "include/session.php";
include_once "include/functions.php";
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];

global $ConnectingDB;
if (isset($_SESSION["UserId"])) {
    Redirect_to("parts33345252244454325454ireytu8y8er7t87484375843.php");
}
if (isset($_POST["Submit"])) {
    $Email =  mysqli_real_escape_string($ConnectingDB, $_POST["Email"]);
    $Password = mysqli_real_escape_string($ConnectingDB, $_POST["Password"]);
    if (empty($Email) || empty($Password)) {
        $_SESSION["ErrorMsg"] = "Alle felt må fylles ut.";
        Redirect_to("login.php");
        exit;
    } else {
        $Found_User = Login_Check($Email, $Password);
        if ($Found_User) {
            $_SESSION["UserId"] = mysqli_real_escape_string($ConnectingDB, $Found_User["id"]);
            $_SESSION["FirstName"] = mysqli_real_escape_string($ConnectingDB, $Found_User["fname"]);
            $_SESSION["LastName"] = mysqli_real_escape_string($ConnectingDB, $Found_User["lname"]);
            $_SESSION["Email"] = mysqli_real_escape_string($ConnectingDB, $Found_User["email"]);
            $_SESSION["SuccessMsg"] = "Velkommen " . $_SESSION["LastName"];
            // if (isset($_SESSION["TrackingURL"])) {
            //     Redirect_to($_SESSION["TrackingURL"]);
            // }
            Redirect_to("dashboard.php");
        } // var_dump($Found_User);
        else {
            $_SESSION["ErrorMsg"] = "Ops, Ugyldig passord eller feil brukernavn, prøv på nytt";
            Redirect_to("login.php");
        }
    }
}
?>

<meta charset="utf-8">
<title>Logg inn</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin.css">


<body>

    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-sm-3 col-sm-6" style="min-height:67vh;">
                <br>
                <?php
                echo ErrorMsg();
                echo SuccessMsg();
                ?>
                <div class="card">
                    <div class="card-header">
                        <h2 class="lead text-center" style="font-size: 2rem; color: white; font-weight: bold">
                            Logg inn</h2>
                    </div>
                    <div class="card-body">
                        <form class="" action="login.php" method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"> <i class="fas fa-user " style="color:#222930"></i> </span>
                                    </div>
                                    <input type="email" class="form-control" name="Email" id="email" value="" placeholder="Epost">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"> <i class="fas fa-lock" style="color:#222930; "></i> </span>
                                    </div>
                                    <input type="password" class="form-control" name="Password" id="password" value="" placeholder="Passord">
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="submit" name="Submit" class="btn btn-success btn-block" value="Logg inn" style="margin-right: 34%; font-weight: bold; ">
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
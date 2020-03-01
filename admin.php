<?php
include_once "include/session.php";
include_once "include/functions.php";

if (isset($_POST["Submit"])) {
    global $ConnectingDB;
    $FirstName = mysqli_real_escape_string($ConnectingDB, $_POST["Firstname"]);
    $LastName = mysqli_real_escape_string($ConnectingDB, $_POST["Lastname"]);
    $Email = mysqli_real_escape_string($ConnectingDB, $_POST["Email"]);
    $Password = mysqli_real_escape_string($ConnectingDB, $_POST["Password"]);
    $ConfirmPassword = mysqli_real_escape_string($ConnectingDB, $_POST["ConfirmPassword"]);

    date_default_timezone_set("Europe/Oslo");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    if (empty($FirstName) || empty($LastName) || empty($Email) || empty($Password) || empty($ConfirmPassword)) {
        $_SESSION["ErrorMsg"] = "Alle felt må fylles ut.";
        Redirect_to("admin.php");
    } elseif ($Password !== $ConfirmPassword) {
        $_SESSION["ErrorMsg"] = "Passord må være like";
        Redirect_to("admin.php");
    } elseif (strlen($Password) < 2) {
        $_SESSION["ErrorMsg"] = "Passord må være minst 8 tegn";
        Redirect_to("admin.php");
    } elseif (CheckUserNamenDB($Email)) {
        $_SESSION["ErrorMsg"] = "Det finnes en bruker med det epost ";
        Redirect_to("admin.php");
    } else {
        // Query to insert New Admin in DB When everything is fine
        global $ConnectingDB;
        $Hashed_Password = Password_Encryption($Password);
        $stmt = $ConnectingDB->prepare("INSERT INTO adm(date,fname,lname,password,email) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $DateTime, $FirstName, $LastName, $Hashed_Password, $Email);
        $Execute = $stmt->execute();
        //  var_dump($Execute);
        if ($Execute) {
            $_SESSION["SuccessMsg"] = "Brukern var opprettet";
            Redirect_to("login.php");
        } else {
            $_SESSION["ErrorMsg"] = "Noe gikk galt, prøv på nytt!";
            Redirect_to("admin.php");
        }
    }
} //Ending of Submit Button If-Condition
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">


    <meta charset="utf-8">
    <title>Opprett bruker</title>
</head>

<body>


    <section class="container ">
        <div class="row">
            <div class="offset-md-3 col-md-6">


                <form action="admin.php" method="post">

                    <div class="card">
                        <h4 class="text-center" style="color:white;"> <i class="fas fa-user-shield" style="color:white;"></i>&nbsp; Opprett bruker</h4>
                        <p class="p">Alle felt må fylles ut.</p>
                        <div class="card-body">

                            <div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="Firstname" placeholder="Fornavn" id="firstname">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="text" name="Lastname" placeholder="Etternavn" id="lastname">

                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="email" name="Email" placeholder="Epost" id="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="Password" placeholder="Passord" id="Password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="ConfirmPassword" placeholder="Passord gjenta" id="ConfirmPassword">
                                </div>
                                <p class="p">Ved å opprette bruker aksepterer du vår personvern og vilkår</p>

                                <div class="row">
                                    <button type="submit" name="Submit" class="btn btn-success "> <i class="fas fa-user-plus "></i> Opprett bruker</button>
                                </div>
                            </div>
                        </div>
                        <?php echo ErrorMsg() ?>
                </form>
            </div>
        </div>

    </section>
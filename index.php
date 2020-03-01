<?php
include "include/session.php";
include "include/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
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


    <!-- Google time line -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <title>Parts Vision Recognation</title>

</head>

<body>

    <div>
        <!-- <img class='bach' src="image/pvr.png" alt="bach_img"> -->
        <nav class="slides-navigation">
            <a href="#" class="forward"><i class="fas fa-chevron-left" style="font-size: 43px; color: white;"></i></a>
            <a href="#" class="back"><i class="fas fa-chevron-right" style="font-size: 43px; color: white;"></i></a>
        </nav>
    </div>

    <nav id="navigation" class="navbar navbar-expand-lg navbar-flat">
        <a class="navbar-brand" href="#"> Parts Vision Recognition </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-ellipsis-v"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="navbarUl">
                <li class="nav-item">
                    <a class="nav-link" href="#prosjekt">Prosjekt <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#presentasjon">Presentasjon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chart">Gantt diagram</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#partner">Partner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="news" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nyhet
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#blogg">Blogg</a>
                        <a class="dropdown-item" href="#timeliste">Timeliste</a>
                        <a href="#challeng" class="dropdown-item">Utfordringer</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Kontakt</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--  -->
    <div id="prosjekt" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <?php
                    global $ConnectingDB;
                    $sql = "SELECT * FROM about ORDER BY id desc LIMIT 0,1";
                    $stmt = mysqli_query($ConnectingDB, $sql);


                    while ($DataRows = mysqli_fetch_assoc($stmt)) {
                        $PostId = mysqli_real_escape_string($ConnectingDB, $DataRows["id"]);
                        $Date = mysqli_real_escape_string($ConnectingDB, $DataRows["date"]);
                        $PostTitle = mysqli_real_escape_string($ConnectingDB, $DataRows["title"]);
                        $Admin = mysqli_real_escape_string($ConnectingDB, $DataRows["author"]);
                        $Image = mysqli_real_escape_string($ConnectingDB, $DataRows["image"]);
                        $PostDesc = mysqli_real_escape_string($ConnectingDB, $DataRows["post"]);

                    ?>

                        <img class="im" src="image/<?php echo $Image; ?>" alt="">
                </div>
                <div class="col-md-7">
                    <h3 class="spa"><?php echo htmlentities($PostTitle); ?></h3>
                    <hr>
                    <p class="aboutText"><?php echo nl2br($PostDesc); ?></p>
                    <small class="text-muted">
                        <?php echo "Skrevet av: ", htmlentities($Admin); ?>, i <?php echo htmlentities($Date); ?></small>
                    <div>

                    <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Time line -->

    <section class="experience section" id="experience">
        <div class="container">

            <div class="heading">
                <?php
                global $ConnectingDB;
                $sql = "SELECT * FROM presentasjon ORDER BY id desc LIMIT 0,1";
                $stmt = mysqli_query($ConnectingDB, $sql);


                while ($DataRows = mysqli_fetch_assoc($stmt)) {
                    $PostId = mysqli_real_escape_string($ConnectingDB, $DataRows["id"]);
                    $Date = mysqli_real_escape_string($ConnectingDB, $DataRows["name"]);



                ?>

                    <h2 class='pres'>VELKOMMEN TIL <?php echo htmlentities($Date); ?> PRESENTASJON</h2>

            </div>
        <?php } ?>
        <hr class="newline">

        <div class="row">

            <div class="timeline">

                <div class="left" id="cont">
                    <div class="content">
                        <div class="innercontent">

                            <?php
                            global $ConnectingDB;
                            $sql = "SELECT * FROM presen3 ORDER BY id desc LIMIT 0,1";
                            $stmt = mysqli_query($ConnectingDB, $sql);


                            while ($DataRows = mysqli_fetch_assoc($stmt)) {
                                $PostId = mysqli_real_escape_string($ConnectingDB, $DataRows["id"]);
                                $Date = mysqli_real_escape_string($ConnectingDB, $DataRows["dato"]);
                                $Tid = mysqli_real_escape_string($ConnectingDB, $DataRows["tid"]);
                                $rom = mysqli_real_escape_string($ConnectingDB, $DataRows["rom"]);


                            ?>

                                <h2 class="h2ps"> Dato: <?php echo htmlentities($Date); ?></h2>
                                <h2 class="h2ps"> Tid: <?php echo htmlentities($Tid); ?></h2>

                                <h2 class="h2p"> Universitetet i Sørøst-Norge, Compus Kongsberg</h2>
                                <p> Rom: <?php echo htmlentities($rom); ?></p>
                                <p> 3. Presentasjon</p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="right" id="cont">
                    <div class="content">
                        <div class="innercontent">
                            <?php
                            global $ConnectingDB;
                            $sql = "SELECT * FROM presen ORDER BY id desc LIMIT 0,1";
                            $stmt = mysqli_query($ConnectingDB, $sql);


                            while ($DataRows = mysqli_fetch_assoc($stmt)) {
                                $PostId = mysqli_real_escape_string($ConnectingDB, $DataRows["id"]);
                                $Date = mysqli_real_escape_string($ConnectingDB, $DataRows["dato"]);
                                $Tid = mysqli_real_escape_string($ConnectingDB, $DataRows["tid"]);
                                $rom = mysqli_real_escape_string($ConnectingDB, $DataRows["rom"]);


                            ?>
                                <h2 class="h2ps">Dato: <?php echo htmlentities($Date); ?> </h2>
                                <h2 class="h2ps"> Tid: <?php echo htmlentities($Tid); ?></h2>
                                <h2 class="h2p"> Universitetet i Sørøst-Norge, Compus Kongsberg</h2>
                                <p> Rom: <?php echo htmlentities($rom); ?></p>
                                <p> 2. Presentasjon</p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="left" id="cont">
                    <div class="content">
                        <div class="innercontent">
                            <h2 class="h2ps"> Dato: 31. jan 2020 </h2>
                            <h2 class="h2ps"> Tid: 12:00 - 14:00</h2>

                            <h2 class="h2p"> Universitetet i Sørøst-Norge, Compus Kongsberg</h2>
                            <p> Rom: 5119, 5. etasje</p>
                            <p> 1. Presentasjon</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--  -->

    <!--  -->

    <h2 id="gantt" class="about-gant"> Gantt Diagram</h2>
    <div class=" chart  section">

        <div class="container-fluid">




            <div class=" row">
                <div id="chart" class="col">
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['gantt']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Oppgave ID');
                            data.addColumn('string', 'Navn på oppgaven');
                            data.addColumn('string', 'Ressurs');
                            data.addColumn('date', 'Start Date');
                            data.addColumn('date', 'End Date');
                            data.addColumn('number', 'Lengde');
                            data.addColumn('number', 'Prosent Ferdig');
                            data.addColumn('string', 'Avhengig');

                            data.addRows([
                                <?php
                                global $ConnectingDB;
                                $sql = "SELECT * FROM gantt";
                                $stmt = mysqli_query($ConnectingDB, $sql);
                                while ($datarows = mysqli_fetch_assoc($stmt)) {
                                    echo "['" . $datarows['id'] . " ','" . $datarows['navn'] . " ',' " . $datarows['sprint'] . "', new Date(" . $datarows['syy'] . "," . $datarows['smm'] . "," . $datarows['sdd'] . "),
                                        new Date(" . $datarows['eyy'] . "," . $datarows['emm'] . "," . $datarows['edd'] . "), " . 'null' . " ," . $datarows['prosent'] . ",  " . 'null' .  "],";
                                }
                                ?>
                            ]);

                            var options = {
                                height: 500,
                                gantt: {
                                    trackHeight: 28
                                }
                            };

                            var chart = new google.visualization.Gantt(document.getElementById('chart'));

                            chart.draw(data, options);

                        }
                    </script>

                </div>

            </div>
        </div>

    </div>

    <div id="partner" class=" contactSection section">
        <div class="container">
            <h2 class="partner">Våre Partnere</h2>
            <hr class="line">
            <div class="row ">
                <div class="col mb-6">
                    <a class="tronrud-eng" href="https://www.tronrud.no/no/"><img src="image/logo-tro.JPG" alt=""></a>

                    <p class="about-tronrud">Tronrud Engineering AS i Hønefoss ble etablert av Ola Tronrud i 1977. Selskapet har i dag 150 ansatte i Hønefoss, og 50 ansatte i Moss. Selskapet driver primært sett med automatisering og robotisering og har flere innovative produkter
                        i sitt portfolio. Har blant annet pakkemaskiner, 3D-printing i titanmaterial og pallmerkingmaskiner.
                    </p>
                </div>

                <div class="col mb-6">
                    <a class="usn" href="https://www.usn.no/"><img src="image/USN.jpg" alt=""></a>
                    <p class="about-usn">Universitetet i Sørøst-Norge (USN), etablert 4. mai 2018, er universitetet hvor bachelorprosjektet nå skal gjennomføres. Universitetet i sin helhet har over 17 000 studenter og over 1 300 ansatte. USN har 88 bachelorprogrammer, hvor
                        studenter fra 2 av programmene nå jobber sammen om dette prosjektet.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile -->


    <div id="profil" class="section">
        <h2 class="profil">PROFIL</h2>
        <div class="container">

            <div class="row">


                <div class="position-profil col mb-4">
                    <img class='profil-img' src="image/aa.jpeg" alt="cloud">
                    <h3 class="navn">Adithya Arun
                    </h3>
                    <h4 class='linje'>Maskiningeniør</h4>
                    <h4 class='linje'>Test ansvarlig og Scrum master</h4>
                    <a href="https://www.linkedin.com/in/adithya-arun-899994190/"><i class="fab fa-linkedin" style="color:cornflowerblue; "></i></a>

                </div>
                <div class="position-profil col mb-4">
                    <img class='profil-img' src="image/kk.jpeg" alt="cloud">
                    <h3 class="navn">Kristian Klev</h3>
                    <h4 class='linje'> Maskiningeniør</h4>
                    <h4 class='linje'>CAD ansvarlig</h4>
                    <a href="https://www.linkedin.com/in/kristian-klev-363820197/"><i class="fab fa-linkedin" style="color:cornflowerblue; "></i></a>

                </div>

                <div class="position-profil col mb-4">
                    <img class='profil-img' src="image/km.jpg" alt="cloud">
                    <h3 class="navn">Kirisan Manivannan</h3>
                    <h4 class='linje'>Dataingeniør </h4>
                    <h4 class='linje'>Software ansvarlig</h4>
                    <a href="https://www.linkedin.com/in/kirisanm/"><i class="fab fa-linkedin" style="color:cornflowerblue; "></i></a>

                </div>

                <div class="position-profil col mb-4">
                    <img class='profil-img' src="image/jp.jpeg" alt="cloud">
                    <h3 class="navn">Jens Paulsen
                    </h3>
                    <h4 class='linje'>Dataingeniør </h4>
                    <h4 class='linje'>Dokumentasjonsansvarlig </h4>
                    <a href="https://www.linkedin.com/in/jens-roksvaag-paulsen-205119176/"><i class="fab fa-linkedin" style="color:cornflowerblue; "></i></a>

                </div>
                <div class="position-profil col mb-4">
                    <img class='profil-img' src="image/dg.jpeg" alt="cloud">
                    <h3 class="navn">Daniel Gjesteby</h3>
                    <h4 class='linje'>Dataingeniør</h4>
                    <h4 class='linje'>Risko ansvarlig</h4>
                    <a href="https://www.linkedin.com/in/daniel-gjesteby-6bb213198/ "><i class="fab fa-linkedin" style="color:cornflowerblue; "></i></a>


                </div>

                <div class="position-profil col mb-4">
                    <img class='profil-img' src="image/rm.PNG" alt="cloud">
                    <h3 class="navn">Rahmat Mozafari</h3>
                    <h4 class='linje'>Dataingeniør </h4>
                    <h4 class='linje'>Produkteier og prototype ansvarlig</h4>
                    <a href="https://www.linkedin.com/in/rahmat-mozafari"><i class="fab fa-linkedin" style="color:cornflowerblue; position: center;"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- Blogg -->
    <div id="blogg" class="contactSection section">

        <div class="container">
            <h2 class="profil text-center" style="padding-bottom: 4rem">BLOGG</h2>

            <div class="row ">

                <div class="col-sm-8">




                    <!-- Activiting the SearchButton -->
                    <?php
                    global $ConnectingDB;
                    $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,1";
                    $stmt = mysqli_query($ConnectingDB, $sql);



                    while ($DataRows = mysqli_fetch_assoc($stmt)) {
                        $PostId = mysqli_real_escape_string($ConnectingDB, $DataRows["id"]);
                        $Date = mysqli_real_escape_string($ConnectingDB, $DataRows["date"]);
                        $PostTitle = mysqli_real_escape_string($ConnectingDB, $DataRows["head"]);
                        $Admin = mysqli_real_escape_string($ConnectingDB, $DataRows["author"]);
                        $Image = mysqli_real_escape_string($ConnectingDB, $DataRows["image"]);
                        $PostDesc = mysqli_real_escape_string($ConnectingDB, $DataRows["body"]);

                    ?>

                        <div class="card">
                            <img class="img-fluid card-img-top" src="image/<?php echo htmlentities($Image); ?>" />
                            <div class="card-body">
                                <h4 class="card-title" style="color: #222930;"> <?php echo htmlentities($PostTitle); ?></h4>

                                <small style="color: #222930;"> Posted by: <?php echo htmlentities($Admin); ?>,</a>
                                    <!-- fix circle profile -->

                                    i <?php echo htmlentities($Date); ?></small>
                                <hr>
                                <p class="card-text " style="color: #222930;">
                                    <?php if (strlen($PostDesc) > 130) {
                                        $PostDesc = substr($PostDesc, 0, 130) . '...';
                                    }
                                    echo nl2br($PostDesc); ?></p>

                                <a href="fullpost.php?id=<?php echo htmlentities($PostId); ?>" style="float:right;">
                                    <span id="but" class="btn btn-info" style="color: #222930;">Read More</span>
                                </a>
                            </div>
                        </div>
                        <br> <!-- For å få litt luft mellom hver post-->
                    <?php } ?>
                    <!-- pagination -->

                </div>
                <!--Side area-->
                <div class=" col-sm-4">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h2 class="lead"> Nylige innlegg</h2>
                        </div>
                        <div class="card-body" style="background-color: #222930;">
                            <?php
                            global $ConnectingDB;
                            $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
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

            </div>

        </div>
    </div>

    <!-- Gallery -->
    <div id="timeliste" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="profil">Timeliste</h2>
                    <div class="col-md-4 "></div>
                    <div id="curve_chart" style="width: 100%; height: 35rem"></div>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Sprint', 'Adi', 'Rahmat', 'Jens', 'Daniel', 'Kristian', 'Kirisan'],
                                <?php
                                global $ConnectingDB;
                                $sql = "SELECT * FROM gruppe";
                                $stmt = mysqli_query($ConnectingDB, $sql);
                                while ($datarows = mysqli_fetch_assoc($stmt)) {
                                    echo "['" . $datarows['sprint'] . "'," . $datarows['adi'] . "," . $datarows['rahmat'] . "," . $datarows['jens'] . "," . $datarows['daniel'] . "," . $datarows['kristian'] . "," . $datarows['kirisan'] .  "],";
                                }
                                ?>
                            ]);

                            var options = {

                                curveType: 'function',
                                legend: {
                                    position: 'bottom'
                                }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, options);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------- -->
    <div id="contact" class="contactSection section">
        <div class="col-md-12 text-center">
            <p class="subhaed">Liker det du ser? </p>
            <h2>Vi vil gjerne høre fra deg!</h2>
            <a href="mailTo:rahmat@mozafari.no" class="contactB">TA KONTAKT!</a>







        </div>

    </div>
    </h2>




    <!--Contact Section-->
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4030.4459053417786!2d9.6394674698984!3d59.66257958951059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4640da88aa425fa7%3A0xafcd9b648f739fc6!2sUniversitetet%20i%20S%C3%B8r%C3%B8st-Norge%2C%20Kongsberg!5e0!3m2!1sno!2sno!4v1577921331704!5m2!1sno!2sno" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <div class="clear"></div>
    <!--Footer Section-->

    <div class="copyrightSection">
        <div class="col-md-12 text-center">
            <p class="lead text-center"> Created by | Bachelor Group 5 | &copy;<span id="year"></span> | All right reserved
                <!-- <a href="https://www.youtube.com/channel/UCow-m8KxH7G0MiePPQeREBw"><i class="fab fa-youtube" style="color:red;"></i></a>-->
                <a href="https://www.linkedin.com/in/rahmat-mozafari"><i class="fab fa-linkedin" style="color:cornflowerblue; "></i></a>
                <a href="https://github.com/Mozafari1"><i class="fab fa-github" style="color:grey;"></i></a>

            </p>
        </div>
    </div>

    <script>
        $('#year').text(new Date().getFullYear());
    </script>

    <script src="typed.min.js"></script>
    <script src="script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>



</html>
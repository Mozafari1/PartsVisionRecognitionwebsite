<?php
include "include/DB.php";
include "include/functions.php";
global $ConnectingDB;
$sql = "SELECT * FROM gantt ORDER BY id asc";
$stmt = mysqli_query($ConnectingDB, $sql);
while ($data = mysqli_fetch_assoc($stmt)) {
    $id = mysqli_real_escape_string($ConnectingDB, $data['id']);
    $name = mysqli_real_escape_string($ConnectingDB, $data['navn']);
    $sprint = mysqli_real_escape_string($ConnectingDB, $data['sprint']);
?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Ibarra+Real+Nova|Pinyon+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
    <link rel="manifest" href="/site.webmanifest">
    <div class="container">
        <table class="table table-striped table-hover">

            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Navn</th>
                    <th>Sprint</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <a href="ganttupdt.php?="><?php echo htmlentities($id); ?></a>
                    </td>
                    <td><a href="ganttupdt.php?="></a><?php echo htmlentities($name); ?>
                    </td>
                    <td><a href="ganttupdt.php?="></a><?php echo htmlentities($sprint); ?></td>
                </tr>
            </tbody>
        </table>
    </div> <?php } ?>
<?php
include "include/session.php";
include "include/functions.php";
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Gallery -->

<div id="curve_chart" style="width: 100%; height: 35rem"></div>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Sprint', 'Adi', 'Rahmat', 'Jens', 'Daneil', 'Kristian', 'Kirisan'],
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
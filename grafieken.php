<?php
$cilinder = array();
$nummers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
$aantallen = array(1058055,488083,2108733,7586963,210808,546279,133881,1970,7454);
$nummers2 = array(1,2,3,4,5,6,7,8,9,17,20,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,48,50,51,52,53,55,57,58,59,61,63,64,91);
$aantallen2= array(127636,1782296,470482,1708148,6783314,106034,291832,10696,38545,134,195,192,194,152,229,200,286,122,268,172,148,370,238,724,353,356,780,183,294,281,221,353,212,146,368,200,132,138,179,275,128,111);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Uitgebreide Informatie</title>
</head>
<body>




<div>
<h3 id= "tekst1">Aantal Cilinders</h3>
</div>
<div>
<h3 id= "tekst2">Aantal Zitplaatsen</h3>
</div>

<div id= "Grafiek1">
        <canvas id="mijnGrafiek"></canvas>
    </div>

    <div id= "Grafiek2">
        <canvas id="mijnTweedeGrafiek"></canvas>
    </div>

    <script type="text/javascript">
    var nummers = <?php echo json_encode($nummers) ?>;
    var aantallen = <?php echo json_encode($aantallen) ?>;
    var nummer2 = <?php echo json_encode($nummers2) ?>;
    var aantallen2 = <?php echo json_encode($aantallen2) ?>;

    const data = {
        labels: nummers,
        datasets: [{
            label: 'Woonplaatsen in deze klas',
            data: aantallen,
            backgroundColor: [
            'red',
            'yellow',
            'green',
            'blue',
            'orange',
            'purple',
            'darkgreen',
            'darkblue',
            'darkred',
            'grey',
            'lightgreen',
            'lightblue',
            'lightorange',
            'lightpurple'

            ],
            hoverOffset: 10
        }]
    };

    const labelsTwee = nummers;
    const dataTwee = {
        labels: nummer2,
        datasets: [{
            label: 'Woonplaatsen van de klas',
            data: aantallen2,
            backgroundColor: [
            'red',
            'yellow',
            'green',
            'blue',
            'orange',
            'purple',
            'darkgreen',
            'darkblue',
            'darkred',
            'grey',
            'lightgreen',
            'lightblue',
            'lightorange',
            'lightpurple'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)'
            ],
            borderWidth: 1
        }]
    };


    const config = {
        type: 'doughnut',
        data: data,
    };

    // Tweede grafiek config
    const configTwee = {
        type: 'doughnut',
        data: dataTwee,
        
    };


    // En de code om de grafiek te laten tekenen:
    window.addEventListener('load', function() {
        var myChart = new Chart(
            document.getElementById('mijnGrafiek'),
            config
        );

        var myChartTwee = new Chart(
            document.getElementById('mijnTweedeGrafiek'),
            configTwee
        );
    });
    </script>

        <?php include("grafiek.php"); ?>
    </div>
</div>




<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>
<div class="grafiek"></div>





</body>
</html>
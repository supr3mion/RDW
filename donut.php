<?php

$cilinders = $_GET['CILINDER1'];
$cilinders_auto = $_GET['CILINDER2'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <canvas id="mijnGrafiek"></canvas>
    </div>

    <script type="text/javascript">

    // Eerst de PHP data opslaaj in JS variabelen
    var cilinders = <?php echo json_encode($cilinders) ?>;
    var aantallen = <?php echo json_encode($cilinders_auto) ?>;

    // Dan de setup code met onze eigen data
    const data = {
        labels: cilinders, // hier de variabele ipv. een lijstje
        datasets: [{
            label: 'autos met cilinders',
            data: aantallen, // hier de variabele ipv. een lijstje
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
            hoverOffset: 4
        }]
    };

    // De config code
    const config = {
        type: 'doughnut',
        data: data,
    };

    // En de code om de grafiek te laten tekenen:
    window.addEventListener('load', function() {
        var myChart = new Chart(
            document.getElementById('mijnGrafiek'),
            config
        );
    });
    </script>

</body>

</html>
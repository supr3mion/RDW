<?php

$startUrl = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?$';
$zoekCilinders = 'select=distinct(aantal_cilinders)';

$zoekCilindersAantal = 'select=count(kenteken)&$where=aantal_cilinders=';


$json = file_get_contents($startUrl.$zoekCilinders);

//hello there

$json_data = json_decode($json);
$data = $json_data[0];


$cilinders = array();
$cilinders_auto = array();


foreach( $json_data as $data )
{
    $data_cilinder = $data->aantal_cilinders_1;

    $ZCK = $zoekCilindersAantal . strval($data_cilinder);

    $json_cilinders = file_get_contents($startUrl.$ZCK);

    $json_data_cilinder = json_decode($json_cilinders);
    $data_cilinder_auto = $json_data_cilinder[0];

    $cilinder_kentekens = $data_cilinder_auto->count_kenteken;

    echo '<p>cilinders = ' . $data_cilinder . "<br>aantal autos met zoveel cilinders = " . $cilinder_kentekens . '</p>';

    array_push($cilinders, $data_cilinder);
    array_push($cilinders_auto, $cilinder_kentekens);

    echo json_encode($cilinders);
    echo json_encode($cilinders_auto);

};

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
                'blue'
                'orange',
                'purple',
                'darkgreen',
                'darkblue'
                'darkred',
                'grey',
                'lightgreen',
                'lightblue'
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
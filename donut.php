<?php

$json = file_get_contents('https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=RX831R');

$json_data = json_decode( $json );
$data = $json_data[0];
//echo '<pre>' . print_r( $data, TRUE) . '</pre>';
//foreach( $json_data as $data )
//{
    echo 'Merk  en Model  = ' . $data->merk . ' ' . $data->handelsbenaming . '</p>';
    echo '<p>Kenteken = ' . $data->kenteken . '<br />';
    echo 'Cylinderinhoud = ' . $data->cilinderinhoud . '</p>';
//}









$clinders = array('1', '2', '4', 'Overig');
$aantallen = array(5, 2, 2, 9);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include('nav.php'); ?>
    

    <div>
        <canvas id="mijnGrafiek"></canvas>
    </div>

    <script type="text/javascript">
    // Eerst de PHP data opslaaj in JS variabelen
    var clinders = <?php echo json_encode($clinders) ?>;
    var aantallen = <?php echo json_encode($aantallen) ?>;

    // Dan de setup code met onze eigen data
    const data = {
        labels: woonplaatsen, // hier de variabele ipv. een lijstje
        datasets: [{
            label: 'Woonplaatsen in deze klas',
            data: aantallen, // hier de variabele ipv. een lijstje
            backgroundColor: [
                'red',
                'yellow',
                'green',
                'blue'

            ],
            hoverOffset: 10
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
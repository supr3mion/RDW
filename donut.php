<?php
$woonplaatsen = array('Sneek', 'Bolsward', 'Sint Nicolaasga', 'Overig');
$aantallen = array(5, 2, 2, 9);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stap 3: Een grafiek met eigen data</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include('nav.php'); ?>
    <h1>Stap 3 - de oplossing: Een grafiek met eigen data</h1>
    <p>Opdracht: in de code, bovenaan, staan in de php twee variabelen:
    <ul>
        <li>Woonplaatsen: de verschillende woonplaatsen van jullie klas</li>
        <li>Aantallen: het aantal studenten per woonplaats</li>
    </ul>
    Aan jou de opdracht om hier een grafiek van te maken
    (een doughnut, of als je dat durft, een Bar Chart)
    </p>

    <div>
        <canvas id="mijnGrafiek"></canvas>
    </div>

    <script type="text/javascript">
    // Eerst de PHP data opslaaj in JS variabelen
    var woonplaatsen = <?php echo json_encode($woonplaatsen) ?>;
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
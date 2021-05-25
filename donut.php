

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

    <?php include("cilinder.php"); ?>

    var cilinders = <?php echo json_encode($cilinders) ?>;
    var aantallen = <?php echo json_encode($cilinders_auto) ?>;


    const data = {
        labels: cilinders,
        datasets: [{
            label: 'autos met cilinders',
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
            hoverOffset: 4
        }]
    };
    const config = {
        type: 'doughnut',
        data: data,
    };
    window.addEventListener('load', function() {
        var myChart = new Chart(
            document.getElementById('mijnGrafiek'),
            config
        );
    });
    
    </script>

</body>

</html>
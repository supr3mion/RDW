<?php
$eigenschappen = array('wel', 'niet',);
$aantallen = array(3, 3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>grafiek</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   
    <div>
        <canvas id="mijnGrafiek"></canvas>
    </div>

    <script type="text/javascript">
   
    var woonplaatsen = <?php echo json_encode($eigenschappen) ?>;
    var aantallen = <?php echo json_encode($aantallen) ?>;

    
    const data = {
        labels: woonplaatsen, 
        datasets: [{
            label: 'eigenschap',
            data: aantallen, 
            backgroundColor: [
                'green',
                'red'

            ],
            hoverOffset: 10
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
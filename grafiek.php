<?php
$woonplaatsen = array('wel', 'niet',);
$aantallen = array(3, 3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>grafiek</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
   
    <div>
        <canvas id="mijnGrafiek"></canvas>
    </div>

    <script type="text/javascript">
   
    var woonplaatsen = <?php echo json_encode($woonplaatsen) ?>;
    var aantallen = <?php echo json_encode($aantallen) ?>;

    
    const data = {
        labels: woonplaatsen, 
        datasets: [{
            label: 'wel of niet deze eigenschap',
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


<!DOCTYPE html>
<html lang="en">


<script type="text/javascript">

    
var cilinders = <?php echo json_encode($cilinders) ?>;
var aantallen = <?php echo $cilinders_auto ?>;


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

</html>
<?php

if(isset($_POST['submit'])) {
    $kentekenPlaat = $_POST['kenteken'];
    $startUrl = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?';
    $zoekKenteken = 'kenteken='.$kentekenPlaat;

    $json = file_get_contents($startUrl.$zoekKenteken);

    $json_data = json_decode($json);
    $data = $json_data[0];

    foreach ($json_data as $data) {
        echo '<p>Merk en Model = ' . $data->merk . ' ' . $data->handelsbenaming . '</p>';
        echo '<p>Kenteken = ' . $data->kenteken . '<br />';
        echo 'Cylinderinhoud = ' . $data->cilinderinhoud . '<br />';
        echo 'Inrichting = ' . $data->inrichting . '<br />';
        echo 'Aantal cilinders = ' . $data->aantal_cilinders . '<br />';
    }
} else {
    echo 'er is geen kenteken opgegeven';
}

?>
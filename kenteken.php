<?php

if(isset($_POST['submit'])) {
    $kentekenPlaat = strtoupper($_POST['kenteken']);
    $startUrl = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?';
    $zoekKenteken = 'kenteken='.$kentekenPlaat;

    $json = file_get_contents($startUrl.$zoekKenteken);

    $json_data = json_decode($json);
    $data = $json_data[0];

    foreach ($json_data as $data) {
        $_SESSION['kenteken'] = $data->kenteken;
        $_SESSION['voertuigsoort'] = $data->voertuigsoort;
        $_SESSION['handelsbenaming'] = $data->handelsbenaming;
        $_SESSION['inrichting'] = $data->inrichting;
        $_SESSION['aantal_zitplaatsen'] = $data->aantal_zitplaatsen;
        $_SESSION['eerste_kleur'] = $data->eerste_kleur;
        $_SESSION['tweede_kleur'] = $data->tweede_kleur;
        $_SESSION['aantal_cilinders'] = $data->aantal_cilinders;
        $_SESSION['cilinderinhoud'] = $data->cilinderinhoud;
        $_SESSION['toegestane_maximum_massa_voertuig'] = $data->toegestane_maximum_massa_voertuig;
        $_SESSION['maximum_massa_trekken_ongeremd'] = $data->maximum_massa_trekken_ongeremd;
        $_SESSION['maximum_trekken_massa_geremd'] = $data->maximum_trekken_massa_geremd;
        $_SESSION['zuinigheidslabel'] = $data->zuinigheidslabel;
        $_SESSION['wam_verzekerd'] = $data->wam_verzekerd;
        $_SESSION['aantal_deuren'] = $data->aantal_deuren;
        $_SESSION['aantal_wielen'] = $data->aantal_wielen;
        $_SESSION['europese_voertuigcategorie'] = $data->europese_voertuigcategorie;
        $_SESSION['massa_ledig_voertuig'] = $data->massa_ledig_voertuig;

    }

    header('location: info.php');
    
} else {
    echo 'er is geen kenteken opgegeven';
}

?>
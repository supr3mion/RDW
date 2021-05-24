<?php

    $kentekenPlaat = strtoupper($_POST['kenteken']);
    if(empty($kentekenPlaat)){
        header('location = index.php');
    } else {

    $startUrl = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?';
    $zoekKenteken = 'kenteken='.$kentekenPlaat;

    $json = file_get_contents($startUrl.$zoekKenteken);

    $json_data = json_decode($json);
    $data = $json_data[0];

    foreach ($json_data as $data) {
        $kenteken = $data->kenteken;
    }
    }

    $data_type = array('merk', 'handelsbenaming', 'voertuigsoort', 'inrichting', 'aantal_zitplaatsen', 'eerste_kleur', 'tweede_kleur' ,
    'aantal_cilinders' ,'cilinderinhoud' ,'toegestane_maximum_massa_voertuig', 'maximum_massa_trekken_ongeremd', 'maximum_trekken_massa_geremd', 
    'wam_verzekerd', 'aantal_deuren', 'aantal_wielen', 'europese_voertuigcategorie', 'massa_ledig_voertuig'); //16
    $data_info = array('merk: ', 'type: ',  'voertuigsoort: ', 'inrichting: ', 'aantal zitplaatsen: ', 'eerste kleur: ', 'tweede kleur: ' ,
    'aantal cilinders:' ,'cilinderinhoud: ' ,'toegelate maximum massa voertuig: ', 'maximum gewicht trekken ongeremd: ', 'maximum gewicht trekken geremd: ', 
    'wam verzekerd: ', 'aantal deuren: ', 'aantal wielen: ', 'europese voertuigcategorie: ', 'totaal gewicht voertuig: ');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Informatie Auto: <?php echo $kenteken; ?></title>
</head>
<body>
    <div id="basis_info">
        <div id="general_info"><?php echo $kenteken; ?></div>
        <div id="other_info">
        <?php 
        $number = 0;
        for ($i = 0; $i<17; $i++) { 

            $type = $data_type[$number];
        ?>
            <p><?php echo $data_info[$number]; ?></p>
            <p><?php echo $data->$type; ?></p>
            
            <?php $number++; ?>
            

        <?php
        }
        ?>
        </div>
    </div>
    <form id="grafieken" action="grafieken.php" method="POST">
		<div> 
			<button type="submit" id="button_grafieken" name="submit">Informatie Ophalen!</button> 
		</div>
	</form> 
</body>
</html>
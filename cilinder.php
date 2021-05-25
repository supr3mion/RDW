<?php

$startUrl = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?$';
$zoekCilinders = 'select=distinct(aantal_zitplaatsen)';

$zoekCilindersAantal = 'select=count(kenteken)&$where=aantal_zitplaatsen=';


$json = file_get_contents($startUrl.$zoekCilinders);

//hello there

$json_data = json_decode($json);
$data = $json_data[0];


$cilinders = array();
$cilinders_auto = array();
$check = 0;


foreach( $json_data as $data )
{
    if($data != "") {

    $data_cilinder = $data->aantal_zitplaatsen_1;

    $ZCK = $zoekCilindersAantal . strval($data_cilinder);

    $json_cilinders = file_get_contents($startUrl.$ZCK);

    $json_data_cilinder = json_decode($json_cilinders);
    $data_cilinder_auto = $json_data_cilinder[0];

    $cilinder_kentekens = $data_cilinder_auto->count_kenteken;

    $cilinder_kenteken_int = intval($cilinder_kentekens);

    //echo '<p>cilinders = ' . $data_cilinder . "<br>aantal autos met zoveel cilinders = " . $cilinder_kentekens . '</p>';

    if($data_cilinder != "") {
        if($cilinder_kenteken_int > 100) {
            array_push($cilinders, $data_cilinder);
            array_push($cilinders_auto, $cilinder_kenteken_int);
            $check++;
        }
    } else {

    }
    }
    
};

echo json_encode($cilinders);
echo json_encode($cilinders_auto);


//$HTTP = array('CILINDER1' => $cilinders, 'CILINDER2' => $cilinders_auto);

//header('location: grafieken.php?' . http_build_query($HTTP));

?>
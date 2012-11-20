<?php
$rif = $_GET['p_rif'];    
    $url="http://contribuyente.seniat.gob.ve/BuscaRif/BuscaRif.jsp?p_rif=$rif";
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // almacene en una variable
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $xxx1 = curl_exec($ch);
    curl_close($ch);

    $xxx = explode("\n\r\n", $xxx1);   

    $a = ereg_replace("_", "", $xxx[6]);
    $a = ereg_replace("(J([0-9]{9}))", "", $a);
    $a = ereg_replace('"', "", $a);

    print_r($a);
?>

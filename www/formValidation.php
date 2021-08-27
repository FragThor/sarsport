<?php

// Recup datas
$data=$_POST;
$name = $data["inputName"];
$email = $data["inputEmail"];
$message = $data["inputMessage"];
$dataCsvHeader = [];
$dataCsv = [];

foreach($data as $key=>$val){
    $dataCsvHeader[] = $key;
    $dataCsvContent[] = $val;
    //$text = 'je suis la clé '.$key.' et moi la valeur '.$val.'<br/>';
    //echo $text;
}
$dataCsv[0] = $dataCsvHeader;
$dataCsv[1] = $dataCsvContent;


// Export CSV
$fp = fopen('file.csv', 'w');

foreach ($dataCsv as $fields) {
    fputcsv($fp, $fields, ";");
}

fclose($fp);

echo "<script>
alert('Votre message a bien été envoyé');
window.location.href='/';
</script>";


//echo $data["inputName"];
//$name=$data["inputName"];
//echo $name;
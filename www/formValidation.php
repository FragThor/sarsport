<?php
/**ABandonnez tout espoir */


// Recup datas
$data=$_POST;
if (isset($data["inputName"]) && isset($data["inputEmail"]) && isset($data["inputMessage"])) {
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
}



if (isset($data["exampleFormControlInput1"]) && isset($data["inputPassword5"])) {
    $name = $data["exampleFormControlInput1"];
    $pass = $data["inputPassword5"];
    $error = "";
    $isConnect = false;
    if (($handle = fopen("users.csv", "r")) !== FALSE) {
        while (($array = fgetcsv($handle, 1000, ";")) !== FALSE) {
    
            if ($array[0] == $name && $array[1] == $pass){
                $isConnect = true;
            }
        }
        fclose($handle);
        if ($isConnect == true) {
            session_start();
            $_SESSION["logged"] = "yes";
            var_dump($_SESSION);
            echo "<script>
            alert('yey!');
            window.location.href='/';
            </script>";
        } else {
            $error = "Mauvais login / mot de passe";
        }
    } else {
        $error = "Le fichier users.csv n'existe pas";
    }

    if ($error !== "") {
        echo "<script>
            alert('" . $error . "');
            window.location.href='/';
            </script>";
    }

}



//echo $data["inputName"];
//$name=$data["inputName"];
//echo $name;
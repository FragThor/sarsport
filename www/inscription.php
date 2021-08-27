<?php

if(isset($_POST['email']) && isset($_POST['password'])){
 
    //collecte de données
    $signName=$_POST['email'];
    $signPass = md5($_POST['password']);
 
    //validation du 
    $signName = trim ($_POST["email"]);
    if (!preg_match("/^[a-z][_a-z0-9-]+(.[_a-z0-9-]+)@([a-z0-9-]{2,})+(.[a-z0-9-]{2,})$/",$signName)){

        echo "<script>
        alert('Please try again !');
        window.location.href='/';
        </script>";

    } else {
        echo "<script>
        alert('Merci pour votre inscription');
        window.location.href='/';
        </script>";

        //defintion csv

        $list = [$signName, $signPass];

        $fp = fopen('users.csv','a');

        fputcsv($fp, $list, ";");

        fclose($fp);
        $inscription.= " " .$signName. " Merci pour votre réponse !";
        die('test');
    }
}

    /*
    $data = array(
      array(NOM, PASSWORD),
      array('email','password'),
    );



    if ($f = @fopen('users.csv', 'w')) {
      foreach ($data as $ligne) {
        fputcsv($fp, $ligne);
        }
      fclose($fp);
      }
    else {
      echo "Impossible d'executer le fichier.";
      }
    ?>


      */

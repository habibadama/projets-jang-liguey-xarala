<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ma_base_utilisateurs";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }
?>

<?php
include('connexion.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $motDePass = $_POST['motDePass'];
    $motDePassRetype = $_POST['motDePassRetype'];

    if ($motDePass !== $motDePassRetype) {
        echo "<script> alert('Les mots de passe ne correspondent pas.')</script>";
    } else {
    
        $query = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<script> alert('Ce login est déjà utilisé.')</script>";
        } else {
            $insertQuery = "INSERT INTO utilisateurs (nom, prenom, login, motDePass, motDePassRetype) VALUES ('$nom', '$prenom', '$login', '$motDePass', '$motDePassRetype')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<script> alert('Utilisateur inscrit avec succès.')</script>";
            } else {
                echo "<script> alert('Erreur lors de l'inscription : ')</script>" . $conn->error;
            }
        }
    }
}
?>












<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Authentification en PHP</title>
  </head>
  <body>
    <form action="#" method="post">
        <h2>Inscription</h2>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prennom">
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login">
        </div>
        <div class="mb-3">
            <label for="motDePass" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="motDePass" id="motDePass">
        </div>
        <div class="mb-3">
            <label for="motDePassRetype" class="form-label">Confirmation de mot de passe</label>
            <input type="password" class="form-control" name="motDePassRetype" id="motDePassRetype">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
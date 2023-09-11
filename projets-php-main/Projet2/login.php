<?php
  session_start();
  include('connexion.php'); 

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $login = $_POST['login'];
      $motDePass = $_POST['motDePass'];

      $query = "SELECT * FROM utilisateurs WHERE login = '$login' AND motDePass = '$motDePass'";
      $result = $conn->query($query);

      if ($result->num_rows === 1) {
          $_SESSION['login'] = $login; 
          header("Location: session.php");
      } else {
          echo "<script> alert('Identifiants invalides.')</script>";
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

    <title>Login</title>
  </head>
  <body>
    <form action="#" method="post">
        <h2>Login</h2>
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login">
        </div>
        <div class="mb-3">
            <label for="motDePass" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="motDePass" id="motDePass">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
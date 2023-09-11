<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Restreinte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="p-5">
    <h2>Bienvenue dans la session restreinte, <strong><?php echo $_SESSION['login']; ?>!</strong></h2>
    <p>Contenu de la page accessible uniquement aux utilisateurs authentifiés.</p>
    <a href="deconnexion.php" class="btn btn-primary">Se déconnecter</a>
</body>
</html>

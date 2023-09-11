<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion_stock_produits";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomProduit = $_POST["nomProduit"];
    $quantitePrise = $_POST["quantitePrise"];

    $sql = "UPDATE produits SET quantiteProduit = quantiteProduit - $quantitePrise WHERE nomProduit = '$nomProduit'";

    if ($conn->query($sql) === TRUE) {
        echo "Produit pris du stock avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

?>








<!DOCTYPE html>
<html>

<head>
    <title>Enregistrement des Produits Pris du Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="container">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
       <h2 class="text-center my-4">Enregistrement des Produits Pris du Stock</h2>
       <div class="mb-3">
            <label class="form-label">Nom du produit:</label>
            <input class="form-control" type="text" name="nomProduit">
       </div>
        <div class="mb-3">
            <label class="form-label">Quantité prise:</label>
            <input class="form-control" type="number" name="quantitePrise">
        </div>
        <input type="submit" class="btn btn-primary" value="Enregistrer">
        <div class="arrow">
            <div>
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div><a href="index3.php"><i class="fa-solid fa-arrow-right"></i></a></div>
        </div>
    </form>
</body>

</html>
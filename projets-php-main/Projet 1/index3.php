<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
   <div class="content">
   <h2 class=" my-4">Produits disponibles en stock :</h2>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gestion_stock_produits";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }

        $sql = "SELECT nomProduit, quantiteProduit FROM produits";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li class='mb-2 lead'>Nom du produit : " . $row["nomProduit"] . "</br>" ." Quantité disponible : " . $row["quantiteProduit"] . "</li>";

            }
            echo "</ul>";
        } else {
            echo "Aucun produit disponible en stock.";
        }
        $conn->close();
    ?>
         <div class="arrow">
            <div><a href="index2.php"><i class="fa-solid fa-arrow-left"></i></a></div>
        </div>
   </div>
</body>
</html>
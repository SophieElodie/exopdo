<?php

$pdo = new PDO('mysql:dbname=colyseum;host=localhost;charset=utf8','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$statement = $pdo->query('SELECT * FROM clients LIMIT 20');
$resultat = $statement->fetchAll();

$statement2= $pdo->query("SELECT showTypes.type , genres.genre AS FirstGenres , secGenres.genre AS secGenres
                          FROM showTypes , genres , genres AS secGenres
                          WHERE showTypes.id = genres.showTypesId AND showTypes.id = secGenres.showTypesId
                          ORDER BY genres.id");
$resultat2 = $statement2->fetchAll();



?>
<!DOCTYPE html>
<html>
<head>
    <title>exo pdo</title>
<meta charset="utf-8">
    

</head>
<body>

    <h2>Exo 1</h2>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>prénom</th>
                <th>date de naissance</th>
                <th>card</th>
                <th>numéro de carte</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($resultat as $value) : ?>
            <tr>
                <td><?= $value->id; ?></td>
                <td><?= $value->lastName; ?></td>
                <td><?= $value->firstName; ?></td>
                <td><?= $value->birthDate; ?></td>
                <td><?= $value->card; ?></td>
                <td><?= $value->cardNumber; ?></td>
            </tr>

        <?php endforeach ?>
            
        </tbody>


    </table>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Genre 1</th>
                <th>Genre 2</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($resultat2 as $value) : ?>
            <tr>
                <td><?= $value->type; ?></td>
                <td><?= $value->FirstGenres; ?></td>
                <td><?= $value->secGenres; ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

?>








</body>
</html>
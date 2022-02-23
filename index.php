<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

$server = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'bdd_cours';



// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.
try {
    $dbb = new PDO("mysql:host=$server;dbname=$dbName;charset=utf8", $user, $pass);
    $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbb->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "<p>" . "1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor'" . "</p>";
    // TODO votre code ici.

    $stmt = $dbb->prepare("SELECT * FROM user WHERE nom='Conor'");
    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) {
            echo "<div>" . "Utilisateur : " . $user['nom'] . "</div>";
        }
    }
    echo "<hr><br>";

    echo "<p>" . "2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John'" . "</p>";
    // TODO Votre code ici.
    $stmt = $dbb->prepare("SELECT * FROM user WHERE prenom != 'John'");
    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $fname) {
            echo "<div>" . "Utilisateur : " . $fname['prenom'] . "</div>";

        }
        echo "<hr><br>";

        echo "<p>" . "3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE id <= 2");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . $id['id'] . "</div>";
            }
        }
        echo "<hr><br>";

        echo "<p>" . "4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE id >= 2");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . $id['id'] . "</div>";
            }
        }
        echo "<hr><br>";

        echo "<p>" . "5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE id = 1");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . $id['id'] . "</div>";
            }
        }
        echo "<hr><br>";

        echo "<p>" . "6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe'" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE id = 1 AND nom='Doe'");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur :" . "<br>" .
                    "ID :" . $id['id'] . "</br>" .
                    " name : " . $id['nom'] . "</div>";
            }
        }
        echo "<hr><br>";

        echo "<p>" . "7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE nom='Doe' AND prenom='John'");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur :" . "<br>" .
                    "ID :" . $id['id'] . "</br>" .
                    " firstname : " . $id['prenon'] . "</div>";
            }
        }
        echo "<hr><br>";
        echo "<p>" . "8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane'" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE nom='Conor' OR prenom='Jane'");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
        echo "<hr><br>";

        echo "<p>" . "9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user LIMIT 2");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
        echo "<hr><br>";
        echo "<p>" . "10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user LIMIT 2");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
        echo "<hr><br>";
        echo "<p>" . "11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE nom LIKE 'C___r'");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
        echo "<hr><br>";
        echo "<p>" . "12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e'" . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE nom LIKE '%e%'");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
        echo "<hr><br>";
        echo "<p>" . "13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR ''" . "<p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE prenom IN ('John', 'Sarah')");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
        echo "<hr><br>";
        echo "<p>" . "14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4." . "</p>";
        // TODO Votre code ici.
        $stmt = $dbb->prepare("SELECT * FROM user WHERE id BETWEEN 2 AND 4");
        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $id) {
                echo "<div>" . "Utilisateur : " . "<br>" .
                    "name :" . $id['nom'] . "<br>" .
                    "Firstname : " . $id['prenom'] . "</div>";
            }
        }
    }
}
catch (PDOException $e){
    echo $e->getMessage() ;
}
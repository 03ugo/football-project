<!-- 
____ ___              
|    |   \____   ____  
|    |   / ___\ /  _ \ 
|    |  / /_/  >  <_> |
|______/\___  / \____/ 
       /_____/          
--> 

<!-- 
    Projet : Infos Football
Version : Bêta 1.0
Auteur : Ugo 
Date : 17/12/2021 
-->

<!DOCTYPE html>
<html lang="en">

<?php

// Insertion du head
require_once './structure/head.php';

/*  Base de données*/
// Nom du serveur contenant la bdd
$servername = 'localhost';
// username de phpmyadmin
$username = 'root';
// password de phpmyadmin
$password = '';

// Connexion (essai)
try {
    $connexionToPDO = new PDO("mysql:host=$servername;dbname=football", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $connexionToPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Si tout est bon
    echo "Connexion réussie";
}

/*
On capture les exceptions si une exception est lancée et on affiche
les informations relatives à celle-ci
*/ 
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Récupération des données du formulaire
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$submitForm = filter_input(INPUT_POST, 'submitForm', FILTER_SANITIZE_STRING);

// Est-ce que le formulaire est valide ?
$formValid = false;

// Messages d'erreur
$messageErrorEmail = "";
$messageErrorPassword = "";

// Validation du formulaire
if ($submitForm == "formSend") {
    if ($email && (strlen($password) > 5 && strlen($password) < 15)) {
        $formValid = true;
    }
    if (!$email) {
        $messageErrorEmail = "Veuillez rentrer un email valide";
        $formValid = false;
    }
    if (!(strlen($password) > 5 && strlen($password) < 15)) {
        $messageErrorPassword = "Veuillez rentrer un mot de passe entre 6 et 14 caractères";
        $formValid = false;
    }
}

// Formulaire valide
if ($formValid) {
    // Insertion des données dans la BDD
    $query = "INSERT INTO utilisateurs(password, email)  
              VALUES(:password, :email)";
    $statement= $connexionToPDO->prepare($query);
    $statement->execute([
        ':password' => $password,
        ':email' => $email
    ]);
}


?>

<body>
    <!-- Formulaire de création de compte Bootstrap -->
    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control password" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submitForm" value="formSend">Submit</button>
    </form>
</body>

</html>
<?php
//Variable de connection
$user = "root"; // Utilisateur de la BDD
$mdp = ""; //Mot de passe de l'utilisateur
$host = "localhost";
$dbName = "blog";

//Connection a la BDD
// on essay de s'y connecter
try {
    //on instancie une nouvelle connexion (PDO) a la bdd
    $db_blog = new PDO('mysql:host='.$host.";dbname=".$dbName, $user, $mdp);
} catch (PDOException $e) {
    // Si il y a une erreur PHP ( Execption) Levée par PDO (PDOEception) on l'affiche et on arrête de script.
    $die('Erreur :' . $e->getMessage());
    Log::writeCSV($e);
}


require ('./classes/Autoload.php');
spl_autoload_register('Autoload::classesAutoloader');

if (isset($_POST['request'])) {
    var_dump($_POST);
    Users::inscription($db_blog);
}
if (isset($_SESSION)) {

}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <script src="master.js" charset="utf-8"></script>-->
<!--        <link rel="stylesheet" href="master.css">-->
        <title>bLOG</title>
    </head>
    <body>
        <form class="" method="post">
            <input type="text" name="pseudo" value="" placeholder="pseudo">
            <input type="mail" name="email" value="" placeholder="Email">
            <input type="text" name="password" value="" placeholder="Password">
            <input type="submit" name="request" value="Submit">
        </form>
        <?php if (isset($_SESSION)) { ?>
            <h2>Bonjour <?php echo ($_SESSION['user']['pseudo']); ?> !</h2>
        <?php } ?>
    </body>
</html>


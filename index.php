<?php
try {
 // Connexion à MongoDB Atlas
 $manager = new MongoDB\Driver\Manager('mongodb+srv://unes:unesunesunes@cluster0.cgocj.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
 // Définition de la requête
 $filter = [];
 $option = [];
 $read = new MongoDB\Driver\Query($filter, $option);
 //Exécution de la requête
 $cursor = $manager->executeQuery('db_php_forum.users', $read);
 echo "Connection à la base établie !";
 
}
catch ( MongoDB\Driver\Exception\Exception $e )
{
 echo "Probleme! : ".$e->getMessage();
 exit();
}
// Affichage du résultat
echo '<table><caption>Listes des utilisateurs</caption><tr><th>Nom</th><th>Prénom</th><th>Email</th></tr>';

foreach ($cursor as $user){
  echo '<tr><td>'.$user->nom.'</td><td>'.$user->prenom.'</td><td>'.$user->email.'</td><td></tr>';
}
 echo '</table>';

?>
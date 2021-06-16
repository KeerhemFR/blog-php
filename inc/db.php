<?php
try{
  $bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8",'root',"");
}catch(Exception $e){
  echo "Erreur: " . $e->getMessage();
}
 ?>

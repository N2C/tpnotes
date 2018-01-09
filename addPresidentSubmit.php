<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 09/01/2018
 * Time: 09:12
 */
$dbh = new PDO('mysql:host=localhost;dbname=app', "root", "");




foreach($_POST as $key=>$value){
    if(empty($_POST[$key])) die("$key has not been renseigned");
}


$query = $dbh->prepare("SELECT * FROM utilisateur WHERE password = :password AND login = :login");
$query->execute(array(
					':password' => md5($_POST["password"]),
					':login' => $_POST["login"],
	));
$users = $query->fetchAll();
if( count($users) !== 1) die("you have not been successfully authenticated, too bad !");

$query = $dbh->prepare("INSERT INTO president VALUES('', :nom, :prenom, :dateD, :dateF, :id_utilisateur, :id_parti)");
$query->execute(array(
    ":nom"=>$_POST["nom"],
    ":prenom"=>$_POST["prenom"],
    ":dateD"=>$_POST["dateD"],
    ":dateF"=>$_POST["dateF"],
    ":id_utilisateur" => $users[0]["id_utilisateur"],
    ":id_parti"=>$_POST["id_parti"],
));

echo "Le président a bien été ajouté, merci !";

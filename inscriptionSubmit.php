<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 09/01/2018
 * Time: 08:49
 */

$dbh = new PDO('mysql:host=localhost;dbname=app', "root", "");

foreach($_POST as $key=>$value){
    if(empty($_POST[$key])) die("$key has not been renseigned");
}

if(strlen($_POST["mdp"]) < 5) die("Password has to be greater than 5 characters");

if($_POST["mdp2"] !== $_POST["mdp"]) die("Passwords have to be the same");

if(!is_integer($_POST["age"])) die("age has to be an integer");

$query = $dbh->prepare("SELECT * FROM utilisateur WHERE login=:login");
$query->execute(array(':login'=>$_POST["login"]));

if(count($query->fetchAll()) !==0) die($_POST["login"]." already exists in DB as login");

$query = $dbh->prepare("INSERT INTO utilisateur VALUES('', :login, :password, :age)");
$query->execute(array(
    ":login" => $_POST["login"],
    ":password" => md5($_POST["password"]),
    ':age' => $_POST['age'],
));



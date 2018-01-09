<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 09/01/2018
 * Time: 09:12
 */
$dbh = new PDO('mysql:host=localhost;dbname=app', "root", "");
$query = $dbh->prepare("SELECT * FROM parti");
$query->execute();
$results = $query ->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="monCss.css" />
</head>
<body>

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
<form method="post" action="index.php">
    <label for="parti">parti :</label>
    <select id="parti" name="parti">
        <?php foreach($results as $parti){
            $parti = $parti["intitule"];
            echo("<option value=\"$parti\">$parti</option>");
} ?>

    </select>
    <input type="submit"/>
</form>

<?php if(!empty($_POST["parti"])){
    $query = $dbh->prepare("SELECT president.nom, president.prenom, president.dateD, president.dateF FROM parti, president WHERE parti.id_parti=president.id_parti AND parti.intitule = :partiName ORDER BY president.dateD");
    $query -> execute(array(':partiName' => $_POST["parti"]));
    $results = $query->fetchAll();
    ?>

    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date début</th>
            <th>Date fin</th>
        </tr>
        <?php
            foreach($results as $result){
                ?>
            <tr>
                <td><?=$result["president.prenom"]?></td>
                <td><?=$result["president.nom"]?></td>
                <td><?=$result["president.dateD"]?></td>
                <td><?=$result["president.dateF"]?></td>
            </tr>
        <?
            }
        ?>

    </table>

<?php
}?>

</body>
</html>


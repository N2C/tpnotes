<!DOCTYPE html>
<html>
<head>
    <title>Mon formulaire</title>
    <meta charset="utf-8">
</head>
<body>
<form method="post" action="affiche.php">
    <label for="nom">Votre nom :</label> <input id="nom" type="text" name="nom"><br>
    <label for="cars">La marque de votre voiture : </label>
    <select id="cars" name="cars">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="fiat">Fiat</option>
        <option value="audi">Audi</option>
    </select><br>
    <label for="km">Votre kilometrage : </label><input id="km" type="text" name="km"><br>
    <input type="submit" value="valider">
</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Mon formulaire</title>
    <meta charset="utf-8">
</head>
<body>
<?php $manquant = '<span style="color:red">manquant</span>' ?>
<p>Votre nom est : <?php echo isset($_POST["name"]) ? $_POST["name"] : $manquant ?></p>
<p>La marque de votre voiture est <?php echo isset($_POST["cars"]) ? $_POST["cars"] : $manquant ?></p>
<p>Votre kilometrage actuel est : <?php echo isset($_POST["km"]) ? $_POST["km"] : $manquant ?></p>
<p><?php echo (isset($_POST["km"]) AND $_POST["km"] > 200000) ? "Tu as bien roulé !" : ""?></p>
</body>
</html>
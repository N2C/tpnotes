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
$partis = $query->fetchAll();
?>

<html>
<head><link rel="stylesheet" type="text/css" href="https://educ.isep.fr/moodle/theme/standard/styles.php" />
<link rel="stylesheet" type="text/css" href="https://educ.isep.fr/moodle/theme/ingenuous/styles.php" />

	<meta charset="utf-8">
	<title>Ajout d'un président</title>

	</head>
	<body>
		<form method="post" action="addPresidentSubmit.php"><!-- Les valuers de method et action sont à compléter -->
			<fieldset>
				 <legend>Utilisateur</legend>
                <label for="pseudo">Login</label><input name="pseudo" id="pseudo" type="text" /><br />
              
                <label for="password">Password</label>
                <input type="password" name="password" id="password" /><br />
			</fieldset>
			<fieldset>
				<legend>Président</legend>
                    <label for="nom">Nom du président</label>
                    <input type="text" name="nom" id="nom" /><br />

                    <label for="prenom">Prénom du président</label>
                    <input type="text" name="prenom" id="name" /><br />

                    <label for"dateD">Date début mandat :</label>
                    <input type="date" name="dateD" id="dateD" /><br />

                    <label for"dateF">Date fin mandat :</label>
                    <input type="date" name="dateF" id="dateF" /><br />


				    <label for="id_parti">parti :</label>
    				<select id="id_parti" name="id_parti">
        				<?php foreach($partis as $parti){
           				 $parti = $parti["intitule"];
            			echo("<option value=\"$parti\">$parti</option>");
						} ?>

					</select>
			</fieldset>
			<input type="submit">
		</form>
	</body>
</html>

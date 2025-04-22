<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Equipe Foot</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php require_once "Equipe.php"; require_once "Pays.php"; require_once "Joueur.php"; ?>
	<?php
	// Création des pays
	$france = new Pays("France");
	$espagne = new Pays("Espagne");
	$angleterre = new Pays("Angleterre");
	$italie = new Pays("Italie");
	
	$pays = [$france, $espagne, $angleterre, $italie];

	// Création des équipes
	$clubs = [
		new Equipe("PSG", new DateTime("2023-01-01"), $france),
		new Equipe("OM", new DateTime("2023-01-01"), $france),
		new Equipe("OL", new DateTime("2023-01-01"), $france),
	
		new Equipe("Real Madrid", new DateTime("2023-01-01"), $espagne),
		new Equipe("FC Barcelone", new DateTime("2023-01-01"), $espagne),
		new Equipe("Atlético Madrid", new DateTime("2023-01-01"), $espagne),
	
		new Equipe("Manchester United", new DateTime("2023-01-01"), $angleterre),
		new Equipe("Liverpool", new DateTime("2023-01-01"), $angleterre),
		new Equipe("Chelsea", new DateTime("2023-01-01"), $angleterre),
	
		new Equipe("Juventus", new DateTime("2023-01-01"), $italie),
		new Equipe("AC Milan", new DateTime("2023-01-01"), $italie),
		new Equipe("Inter Milan", new DateTime("2023-01-01"), $italie),
	];
	// Ajout des joueurs à chaque équipe
	$noms = ["Dupont", "Garcia", "Smith", "Rossi", "Lopez", "Brown", "Verdi", "Martin", "Clark", "Bianchi"];
	$prenoms = ["Lucas", "Sofia", "Max", "Anna", "Leo", "Emma", "Noah", "Lina", "Tom", "Eva"];
	
	$joueurs = [];
	for ($i = 0; $i < 50; $i++) {
		$nom = $noms[array_rand($noms)];
		$prenom = $prenoms[array_rand($prenoms)];
		$birth = new DateTime(rand(1985, 2005) . "-" . rand(1, 12) . "-" . rand(1, 28));
		$nation = $pays[array_rand($pays)]->getNom();
		$club = $clubs[$i % count($clubs)];
		$annee = new DateTime("2023-01-01");
	
		$joueur = new Joueur($nom, $prenom, $birth, $nation, $annee);
		$club->ajouterJoueur($joueur);
		$joueurs[] = $joueur;
	}
	foreach ($joueurs as $joueur) {
		$nbEquipes = rand(2, 6); // Le joueur jouera dans 1 à 3 clubs
		$equipesAleatoires = array_rand($clubs, $nbEquipes);
		if (!is_array($equipesAleatoires)) $equipesAleatoires = [$equipesAleatoires];
	
		foreach ($equipesAleatoires as $index) {
			$clubs[$index]->ajouterJoueur($joueur);
		}
	}

/* 	foreach($clubs as $equipe){
		$equipe->affAllJoueur();
	}
	foreach($pays as $pay){
		$pay->affAllEquipe();
	}
	foreach($joueurs as $joueur){
		$joueur->affAllEquipe();
	} */
 ?>
<h2>📋 Tous les joueurs par équipe</h2>
<?php foreach($clubs as $equipe): ?>
    <div class="equipe">
        <h3><?= $equipe->getNom(); ?> (<?= $equipe->getAnnee()->format("Y") ?>)</h3>
        <?= $equipe->affAllJoueur(); ?>
    </div>
<?php endforeach; ?>

<h2>🌍 Toutes les équipes par pays</h2>
<?php foreach($pays as $pay): ?>
    <div class="pays">
        <h3><?= $pay->getNom(); ?></h3>
        <?= $pay->affAllEquipe(); ?>
    </div>
<?php endforeach; ?>

<h2>🏃‍♂️ Toutes les équipes jouées par chaque joueur</h2>
<?php foreach($joueurs as $joueur): ?>
    <div class="joueur">
        <h4><?= $joueur->getPrenom(); ?> <?= $joueur->getNom(); ?></h4>
        <?= $joueur->affAllEquipe(); ?>
    </div>
<?php endforeach; ?>
</body>
</html>
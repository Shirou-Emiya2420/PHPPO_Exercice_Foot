<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Equipe Foot</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once "Equipe.php";
require_once "Pays.php";
require_once "Joueur.php";
require_once "Transphere.php";

// Création des pays
$france = new Pays("France");
$espagne = new Pays("Espagne");
$angleterre = new Pays("Angleterre");
$italie = new Pays("Italie");

$pays = [$france, $espagne, $angleterre, $italie];

// Création des clubs
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

// Génération des joueurs
$noms = ["Dupont", "Garcia", "Smith", "Rossi", "Lopez", "Brown", "Verdi", "Martin", "Clark", "Bianchi"];
$prenoms = ["Lucas", "Sofia", "Max", "Anna", "Leo", "Emma", "Noah", "Lina", "Tom", "Eva"];

$joueurs = [];

for ($i = 0; $i < 50; $i++) {
    $nom = $noms[array_rand($noms)];
    $prenom = $prenoms[array_rand($prenoms)];
    $birth = new DateTime(rand(1985, 2005) . '-' . rand(1, 12) . '-' . rand(1, 28));
    $nation = $pays[array_rand($pays)]->getNom();
    $joueur = new Joueur($nom, $prenom, $birth, $nation, new DateTime("2023-01-01"));
    $joueurs[] = $joueur;

    // Transfert principal
    $transDate = new DateTime("2023-01-01");
    new Transphere($joueur, $clubs[$i % count($clubs)], $transDate);

    // Transferts supplémentaires
    $nbEquipes = rand(1, 3);
    $equipesAleatoires = array_rand($clubs, $nbEquipes);
    if (!is_array($equipesAleatoires)) $equipesAleatoires = [$equipesAleatoires];

    foreach ($equipesAleatoires as $index) {
        $randomDate = new DateTime(rand(2015, 2023) . '-01-01');
        new Transphere($joueur, $clubs[$index], $randomDate);
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
<div class="container">
<?php foreach ($clubs as $equipe): ?>
    <div class="equipe">
        <?php $equipe->affAllJoueur(); ?>
    </div>
<?php endforeach; ?>
</div>

<h2>🌍 Toutes les équipes par pays</h2>
<div class="container">
<?php foreach ($pays as $pay): ?>
    <div class="pays">
        <h3><?= $pay->getNom(); ?></h3>
        <?php $pay->affAllEquipe(); ?>
    </div>
<?php endforeach; ?>
</div>

<h2>🏃‍♂️ Toutes les équipes jouées par chaque joueur</h2>
<div class="container">
<?php foreach ($joueurs as $joueur): ?>
    <div class="joueur">
        <?php $joueur->affAllEquipe(); ?>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
<?php
require_once "Joueur.php";
require_once "Pays.php";
class Equipe{

	private string $_nom;
	private array $_liste_joueur;
	private DateTime $_annee;
	private Pays $_pays;

	public function __construct(string $nom, DateTime $annee, Pays $pays){
		$this->_nom = $nom;
		$this->_pays = $pays;
		$this->_annee = $annee;
		$pays->ajouterEquipe($this);
	}
	
	public function ajouterJoueur(Joueur $joueur){
		$this->_liste_joueur[] = $joueur;
		$joueur->ajouterDansEquipe($this);
	}
	public function affAllJoueur(){
		$str = "<div><p>" . $this->_nom . "</p><p>" . $this->_pays->getNom() . " - " . $this->_annee->format("Y") . "</p><br>";
		foreach($this->_liste_joueur as $joueur){
			$str .= "<p>" . $joueur->getNom() . " " . $joueur->getPrenom() . " " . $joueur->getDateNaissance()->diff($this->_annee)->y . " ans. Pays d'origine : " . $joueur->getNationalite() . "</p><br>";
		}
		$str .= "</div><br>";
		echo $str . "<br>";
	}

	// Getters
	public function getNom(): string {
		return $this->_nom;
	}
	public function getListeJoueur(): array {
		return $this->_liste_joueur;
	}
	public function getAnnee(): DateTime {
		return $this->_annee;
	}
	public function getPays(): Pays {
		return $this->_pays;
	}

	// Setters
	public function setNom(string $nom): void {
		$this->_nom = $nom;
	}
	public function setListeJoueur(array $liste): void {
		$this->_liste_joueur = $liste;
	}
	public function setAnnee(DateTime $annee): void {
		$this->_annee = $annee;
	}
	public function setPays(Pays $pays): void {
		$this->_pays = $pays;
	}
}


?>
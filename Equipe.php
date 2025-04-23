<?php
require_once "Transphere.php";
require_once "Pays.php";
class Equipe{

	private string $_nom;
	private array $_transfere;
	private DateTime $_annee;
	private Pays $_pays;

	public function __construct(string $nom, DateTime $annee, Pays $pays){
		$this->_nom = $nom;
		$this->_pays = $pays;
		$this->_annee = $annee;
		$pays->ajouterEquipe($this);
	}
	
	public function ajouterTransphere(Transphere $transphere){
		$this->_transfere[] = $transphere;
	}
	public function affAllJoueur(){
		$str = "<div><p>" . $this->_nom . "</p><p>" . $this->_pays->getNom() . " - " . $this->_annee->format("Y") . "</p><br>";
		foreach($this->_transfere as $trans){
			$str .= "<p>" . $trans->getJoueur()->getNom() . " " . $trans->getJoueur()->getPrenom() . " " . $trans->getJoueur()->getDateNaissance()->diff($this->_annee)->y . " ans. Pays d'origine : " . $trans->getJoueur()->getNationalite() . "</p><br>";
		}
		$str .= "</div><br>";
		echo $str . "<br>";
	}

	// Getters
	public function getNom(): string {
		return $this->_nom;
	}
	public function getListeJoueur(): array {
		return $this->_transfere;
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
		$this->_transfere = $liste;
	}
	public function setAnnee(DateTime $annee): void {
		$this->_annee = $annee;
	}
	public function setPays(Pays $pays): void {
		$this->_pays = $pays;
	}
}


?>
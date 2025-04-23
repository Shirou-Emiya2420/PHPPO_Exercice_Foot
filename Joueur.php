<?php
require_once "Transphere.php";
class Joueur{

	private string $_nom;
	private string $_prenom;
	private string $_nationalite;
	private DateTime $_date_naissance;
	private array $_transfere;

	
	public function __construct(string $nom, string $prenom, DateTime $date_naissance, string $nationalite, DateTime $annee){
		$this->_nom = $nom;
		$this->_prenom = $prenom;
		$this->_nationalite = $nationalite;
		$this->_date_naissance = $date_naissance;
	}

	public function ajouterDansTransphere(Transphere $transphere){
		$this->_transfere[] = $transphere;
	}
	public function affAllEquipe(){
		$str = "<div><p>" . $this->_nom . " " . $this->_prenom . "</p>";
		foreach($this->_transfere as $equ){
			$str .= "<p>" . $equ->getEquipe()->getNom() . " - " . $equ->getEquipe()->getAnnee()->format("Y") . "</p>";
		}
		$str .= "</div>";
		echo $str . "<br>";
	}

	public function getNom(): string {
		return $this->_nom;
	}
	public function getPrenom(): string {
		return $this->_prenom;
	}
	public function getNationalite(): string {
		return $this->_nationalite;
	}
	public function getDateNaissance(): DateTime {
		return $this->_date_naissance;
	}
	public function getTransphere(): array {
		return $this->_transfere;
	}

	public function setNom(string $nom): void {
		$this->_nom = $nom;
	}
	public function setPrenom(string $prenom): void {
		$this->_prenom = $prenom;
	}
	public function setNationalite(string $nationalite): void {
		$this->_nationalite = $nationalite;
	}
	public function setDateNaissance(DateTime $date): void {
		$this->_date_naissance = $date;
	}
	public function setTransphere(array $transphere): void {
		$this->_transfere = $transphere;
	}
}

?>
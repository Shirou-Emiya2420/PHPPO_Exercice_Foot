<?php
require_once "Equipe.php";
class Joueur{

	private string $_nom;
	private string $_prenom;
	private string $_nationalite;
	private DateTime $_date_naissance;
	private array $_equipe;

	
	public function __construct(string $nom, string $prenom, DateTime $date_naissance, string $nationalite, DateTime $annee){
		$this->_nom = $nom;
		$this->_prenom = $prenom;
		$this->_nationalite = $nationalite;
		$this->_date_naissance = $date_naissance;
	}

	public function ajouterDansEquipe(Equipe $equipe){
		$this->_equipe[] = $equipe;
	}
	public function affAllEquipe(){
		$str = "<div><p>" . $this->_nom . " " . $this->_prenom . "</p>";
		foreach($this->_equipe as $equ){
			$str .= "<p>" . $equ->getNom() . " - " . $equ->getAnnee()->format("Y") . "</p>";
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
	public function getEquipe(): array {
		return $this->_equipe;
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
	public function setEquipe(array $equipe): void {
		$this->_equipe = $equipe;
	}
}

?>
<?php
require_once "Equipe.php";
class Pays{

	private string $_nom;
	private array $_liste_equipe;

	public function __construct(string $nom){
		$this->_nom = $nom;
	}

	public function ajouterEquipe(Equipe $equipe){
		$this->_liste_equipe[] = $equipe;
	}
	public function affAllEquipe(){
		$str = "<div><p>" . $this->_nom . "</p>";
		foreach($this->_liste_equipe as $equipe){
			$str .= "<p>" . $equipe->getNom() . "</p>";
		}
		$str .= "</div>";
		echo $str . "<br>";
	}

	public function getNom(): string {
		return $this->_nom;
	}
	public function getListeEquipe(): array {
		return $this->_liste_equipe;
	}

	public function setNom(string $nom): void {
		$this->_nom = $nom;
	}
	public function setListeEquipe(array $liste): void {
		$this->_liste_equipe = $liste;
	}
	
}

?>
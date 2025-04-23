<?php
require_once "Equipe.php";
require_once "Joueur.php";
class Transphere{

	private Joueur $_joueur;
    private DateTime $_date;
    private Equipe $_equipe;

    public function __construct(Joueur $joueur, Equipe $equipe, DateTime $date){
        $this->_joueur = $joueur;
        $this->_date = $date;
        $this->_equipe = $equipe;
        $this->_joueur->ajouterDansTransphere($this);
        $this->_equipe->ajouterTransphere($this);
    }

    
	// Getters
    public function getJoueur(): Joueur {
        return $this->_joueur;
    }
    public function getDate(): DateTime {
        return $this->_date;
    }
    public function getEquipe(): Equipe {
        return $this->_equipe;
    }

    // Setters
    public function setJoueur(Joueur $joueur): void {
        $this->_joueur = $joueur;
    }
    public function setDate(DateTime $date): void {
        $this->_date = $date;
    }
    public function setEquipe(Equipe $equipe): void {
        $this->_equipe = $equipe;
    }
}

?>
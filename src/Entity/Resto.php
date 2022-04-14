<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Resto")
 */
Class Resto {
    
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $nom;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $numAdr;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $rueAdr;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $cpR;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $ville;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $hOuverture;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $hFermeture;
    
    /**
     * @ORM\OneToMany(targetEntity="Evaluer", mappedBy="unResto")
     */
    protected $lesEvaluer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="lesRestos")
     */
    protected $unUtilisateur;
    
    /**
     * @ORM\OneToMany(targetEntity="Plat", mappedBy="unResto")
     */
    protected $lesPlats;
    
    public function __construct() {
        $this-> lesEvaluer = new ArrayCollection;
        $this-> lesPlats = new ArrayCollection;
    }
    
    public function adduneEval($uneEval) {
        $this-> lesEvaluer[] = $uneEval;                
    }
    
    public function addunPlat($unPlat) {
        $this-> lesPlats[] = $unPlat;
    }
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getNumAdr() {
        return $this->numAdr;
    }

    function getRueAdr() {
        return $this->rueAdr;
    }

    function getCpR() {
        return $this->cpR;
    }

    function getVille() {
        return $this->ville;
    }

    function getHOuverture() {
        return $this->hOuverture;
    }

    function getHFermeture() {
        return $this->hFermeture;
    }

    function getLesEvaluer() {
        return $this->lesEvaluer;
    }

    function getUnUtilisateur() {
        return $this->unUtilisateur;
    }

    function getLesPlats() {
        return $this->lesPlats;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setNumAdr($numAdr): void {
        $this->numAdr = $numAdr;
    }

    function setRueAdr($rueAdr): void {
        $this->rueAdr = $rueAdr;
    }

    function setCpR($cpR): void {
        $this->cpR = $cpR;
    }

    function setVille($ville): void {
        $this->ville = $ville;
    }

    function setHOuverture($hOuverture): void {
        $this->hOuverture = $hOuverture;
    }

    function setHFermeture($hFermeture): void {
        $this->hFermeture = $hFermeture;
    }

    function setLesEvaluer($lesEvaluer): void {
        $this->lesEvaluer = $lesEvaluer;
    }

    function setUnUtilisateur($unUtilisateur): void {
        $this->unUtilisateur = $unUtilisateur;
    }

    function setLesPlats($lesPlats): void {
        $this->lesPlats = $lesPlats;
    }

    public function __toString() {
        return $this->getNom();
    }
    
}
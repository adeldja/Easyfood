<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="evaluer")
 */
class Evaluer{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */ 
    protected $id; 
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $qualite;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $respectRecette;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $esthetique;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $cout;
    
     /**
     * @ORM\Column(type="string")
     */
    protected $commentaire;
   
    /**
     * @ORM\Column(type="boolean")
     */
    protected $commentaireVisible;
    
    /**
     * @ORM\ManyToOne(targetEntity="Resto", inversedBy="lesEvaluer")
     */
    protected $UnResto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="lesEvaluer")
     */
    protected $UnUtilisateur;
    
    function getId(): int {
        return $this->id;
    }

    function getQualite() {
        return $this->qualite;
    }

    function getRespectRecette() {
        return $this->respectRecette;
    }

    function getEsthetique() {
        return $this->esthetique;
    }

    function getCout() {
        return $this->cout;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getCommentaireVisible() {
        return $this->commentaireVisible;
    }

    function getUnResto() {
        return $this->UnResto;
    }

    function getUnUtilisateur() {
        return $this->UnUtilisateur;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setQualite($qualite): void {
        $this->qualite = $qualite;
    }

    function setRespectRecette($respectRecette): void {
        $this->respectRecette = $respectRecette;
    }

    function setEsthetique($esthetique): void {
        $this->esthetique = $esthetique;
    }

    function setCout($cout): void {
        $this->cout = $cout;
    }

    function setCommentaire($commentaire): void {
        $this->commentaire = $commentaire;
    }

    function setCommentaireVisible($commentaireVisible): void {
        $this->commentaireVisible = $commentaireVisible;
    }

    function setUnResto($UnResto): void {
        $this->UnResto = $UnResto;
    }

    function setUnUtilisateur($UnUtilisateur): void {
        $this->UnUtilisateur = $UnUtilisateur;
    }
    
}


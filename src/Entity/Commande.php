<?php
namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Commande")
 */
class Commande {
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="date")
     * @var string
     */
    protected $dateC;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $commentaireClientC;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $dateLivraisonC;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $modeReglementC;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $valide;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="unUtilisateur")
     */
    protected $unUtilisateur;
    
    function getId(): int {
        return $this->id;
    }

    function getDateC() {
        return $this->dateC;
    }

    function getCommentaireClientC(): string {
        return $this->commentaireClientC;
    }

    function getDateLivraisonC() {
        return $this->dateLivraisonC;
    }

    function getModeReglementC(): string {
        return $this->modeReglementC;
    }

    function getValide(): bool {
        return $this->valide;
    }
    
    function getunUtilisateur() {
        return $this->unUtilisateur;
    }
    
    function setId(int $id): void {
        $this->id = $id;
    }

    function setDateC( $dateC): void {
        $this->dateC = $dateC;
    }

    function setCommentaireClientC(string $commentaireClientC): void {
        $this->commentaireClientC = $commentaireClientC;
    }

    function setDateLivraisonC( $dateLivraisonC) {
        $this->dateLivraisonC = $dateLivraisonC;
    }

    function setModeReglementC(string $modeReglementC): void {
        $this->modeReglementC = $modeReglementC;
    }

    function setValide(bool $valide): void {
        $this->valide = $valide;
    }
    
    function setunUtilisateur( $unUtilisateur): void {
        $this->unUtilisateur = $unUtilisateur;
    }
     public function __toString() {
        return $this->id.$this->dateC.$this->commentaireClientC.
                $this->dateLivraisonC.$this->modeReglementC;
    }
 
}

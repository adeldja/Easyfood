<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="TypeUtilisateur")
 */
class TypeUtilisateur {
    /** 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $libelle;
    /**
     * @ORM\OneToMany(targetEntity="Utilisateur", mappedBy="unTU")
     */
    protected $lesUtilisateurs;
      
    public function __construct() {
       $this->lesUtilisateurs = new ArrayCollection();
    }
    public function addUtilisateurs( $unUtilisateur) {
        $this->lesUtilisateurs[] = $unUtilisateur;
    }
    function getId() {
        return $this->id;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getLesUtilisateurs() {
        return $this->lesUtilisateurs;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setLibelle($libelle): void {
        $this->libelle = $libelle;
    }

    function setLesUtilisateurs($lesUtilisateurs): void {
        $this->lesUtilisateurs = $lesUtilisateurs;
    }
    public function __toString() {
        return $this->getLibelle();
    }



}

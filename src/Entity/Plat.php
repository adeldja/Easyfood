<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Plat
 *
 * @author lucas.lafourcade
 */
/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatRepository")
 * @ORM\Table(name="Plat")
 */
class Plat {
    //put your code here
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $nomP;
    /**
     * @ORM\Column(type="decimal")
     * @var string
     */
    protected $prixFournisseurP;
    /**
     * @ORM\Column(type="decimal")
     * @var string
     */
    protected $prixClientP;
    /**
     * @ORM\Column(type="boolean")
     * @var string
     */
    protected $platVisible; 
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $photoP;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $descriptionP;
    /**
     * @ORM\ManyToOne(targetEntity="TypePlat", inversedBy="lesPlats")
     */
    protected $leTP;
    /**
     * @ORM\ManyToOne(targetEntity="Resto", inversedBy="lesPlats")
     */
    protected $unResto;
     /**
     * @ORM\OneToMany(targetEntity="Commander", mappedBy="lePlat")
     * @var lesProjets[] An ArrayCollection of Projet objects.
     */
    protected $LesCommanders;
    
    public function __construct() {
        $this->LesCommanders = new ArrayCollection();
    }
    
    public function addCommander(?Commander $laCommande ){
        $this->LesCommanders[] = $laCommande;
    }
    function getId() {
        return $this->id;
    }

    function getNomP() {
        return $this->nomP;
    }

    function getPrixFournisseurP() {
        return $this->prixFournisseurP;
    }

    function getPrixClientP() {
        return $this->prixClientP;
    }

    function getPlatVisible() {
        return $this->platVisible;
    }

    function getPhotoP() {
        return $this->photoP;
    }

    function getDescriptionP() {
        return $this->descriptionP;
    }

    function getLeTP() {
        return $this->leTP;
    }

    function getLeResto() {
        return $this->leResto;
    }

    function setId( $id) {
        $this->id = $id;
    }

    function setNomP( $nomP) {
        $this->nomP = $nomP;
    }

    function setPrixFournisseurP( $prixFournisseurP) {
        $this->prixFournisseurP = $prixFournisseurP;
    }

    function setPrixClientP( $prixClientP) {
        $this->prixClientP = $prixClientP;
    }

    function setPlatVisible( $platVisible) {
        $this->platVisible = $platVisible;
    }

    function setPhotoP( $photoP) {
        $this->photoP = $photoP;
    }

    function setDescriptionP( $descriptionP) {
        $this->descriptionP = $descriptionP;
    }

    function setLeTP($leTP) {
        $this->leTP = $leTP;
    }

    function setLeResto($leResto) {
        $this->leResto = $leResto;
    }


    function getUnResto() {
        return $this->unResto;
    }

    function getLesCommanders() {
        return $this->LesCommanders;
    }

    function setUnResto($unResto) {
        $this->unResto = $unResto;
    }

    function setLesCommanders( $LesCommanders){
        $this->LesCommanders = $LesCommanders;
    }
    
    public function __toString() {
        return $this->getNomP();
    }

    
}

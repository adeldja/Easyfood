<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="TypePlat")
 */
class TypePlat {
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
    protected $libelleTP;
    /**
     * @ORM\OneToMany(targetEntity="Plat", mappedBy="leTP")
     * @var lesProjets[] An ArrayCollection of Projet objects.
     */
    protected $lesPlats;
    
    public function __construct() {
        $this->lesPlats = new ArrayCollection();
        
    }
    public function addPlats( $unPlat) {
        $this->lesPlats[] = $unPlat;
    }
    
    
    function getId() {
        return $this->id;
    }

    function getLibelleTP() {
        return $this->libelleTP;
    }

    function setId( $id) {
        $this->id = $id;
    }

    function setLibelleTP( $libelleTP) {
        $this->libelleTP = $libelleTP;
    }
    function getLesPlats() {
        return $this->lesPlats;
    }

    function setLesPlats( $lesPlats) {
        $this->lesPlats = $lesPlats;
    }

public function __toString() {
        return $this->getLibelleTP();
    }

}

<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Description of Commander
 *
 * @author adel.djahnit1
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="Commander")
 */
class Commander {
    //put your code here
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="decimal")
     * @var string
     */
    protected $nbPlats;
    /**
     * @ORM\ManyToOne(targetEntity="Plat", inversedBy="lesCommanders")
     */
    protected $lePlat;
    /**
     * @ORM\ManyToOne(targetEntity="Commande", inversedBy="lesCommanders")
     */
    protected $laCommande;
    
    function getId(): int {
        return $this->id;
    }

    function getNbPlats(): string {
        return $this->nbPlats;
    }

    function getLePlat() {
        return $this->lePlat;
    }

    function getLaCommande() {
        return $this->laCommande;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setNbPlats(string $nbPlats): void {
        $this->nbPlats = $nbPlats;
    }

    function setLePlat($lePlat): void {
        $this->lePlat = $lePlat;
    }

    function setLaCommande($laCommande): void {
        $this->laCommande = $laCommande;
    }



}

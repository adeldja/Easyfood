<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;



/**
 * Description of Utilisateur
 *
 * @author lucas.lafourcade
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="Utilisateur")
 */
class Utilisateur  {
    
        /** 
         * @ORM\Id
     * @ORM\GeneratedValue
     * * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $nom;
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $prenom;
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $adr;
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $tel;
    /**
     * @ORM\Column(type="integer")
     * 
     */
    protected $noteEasyFood;
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $MdpU;
    /**
     * @ORM\Column(type="string")
     * 
     */
    
    protected $commentaireEasyFood;
    /**
     * @ORM\Column(type="boolean")
     * 
     */
    protected $commentaireVisible;
    /**
     * @ORM\ManyToOne(targetEntity="TypeUtilisateur", inversedBy="lesUtilisateurs",)
     */
    protected $unTU;
    /**
     * @ORM\OneToMany(targetEntity="Evaluer", mappedBy="unUtilisateur")
     */
      protected $lesEvaluer;
      /**
     * @ORM\OneToMany(targetEntity="Resto", mappedBy="unUtilisateur")
     */
      protected $lesRestos;
        /**
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="unUtilisateur")
     */
      protected $lesCommandes;
      
      public function __construct() {
        $this->lesEvaluer = new ArrayCollection();
        $this->lesResto = new ArrayCollection();
        $this->lesCommandes = new ArrayCollection();
    }
    public function addEvaluer( $unevaluation) {
        $this->lesEvaluer[] = $unevaluation;
    }
    
    public function addResto( $unresto) {
        $this->lesResto[] = $unresto;
    }
    
    public function addCommandes( $unecommande) {
        $this->lesCommandes[] = $unecommande;
    }
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getAdr() {
        return $this->adr;
    }

    function getTel() {
        return $this->tel;
    }

    function getNoteEasyFood() {
        return $this->noteEasyFood;
    }

    function getCommentaireEasyFood() {
        return $this->commentaireEasyFood;
    }

    function getCommentaireVisible() {
        return $this->commentaireVisible;
    }

    function getUnTU() {
        return $this->unTU;
    }

    function getLesEvaluer() {
        return $this->lesEvaluer;
    }

    function getLesResto() {
        return $this->lesResto;
    }

    function getLesCommandes() {
        return $this->lesCommandes;
    }
    function getMdpU() {
        return $this->MdpU;
    }

    function getLesRestos() {
        return $this->lesRestos;
    }

    

    function setLesRestos($lesRestos): void {
        $this->lesRestos = $lesRestos;
    }

    
    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setAdr($adr): void {
        $this->adr = $adr;
    }

    function setTel($tel): void {
        $this->tel = $tel;
    }

    function setNoteEasyFood($noteEasyFood): void {
        $this->noteEasyFood = $noteEasyFood;
    }

    function setCommentaireEasyFood($commentaireEasyFood): void {
        $this->commentaireEasyFood = $commentaireEasyFood;
    }

    function setCommentaireVisible($commentaireVisible): void {
        $this->commentaireVisible = $commentaireVisible;
    }

    function setUnTU($unTU): void {
        $this->unTU = $unTU;
    }

    function setLesEvaluer($lesEvaluer): void {
        $this->lesEvaluer = $lesEvaluer;
    }

    function setLesResto($lesResto): void {
        $this->lesResto = $lesResto;
    }

    function setLesCommandes($lesCommandes): void {
        $this->lesCommandes = $lesCommandes;
    }
    function getPrenom() {
        return $this->prenom;
    }

    function setPrenom($prenom): void {
        $this->prenom = $prenom;
    }
    public function __toString() {
        return $this->getNom();
        
    }
    public function setMdpU(string $mdp){
         $this->MdpU = $mdp;
    }
    
    
    



}
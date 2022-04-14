<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527145132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Commande (id INT AUTO_INCREMENT NOT NULL, un_utilisateur_id INT DEFAULT NULL, date_c DATE NOT NULL, commentaire_client_c VARCHAR(255) NOT NULL, date_livraison_c DATE NOT NULL, mode_reglement_c VARCHAR(255) NOT NULL, valide TINYINT(1) NOT NULL, INDEX IDX_979CC42BB0141749 (un_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Commander (id INT AUTO_INCREMENT NOT NULL, le_plat_id INT DEFAULT NULL, une_commande_id INT DEFAULT NULL, nb_plats NUMERIC(10, 0) NOT NULL, INDEX IDX_C0229A19F8F2C317 (le_plat_id), INDEX IDX_C0229A1911108EE1 (une_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Plat (id INT AUTO_INCREMENT NOT NULL, le_tp_id INT DEFAULT NULL, un_resto_id INT DEFAULT NULL, nom_p VARCHAR(255) NOT NULL, prix_fournisseur_p NUMERIC(10, 0) NOT NULL, prix_client_p NUMERIC(10, 0) NOT NULL, plat_visible TINYINT(1) NOT NULL, photo_p VARCHAR(255) NOT NULL, description_p VARCHAR(255) NOT NULL, INDEX IDX_800A0D39385D494C (le_tp_id), INDEX IDX_800A0D39CA6DC281 (un_resto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Resto (id INT AUTO_INCREMENT NOT NULL, un_utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, num_adr INT NOT NULL, rue_adr VARCHAR(255) NOT NULL, cp_r VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, h_ouverture INT NOT NULL, h_fermeture INT NOT NULL, INDEX IDX_48E07AB5B0141749 (un_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE TypePlat (id INT AUTO_INCREMENT NOT NULL, libelle_tp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE TypeUtilisateur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Utilisateur (id INT AUTO_INCREMENT NOT NULL, un_tu_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adr VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, note_easy_food INT NOT NULL, mdp_u VARCHAR(255) NOT NULL, commentaire_easy_food VARCHAR(255) NOT NULL, commentaire_visible TINYINT(1) NOT NULL, INDEX IDX_9B80EC646E70C784 (un_tu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluer (id INT AUTO_INCREMENT NOT NULL, un_resto_id INT DEFAULT NULL, un_utilisateur_id INT DEFAULT NULL, qualite INT NOT NULL, respect_recette INT NOT NULL, esthetique INT NOT NULL, cout INT NOT NULL, commentaire VARCHAR(255) NOT NULL, commentaire_visible TINYINT(1) NOT NULL, INDEX IDX_B88061EFCA6DC281 (un_resto_id), INDEX IDX_B88061EFB0141749 (un_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Commande ADD CONSTRAINT FK_979CC42BB0141749 FOREIGN KEY (un_utilisateur_id) REFERENCES Utilisateur (id)');
        $this->addSql('ALTER TABLE Commander ADD CONSTRAINT FK_C0229A19F8F2C317 FOREIGN KEY (le_plat_id) REFERENCES Plat (id)');
        $this->addSql('ALTER TABLE Commander ADD CONSTRAINT FK_C0229A1911108EE1 FOREIGN KEY (une_commande_id) REFERENCES Commande (id)');
        $this->addSql('ALTER TABLE Plat ADD CONSTRAINT FK_800A0D39385D494C FOREIGN KEY (le_tp_id) REFERENCES TypePlat (id)');
        $this->addSql('ALTER TABLE Plat ADD CONSTRAINT FK_800A0D39CA6DC281 FOREIGN KEY (un_resto_id) REFERENCES Resto (id)');
        $this->addSql('ALTER TABLE Resto ADD CONSTRAINT FK_48E07AB5B0141749 FOREIGN KEY (un_utilisateur_id) REFERENCES Utilisateur (id)');
        $this->addSql('ALTER TABLE Utilisateur ADD CONSTRAINT FK_9B80EC646E70C784 FOREIGN KEY (un_tu_id) REFERENCES TypeUtilisateur (id)');
        $this->addSql('ALTER TABLE evaluer ADD CONSTRAINT FK_B88061EFCA6DC281 FOREIGN KEY (un_resto_id) REFERENCES Resto (id)');
        $this->addSql('ALTER TABLE evaluer ADD CONSTRAINT FK_B88061EFB0141749 FOREIGN KEY (un_utilisateur_id) REFERENCES Utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Commander DROP FOREIGN KEY FK_C0229A1911108EE1');
        $this->addSql('ALTER TABLE Commander DROP FOREIGN KEY FK_C0229A19F8F2C317');
        $this->addSql('ALTER TABLE Plat DROP FOREIGN KEY FK_800A0D39CA6DC281');
        $this->addSql('ALTER TABLE evaluer DROP FOREIGN KEY FK_B88061EFCA6DC281');
        $this->addSql('ALTER TABLE Plat DROP FOREIGN KEY FK_800A0D39385D494C');
        $this->addSql('ALTER TABLE Utilisateur DROP FOREIGN KEY FK_9B80EC646E70C784');
        $this->addSql('ALTER TABLE Commande DROP FOREIGN KEY FK_979CC42BB0141749');
        $this->addSql('ALTER TABLE Resto DROP FOREIGN KEY FK_48E07AB5B0141749');
        $this->addSql('ALTER TABLE evaluer DROP FOREIGN KEY FK_B88061EFB0141749');
        $this->addSql('DROP TABLE Commande');
        $this->addSql('DROP TABLE Commander');
        $this->addSql('DROP TABLE Plat');
        $this->addSql('DROP TABLE Resto');
        $this->addSql('DROP TABLE TypePlat');
        $this->addSql('DROP TABLE TypeUtilisateur');
        $this->addSql('DROP TABLE Utilisateur');
        $this->addSql('DROP TABLE evaluer');
    }
}

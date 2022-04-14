<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527150040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commander DROP FOREIGN KEY FK_C0229A1911108EE1');
        $this->addSql('DROP INDEX IDX_C0229A1911108EE1 ON commander');
        $this->addSql('ALTER TABLE commander CHANGE une_commande_id la_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_C0229A193743EDD FOREIGN KEY (la_commande_id) REFERENCES Commande (id)');
        $this->addSql('CREATE INDEX IDX_C0229A193743EDD ON commander (la_commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Commander DROP FOREIGN KEY FK_C0229A193743EDD');
        $this->addSql('DROP INDEX IDX_C0229A193743EDD ON Commander');
        $this->addSql('ALTER TABLE Commander CHANGE la_commande_id une_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Commander ADD CONSTRAINT FK_C0229A1911108EE1 FOREIGN KEY (une_commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_C0229A1911108EE1 ON Commander (une_commande_id)');
    }
}

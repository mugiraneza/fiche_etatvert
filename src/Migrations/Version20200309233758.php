<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200309233758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, login VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_1D1C63B3A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE base CHANGE postecode postecode VARCHAR(255) DEFAULT NULL, CHANGE posteetatcode posteetatcode VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etat CHANGE moistraitement_id moistraitement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnel CHANGE datevalidite datevalidite DATETIME DEFAULT NULL, CHANGE situationfamille situationfamille VARCHAR(255) DEFAULT NULL, CHANGE enfantscharge enfantscharge INT DEFAULT NULL, CHANGE codepostal codepostal VARCHAR(255) DEFAULT NULL, CHANGE ville_code_postal ville_code_postal VARCHAR(255) DEFAULT NULL, CHANGE tel tel VARCHAR(15) DEFAULT NULL, CHANGE mail mail VARCHAR(255) DEFAULT NULL, CHANGE qualification qualification VARCHAR(255) DEFAULT NULL, CHANGE situationembauche situationembauche VARCHAR(255) DEFAULT NULL, CHANGE sex sex VARCHAR(25) DEFAULT NULL, CHANGE nombre_epoux_se nombre_epoux_se INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE base CHANGE postecode postecode VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE posteetatcode posteetatcode VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE etat CHANGE moistraitement_id moistraitement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnel CHANGE datevalidite datevalidite DATETIME DEFAULT \'NULL\', CHANGE situationfamille situationfamille VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE enfantscharge enfantscharge INT DEFAULT NULL, CHANGE codepostal codepostal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE ville_code_postal ville_code_postal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tel tel VARCHAR(15) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE mail mail VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE qualification qualification VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE situationembauche situationembauche VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE sex sex VARCHAR(25) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nombre_epoux_se nombre_epoux_se INT DEFAULT NULL');
    }
}

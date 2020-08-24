<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200226193755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE base (id INT AUTO_INCREMENT NOT NULL, sousdossier_id INT NOT NULL, valeur VARCHAR(255) NOT NULL, postecode VARCHAR(255) DEFAULT NULL, posteetatcode VARCHAR(255) DEFAULT NULL, coeficient VARCHAR(255) NOT NULL, visible_coef TINYINT(1) NOT NULL, INDEX IDX_C0B4FE6137894604 (sousdossier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, annee VARCHAR(10) NOT NULL, datedernierchargement DATETIME NOT NULL, personnel VARCHAR(255) NOT NULL, INDEX IDX_3D48E037A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, creationdate DATETIME NOT NULL, rccm VARCHAR(255) NOT NULL, nomdirecteur VARCHAR(255) NOT NULL, nomcreateur VARCHAR(255) NOT NULL, nomresponsablecomptable VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, liensousdossier_id INT NOT NULL, moistraitement_id INT DEFAULT NULL, salbas VARCHAR(255) NOT NULL, primanc VARCHAR(255) NOT NULL, primaut VARCHAR(255) NOT NULL, primcnss VARCHAR(255) NOT NULL, sa VARCHAR(255) NOT NULL, cnss VARCHAR(255) NOT NULL, irpp VARCHAR(255) NOT NULL, tcs VARCHAR(255) NOT NULL, uat VARCHAR(255) NOT NULL, tot VARCHAR(255) NOT NULL, opos VARCHAR(255) NOT NULL, indemtrans VARCHAR(255) NOT NULL, indemaut VARCHAR(255) NOT NULL, pret VARCHAR(255) NOT NULL, retenu VARCHAR(255) NOT NULL, netpayer VARCHAR(255) NOT NULL, sousdossier VARCHAR(255) NOT NULL, INDEX IDX_55CAF762841D9F00 (liensousdossier_id), INDEX IDX_55CAF7626F8A293A (moistraitement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etatvert (id INT AUTO_INCREMENT NOT NULL, sousdossier_id INT NOT NULL, valeur VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, postecode VARCHAR(255) NOT NULL, INDEX IDX_60DD47A437894604 (sousdossier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moistraitement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, numeros VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, affichage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, dossier_id INT NOT NULL, matricule VARCHAR(25) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, datenaissance DATETIME NOT NULL, nationalite VARCHAR(255) NOT NULL, numcartesejour VARCHAR(255) NOT NULL, datevalidite DATETIME DEFAULT NULL, situationfamille VARCHAR(255) DEFAULT NULL, enfantscharge INT DEFAULT NULL, numsecuritesociale VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(255) DEFAULT NULL, ville_code_postal VARCHAR(255) DEFAULT NULL, tel VARCHAR(15) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, emploi VARCHAR(255) NOT NULL, qualification VARCHAR(255) DEFAULT NULL, cocontrat VARCHAR(255) NOT NULL, dureemois VARCHAR(255) NOT NULL, salaire_mensuel VARCHAR(255) NOT NULL, avantages_natures VARCHAR(255) NOT NULL, date_entree VARCHAR(255) NOT NULL, datesortie VARCHAR(255) NOT NULL, situationembauche VARCHAR(255) DEFAULT NULL, sex VARCHAR(25) DEFAULT NULL, nombre_epoux_se INT DEFAULT NULL, INDEX IDX_A6BCF3DEA4AEAFEA (entreprise_id), INDEX IDX_A6BCF3DE611C0C56 (dossier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, etat_code VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, valeur_default VARCHAR(255) NOT NULL, font VARCHAR(255) NOT NULL, referencesage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regularisation (id INT AUTO_INCREMENT NOT NULL, sousdossier_id INT NOT NULL, postecode VARCHAR(255) NOT NULL, poste_etat_code VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_A8912F5737894604 (sousdossier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sousdossier (id INT AUTO_INCREMENT NOT NULL, personnel_id INT NOT NULL, date_traitement VARCHAR(10) NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_1464F5431C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base ADD CONSTRAINT FK_C0B4FE6137894604 FOREIGN KEY (sousdossier_id) REFERENCES sousdossier (id)');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E037A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE etat ADD CONSTRAINT FK_55CAF762841D9F00 FOREIGN KEY (liensousdossier_id) REFERENCES sousdossier (id)');
        $this->addSql('ALTER TABLE etat ADD CONSTRAINT FK_55CAF7626F8A293A FOREIGN KEY (moistraitement_id) REFERENCES moistraitement (id)');
        $this->addSql('ALTER TABLE etatvert ADD CONSTRAINT FK_60DD47A437894604 FOREIGN KEY (sousdossier_id) REFERENCES sousdossier (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE611C0C56 FOREIGN KEY (dossier_id) REFERENCES dossier (id)');
        $this->addSql('ALTER TABLE regularisation ADD CONSTRAINT FK_A8912F5737894604 FOREIGN KEY (sousdossier_id) REFERENCES sousdossier (id)');
        $this->addSql('ALTER TABLE sousdossier ADD CONSTRAINT FK_1464F5431C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE611C0C56');
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E037A4AEAFEA');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DEA4AEAFEA');
        $this->addSql('ALTER TABLE etat DROP FOREIGN KEY FK_55CAF7626F8A293A');
        $this->addSql('ALTER TABLE sousdossier DROP FOREIGN KEY FK_1464F5431C109075');
        $this->addSql('ALTER TABLE base DROP FOREIGN KEY FK_C0B4FE6137894604');
        $this->addSql('ALTER TABLE etat DROP FOREIGN KEY FK_55CAF762841D9F00');
        $this->addSql('ALTER TABLE etatvert DROP FOREIGN KEY FK_60DD47A437894604');
        $this->addSql('ALTER TABLE regularisation DROP FOREIGN KEY FK_A8912F5737894604');
        $this->addSql('DROP TABLE base');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE etatvert');
        $this->addSql('DROP TABLE moistraitement');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE regularisation');
        $this->addSql('DROP TABLE sousdossier');
    }
}

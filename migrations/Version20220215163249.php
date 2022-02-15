<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220215163249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assurance (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT NOT NULL, vehicule_id INT DEFAULT NULL, valide_at DATE NOT NULL, termine_at DATE DEFAULT NULL, montant NUMERIC(6, 2) NOT NULL, INDEX IDX_386829AE670C757F (fournisseur_id), INDEX IDX_386829AE4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, titre VARCHAR(150) NOT NULL, realiser_at DATE NOT NULL, montant NUMERIC(10, 2) NOT NULL, is_periodique TINYINT(1) NOT NULL, prochain_at DATE DEFAULT NULL, INDEX IDX_556BA434C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conduire (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, conducteur_id INT NOT NULL, realiser_at DATE NOT NULL, partir VARCHAR(150) DEFAULT NULL, arriver VARCHAR(150) DEFAULT NULL, distance INT DEFAULT NULL, INDEX IDX_23C2D5384A4A3511 (vehicule_id), INDEX IDX_23C2D538F16F4AC6 (conducteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entretien (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, titre VARCHAR(150) NOT NULL, is_periodique TINYINT(1) NOT NULL, realiser_at DATE NOT NULL, INDEX IDX_2B58D6DAC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(150) NOT NULL, adresse VARCHAR(180) DEFAULT NULL, ville VARCHAR(150) NOT NULL, codepostal VARCHAR(10) NOT NULL, email VARCHAR(150) NOT NULL, telephone VARCHAR(20) NOT NULL, contrat VARCHAR(50) DEFAULT NULL, contrat_at DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ravitailler (id INT AUTO_INCREMENT NOT NULL, realiser_at DATE NOT NULL, quantite INT NOT NULL, prix_unite NUMERIC(6, 2) DEFAULT NULL, montant NUMERIC(6, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_carburant (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(5) NOT NULL, titre VARCHAR(20) NOT NULL, nom VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_charge (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_entretien (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assurance ADD CONSTRAINT FK_386829AE670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE assurance ADD CONSTRAINT FK_386829AE4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE charge ADD CONSTRAINT FK_556BA434C54C8C93 FOREIGN KEY (type_id) REFERENCES type_charge (id)');
        $this->addSql('ALTER TABLE conduire ADD CONSTRAINT FK_23C2D5384A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE conduire ADD CONSTRAINT FK_23C2D538F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DAC54C8C93 FOREIGN KEY (type_id) REFERENCES type_entretien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assurance DROP FOREIGN KEY FK_386829AE670C757F');
        $this->addSql('ALTER TABLE charge DROP FOREIGN KEY FK_556BA434C54C8C93');
        $this->addSql('ALTER TABLE entretien DROP FOREIGN KEY FK_2B58D6DAC54C8C93');
        $this->addSql('DROP TABLE assurance');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE conduire');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE ravitailler');
        $this->addSql('DROP TABLE type_carburant');
        $this->addSql('DROP TABLE type_charge');
        $this->addSql('DROP TABLE type_entretien');
        $this->addSql('ALTER TABLE fiche_technique CHANGE transmission transmission VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE boite boite VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pneumatiques pneumatiques VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(150) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zipcode zipcode VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vehicule CHANGE immatriculation immatriculation VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c1_titulaire c1_titulaire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c4_cotitulaire c4_cotitulaire VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c3_adresse c3_adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d1_marque d1_marque VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d2_version d2_version VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d21_cnit d21_cnit VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d3_commercial d3_commercial VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE e_identification e_identification VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j_categorie j_categorie VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j1_genre j1_genre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j2_carrosserie j2_carrosserie VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j3_nat j3_nat VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE k_reception k_reception VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE p3_energie p3_energie VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE v9_classe v9_classe VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

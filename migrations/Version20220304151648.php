<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304151648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_carburant CHANGE nom nom VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE charge CHANGE titre titre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE conduire CHANGE partir partir VARCHAR(150) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE arriver arriver VARCHAR(150) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE commentaire commentaire LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE entretien CHANGE titre titre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fiche_technique CHANGE transmission transmission VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE boite boite VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pneumatiques pneumatiques VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fournisseur CHANGE titre titre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(180) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE codepostal codepostal VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contrat contrat VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reset_password_request CHANGE selector selector VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hashed_token hashed_token VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_carburant CHANGE code code VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titre titre VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE couleur couleur VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_charge CHANGE titre titre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_entretien CHANGE titre titre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(150) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zipcode zipcode VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vehicule CHANGE immatriculation immatriculation VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c1_titulaire c1_titulaire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c4_cotitulaire c4_cotitulaire VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c3_adresse c3_adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d1_marque d1_marque VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d2_version d2_version VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d21_cnit d21_cnit VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE d3_commercial d3_commercial VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE e_identification e_identification VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j_categorie j_categorie VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j1_genre j1_genre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j2_carrosserie j2_carrosserie VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE j3_nat j3_nat VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE k_reception k_reception VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE p3_energie p3_energie VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE v9_classe v9_classe VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

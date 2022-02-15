<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214101944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_technique (id INT AUTO_INCREMENT NOT NULL, longueur NUMERIC(5, 2) DEFAULT NULL, largeur NUMERIC(5, 2) DEFAULT NULL, hauteur NUMERIC(5, 2) DEFAULT NULL, coffre INT DEFAULT NULL, empattement NUMERIC(5, 2) DEFAULT NULL, porteafaux NUMERIC(5, 2) DEFAULT NULL, reservoir INT DEFAULT NULL, conso_urbaine NUMERIC(5, 2) DEFAULT NULL, conso_mixte NUMERIC(5, 2) DEFAULT NULL, transmission VARCHAR(10) DEFAULT NULL, boite VARCHAR(20) DEFAULT NULL, pneumatiques VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, vehicules_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C53D045FA76ED395 (user_id), INDEX IDX_C53D045F8D8BD7E2 (vehicules_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(150) NOT NULL, firstname VARCHAR(150) DEFAULT NULL, phone VARCHAR(20) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(150) NOT NULL, zipcode VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, fiche_technique_id INT NOT NULL, immatriculation VARCHAR(10) NOT NULL, circulation_at DATE NOT NULL, c1_titulaire VARCHAR(255) NOT NULL, c4_proprietaire TINYINT(1) NOT NULL, c4_cotitulaire VARCHAR(255) DEFAULT NULL, c3_adresse VARCHAR(255) NOT NULL, d1_marque VARCHAR(100) NOT NULL, d2_version VARCHAR(100) NOT NULL, d21_cnit VARCHAR(50) NOT NULL, d3_commercial VARCHAR(50) NOT NULL, e_identification VARCHAR(50) NOT NULL, f1_ptac INT NOT NULL, f2_masse INT NOT NULL, f3_ptra INT NOT NULL, g_poidsmarche INT NOT NULL, g1_poidsvide INT NOT NULL, i_certificat_at DATE NOT NULL, j_categorie VARCHAR(10) DEFAULT NULL, j1_genre VARCHAR(50) DEFAULT NULL, j2_carrosserie VARCHAR(10) DEFAULT NULL, j3_nat VARCHAR(20) DEFAULT NULL, k_reception VARCHAR(50) DEFAULT NULL, p1_cylindree INT DEFAULT NULL, p2_puissance INT DEFAULT NULL, p3_energie VARCHAR(10) NOT NULL, p6_fiscal INT DEFAULT NULL, q_kwkg INT DEFAULT NULL, s1_assis INT DEFAULT NULL, s2_debout INT DEFAULT NULL, u1_sonore INT DEFAULT NULL, u2_moteur INT DEFAULT NULL, v7_co2 INT DEFAULT NULL, v9_classe VARCHAR(50) DEFAULT NULL, x1_visite_at DATE NOT NULL, y1_region INT DEFAULT NULL, y2_formation INT DEFAULT NULL, y3_ecotaxe INT DEFAULT NULL, y4_gestion INT DEFAULT NULL, y5_redevance NUMERIC(5, 2) DEFAULT NULL, y6_total NUMERIC(6, 2) DEFAULT NULL, acheter_at DATE DEFAULT NULL, valeur_achat NUMERIC(10, 2) DEFAULT NULL, odometer INT NOT NULL, UNIQUE INDEX UNIQ_292FFF1DBE73422E (immatriculation), UNIQUE INDEX UNIQ_292FFF1DF397924D (d21_cnit), INDEX IDX_292FFF1D431AD613 (fiche_technique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F8D8BD7E2 FOREIGN KEY (vehicules_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D431AD613 FOREIGN KEY (fiche_technique_id) REFERENCES fiche_technique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D431AD613');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA76ED395');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F8D8BD7E2');
        $this->addSql('DROP TABLE fiche_technique');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

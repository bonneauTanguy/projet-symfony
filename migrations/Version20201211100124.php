<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211100124 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adherent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ceinture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE certificat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE date_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE nom_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE passeport_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE personne_confiance_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE saison_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE telephone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_parent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adherent (id INT NOT NULL, une_categorie_id INT DEFAULT NULL, un_certificat_id INT DEFAULT NULL, un_passeport_id INT DEFAULT NULL, num_licence VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(5) NOT NULL, sexe VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_90D3F06076D5A8E ON adherent (une_categorie_id)');
        $this->addSql('CREATE INDEX IDX_90D3F0606277FBEA ON adherent (un_certificat_id)');
        $this->addSql('CREATE INDEX IDX_90D3F060997A0D97 ON adherent (un_passeport_id)');
        $this->addSql('CREATE TABLE adherent_nom (adherent_id INT NOT NULL, nom_id INT NOT NULL, PRIMARY KEY(adherent_id, nom_id))');
        $this->addSql('CREATE INDEX IDX_F5FDCD0425F06C53 ON adherent_nom (adherent_id)');
        $this->addSql('CREATE INDEX IDX_F5FDCD04C8121CE9 ON adherent_nom (nom_id)');
        $this->addSql('CREATE TABLE adherent_telephone (adherent_id INT NOT NULL, telephone_id INT NOT NULL, PRIMARY KEY(adherent_id, telephone_id))');
        $this->addSql('CREATE INDEX IDX_28D8912425F06C53 ON adherent_telephone (adherent_id)');
        $this->addSql('CREATE INDEX IDX_28D89124FE649A29 ON adherent_telephone (telephone_id)');
        $this->addSql('CREATE TABLE adherent_mail (adherent_id INT NOT NULL, mail_id INT NOT NULL, PRIMARY KEY(adherent_id, mail_id))');
        $this->addSql('CREATE INDEX IDX_EDD9BCCA25F06C53 ON adherent_mail (adherent_id)');
        $this->addSql('CREATE INDEX IDX_EDD9BCCAC8776F01 ON adherent_mail (mail_id)');
        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, libelle_categ VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ceinture (id INT NOT NULL, libelle_ceinture VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE certificat (id INT NOT NULL, date_certificat_id INT DEFAULT NULL, libelle_certificat VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_27448F77816BCB86 ON certificat (date_certificat_id)');
        $this->addSql('CREATE TABLE date (id INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mail (id INT NOT NULL, un_type_parent_id INT DEFAULT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5126AC488D207D66 ON mail (un_type_parent_id)');
        $this->addSql('CREATE TABLE nom (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE passeport (id INT NOT NULL, libelle_pass VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE personne_confiance (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE saison (id INT NOT NULL, date_saison DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE telephone (id INT NOT NULL, un_type_parent_id INT DEFAULT NULL, numero VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_450FF0108D207D66 ON telephone (un_type_parent_id)');
        $this->addSql('CREATE TABLE type_parent (id INT NOT NULL, libelle_parent VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F06076D5A8E FOREIGN KEY (une_categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0606277FBEA FOREIGN KEY (un_certificat_id) REFERENCES certificat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060997A0D97 FOREIGN KEY (un_passeport_id) REFERENCES passeport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT FK_F5FDCD0425F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT FK_F5FDCD04C8121CE9 FOREIGN KEY (nom_id) REFERENCES nom (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT FK_28D8912425F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT FK_28D89124FE649A29 FOREIGN KEY (telephone_id) REFERENCES telephone (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT FK_EDD9BCCA25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT FK_EDD9BCCAC8776F01 FOREIGN KEY (mail_id) REFERENCES mail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT FK_27448F77816BCB86 FOREIGN KEY (date_certificat_id) REFERENCES date (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mail ADD CONSTRAINT FK_5126AC488D207D66 FOREIGN KEY (un_type_parent_id) REFERENCES type_parent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0108D207D66 FOREIGN KEY (un_type_parent_id) REFERENCES type_parent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE adherent_nom DROP CONSTRAINT FK_F5FDCD0425F06C53');
        $this->addSql('ALTER TABLE adherent_telephone DROP CONSTRAINT FK_28D8912425F06C53');
        $this->addSql('ALTER TABLE adherent_mail DROP CONSTRAINT FK_EDD9BCCA25F06C53');
        $this->addSql('ALTER TABLE adherent DROP CONSTRAINT FK_90D3F06076D5A8E');
        $this->addSql('ALTER TABLE adherent DROP CONSTRAINT FK_90D3F0606277FBEA');
        $this->addSql('ALTER TABLE certificat DROP CONSTRAINT FK_27448F77816BCB86');
        $this->addSql('ALTER TABLE adherent_mail DROP CONSTRAINT FK_EDD9BCCAC8776F01');
        $this->addSql('ALTER TABLE adherent_nom DROP CONSTRAINT FK_F5FDCD04C8121CE9');
        $this->addSql('ALTER TABLE adherent DROP CONSTRAINT FK_90D3F060997A0D97');
        $this->addSql('ALTER TABLE adherent_telephone DROP CONSTRAINT FK_28D89124FE649A29');
        $this->addSql('ALTER TABLE mail DROP CONSTRAINT FK_5126AC488D207D66');
        $this->addSql('ALTER TABLE telephone DROP CONSTRAINT FK_450FF0108D207D66');
        $this->addSql('DROP SEQUENCE adherent_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ceinture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE certificat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE date_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE nom_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE passeport_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE personne_confiance_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE saison_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE telephone_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_parent_id_seq CASCADE');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE adherent_nom');
        $this->addSql('DROP TABLE adherent_telephone');
        $this->addSql('DROP TABLE adherent_mail');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE ceinture');
        $this->addSql('DROP TABLE certificat');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE nom');
        $this->addSql('DROP TABLE passeport');
        $this->addSql('DROP TABLE personne_confiance');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE type_parent');
    }
}

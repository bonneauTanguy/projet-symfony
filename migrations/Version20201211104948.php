<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211104948 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent_nom DROP CONSTRAINT fk_f5fdcd0425f06c53');
        $this->addSql('ALTER TABLE adherent_telephone DROP CONSTRAINT fk_28d8912425f06c53');
        $this->addSql('ALTER TABLE adherent_mail DROP CONSTRAINT fk_edd9bcca25f06c53');
        $this->addSql('ALTER TABLE adherent_adherer DROP CONSTRAINT fk_f2f7ef9c25f06c53');
        $this->addSql('ALTER TABLE adherent DROP CONSTRAINT fk_90d3f0606277fbea');
        $this->addSql('ALTER TABLE certificat DROP CONSTRAINT fk_27448f77816bcb86');
        $this->addSql('DROP SEQUENCE adherent_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE certificat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE date_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE competition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE competition (id INT NOT NULL, libelle_comp VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE certificat');
        $this->addSql('DROP TABLE adherent_nom');
        $this->addSql('DROP TABLE adherent_telephone');
        $this->addSql('DROP TABLE adherent_mail');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE adherent_adherer');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE competition_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE adherent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE certificat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE date_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adherent (id INT NOT NULL, une_categorie_id INT DEFAULT NULL, un_certificat_id INT DEFAULT NULL, un_passeport_id INT DEFAULT NULL, num_licence VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(5) NOT NULL, sexe VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_90d3f0606277fbea ON adherent (un_certificat_id)');
        $this->addSql('CREATE INDEX idx_90d3f06076d5a8e ON adherent (une_categorie_id)');
        $this->addSql('CREATE INDEX idx_90d3f060997a0d97 ON adherent (un_passeport_id)');
        $this->addSql('CREATE TABLE certificat (id INT NOT NULL, date_certificat_id INT DEFAULT NULL, libelle_certificat VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_27448f77816bcb86 ON certificat (date_certificat_id)');
        $this->addSql('CREATE TABLE adherent_nom (adherent_id INT NOT NULL, nom_id INT NOT NULL, PRIMARY KEY(adherent_id, nom_id))');
        $this->addSql('CREATE INDEX idx_f5fdcd04c8121ce9 ON adherent_nom (nom_id)');
        $this->addSql('CREATE INDEX idx_f5fdcd0425f06c53 ON adherent_nom (adherent_id)');
        $this->addSql('CREATE TABLE adherent_telephone (adherent_id INT NOT NULL, telephone_id INT NOT NULL, PRIMARY KEY(adherent_id, telephone_id))');
        $this->addSql('CREATE INDEX idx_28d8912425f06c53 ON adherent_telephone (adherent_id)');
        $this->addSql('CREATE INDEX idx_28d89124fe649a29 ON adherent_telephone (telephone_id)');
        $this->addSql('CREATE TABLE adherent_mail (adherent_id INT NOT NULL, mail_id INT NOT NULL, PRIMARY KEY(adherent_id, mail_id))');
        $this->addSql('CREATE INDEX idx_edd9bccac8776f01 ON adherent_mail (mail_id)');
        $this->addSql('CREATE INDEX idx_edd9bcca25f06c53 ON adherent_mail (adherent_id)');
        $this->addSql('CREATE TABLE date (id INT NOT NULL, date_c DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE adherent_adherer (adherent_id INT NOT NULL, adherer_id INT NOT NULL, PRIMARY KEY(adherent_id, adherer_id))');
        $this->addSql('CREATE INDEX idx_f2f7ef9c49ae2f1e ON adherent_adherer (adherer_id)');
        $this->addSql('CREATE INDEX idx_f2f7ef9c25f06c53 ON adherent_adherer (adherent_id)');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT fk_90d3f06076d5a8e FOREIGN KEY (une_categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT fk_90d3f0606277fbea FOREIGN KEY (un_certificat_id) REFERENCES certificat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT fk_90d3f060997a0d97 FOREIGN KEY (un_passeport_id) REFERENCES passeport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT fk_27448f77816bcb86 FOREIGN KEY (date_certificat_id) REFERENCES date (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT fk_f5fdcd0425f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT fk_f5fdcd04c8121ce9 FOREIGN KEY (nom_id) REFERENCES nom (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT fk_28d8912425f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT fk_28d89124fe649a29 FOREIGN KEY (telephone_id) REFERENCES telephone (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT fk_edd9bcca25f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT fk_edd9bccac8776f01 FOREIGN KEY (mail_id) REFERENCES mail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT fk_f2f7ef9c25f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT fk_f2f7ef9c49ae2f1e FOREIGN KEY (adherer_id) REFERENCES adherer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE competition');
    }
}

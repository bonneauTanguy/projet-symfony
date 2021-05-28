<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201218093422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent_adherer DROP CONSTRAINT fk_f2f7ef9c49ae2f1e');
        $this->addSql('ALTER TABLE adherent_adherer DROP CONSTRAINT fk_f2f7ef9c25f06c53');
        $this->addSql('ALTER TABLE adherent_personne_confiance DROP CONSTRAINT fk_1a16794e25f06c53');
        $this->addSql('ALTER TABLE adherent_nom DROP CONSTRAINT fk_f5fdcd0425f06c53');
        $this->addSql('ALTER TABLE adherent_mail DROP CONSTRAINT fk_edd9bcca25f06c53');
        $this->addSql('ALTER TABLE adherent_telephone DROP CONSTRAINT fk_28d8912425f06c53');
        $this->addSql('DROP SEQUENCE adherent_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE adherer_id_seq CASCADE');
        $this->addSql('DROP TABLE adherent_adherer');
        $this->addSql('DROP TABLE adherer');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE adherent_personne_confiance');
        $this->addSql('DROP TABLE adherent_nom');
        $this->addSql('DROP TABLE adherent_mail');
        $this->addSql('DROP TABLE adherent_telephone');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE adherent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE adherer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adherent_adherer (adherent_id INT NOT NULL, adherer_id INT NOT NULL, PRIMARY KEY(adherent_id, adherer_id))');
        $this->addSql('CREATE INDEX idx_f2f7ef9c25f06c53 ON adherent_adherer (adherent_id)');
        $this->addSql('CREATE INDEX idx_f2f7ef9c49ae2f1e ON adherent_adherer (adherer_id)');
        $this->addSql('CREATE TABLE adherer (id INT NOT NULL, une_saison_id INT DEFAULT NULL, une_ceinture_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_7786dd121f3c845e ON adherer (une_saison_id)');
        $this->addSql('CREATE INDEX idx_7786dd1266066bd4 ON adherer (une_ceinture_id)');
        $this->addSql('CREATE TABLE adherent (id INT NOT NULL, une_categ_id INT DEFAULT NULL, un_certif_id INT DEFAULT NULL, un_pass_id INT DEFAULT NULL, num_licence VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(5) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_90d3f0609a75186d ON adherent (un_pass_id)');
        $this->addSql('CREATE INDEX idx_90d3f060d28e485d ON adherent (une_categ_id)');
        $this->addSql('CREATE INDEX idx_90d3f060884f6cda ON adherent (un_certif_id)');
        $this->addSql('CREATE TABLE adherent_personne_confiance (adherent_id INT NOT NULL, personne_confiance_id INT NOT NULL, PRIMARY KEY(adherent_id, personne_confiance_id))');
        $this->addSql('CREATE INDEX idx_1a16794e80f8a44e ON adherent_personne_confiance (personne_confiance_id)');
        $this->addSql('CREATE INDEX idx_1a16794e25f06c53 ON adherent_personne_confiance (adherent_id)');
        $this->addSql('CREATE TABLE adherent_nom (adherent_id INT NOT NULL, nom_id INT NOT NULL, PRIMARY KEY(adherent_id, nom_id))');
        $this->addSql('CREATE INDEX idx_f5fdcd0425f06c53 ON adherent_nom (adherent_id)');
        $this->addSql('CREATE INDEX idx_f5fdcd04c8121ce9 ON adherent_nom (nom_id)');
        $this->addSql('CREATE TABLE adherent_mail (adherent_id INT NOT NULL, mail_id INT NOT NULL, PRIMARY KEY(adherent_id, mail_id))');
        $this->addSql('CREATE INDEX idx_edd9bccac8776f01 ON adherent_mail (mail_id)');
        $this->addSql('CREATE INDEX idx_edd9bcca25f06c53 ON adherent_mail (adherent_id)');
        $this->addSql('CREATE TABLE adherent_telephone (adherent_id INT NOT NULL, telephone_id INT NOT NULL, PRIMARY KEY(adherent_id, telephone_id))');
        $this->addSql('CREATE INDEX idx_28d8912425f06c53 ON adherent_telephone (adherent_id)');
        $this->addSql('CREATE INDEX idx_28d89124fe649a29 ON adherent_telephone (telephone_id)');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT fk_f2f7ef9c25f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT fk_f2f7ef9c49ae2f1e FOREIGN KEY (adherer_id) REFERENCES adherer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT fk_7786dd121f3c845e FOREIGN KEY (une_saison_id) REFERENCES saison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT fk_7786dd1266066bd4 FOREIGN KEY (une_ceinture_id) REFERENCES ceinture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT fk_90d3f060d28e485d FOREIGN KEY (une_categ_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT fk_90d3f060884f6cda FOREIGN KEY (un_certif_id) REFERENCES certificat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT fk_90d3f0609a75186d FOREIGN KEY (un_pass_id) REFERENCES passeport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_personne_confiance ADD CONSTRAINT fk_1a16794e25f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_personne_confiance ADD CONSTRAINT fk_1a16794e80f8a44e FOREIGN KEY (personne_confiance_id) REFERENCES personne_confiance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT fk_f5fdcd0425f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT fk_f5fdcd04c8121ce9 FOREIGN KEY (nom_id) REFERENCES nom (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT fk_edd9bcca25f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT fk_edd9bccac8776f01 FOREIGN KEY (mail_id) REFERENCES mail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT fk_28d8912425f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT fk_28d89124fe649a29 FOREIGN KEY (telephone_id) REFERENCES telephone (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}

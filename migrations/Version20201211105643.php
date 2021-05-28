<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211105643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adherent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adherent (id INT NOT NULL, une_categ_id INT DEFAULT NULL, un_certif_id INT DEFAULT NULL, un_pass_id INT DEFAULT NULL, num_licence VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(5) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_90D3F060D28E485D ON adherent (une_categ_id)');
        $this->addSql('CREATE INDEX IDX_90D3F060884F6CDA ON adherent (un_certif_id)');
        $this->addSql('CREATE INDEX IDX_90D3F0609A75186D ON adherent (un_pass_id)');
        $this->addSql('CREATE TABLE adherent_personne_confiance (adherent_id INT NOT NULL, personne_confiance_id INT NOT NULL, PRIMARY KEY(adherent_id, personne_confiance_id))');
        $this->addSql('CREATE INDEX IDX_1A16794E25F06C53 ON adherent_personne_confiance (adherent_id)');
        $this->addSql('CREATE INDEX IDX_1A16794E80F8A44E ON adherent_personne_confiance (personne_confiance_id)');
        $this->addSql('CREATE TABLE adherent_nom (adherent_id INT NOT NULL, nom_id INT NOT NULL, PRIMARY KEY(adherent_id, nom_id))');
        $this->addSql('CREATE INDEX IDX_F5FDCD0425F06C53 ON adherent_nom (adherent_id)');
        $this->addSql('CREATE INDEX IDX_F5FDCD04C8121CE9 ON adherent_nom (nom_id)');
        $this->addSql('CREATE TABLE adherent_adherer (adherent_id INT NOT NULL, adherer_id INT NOT NULL, PRIMARY KEY(adherent_id, adherer_id))');
        $this->addSql('CREATE INDEX IDX_F2F7EF9C25F06C53 ON adherent_adherer (adherent_id)');
        $this->addSql('CREATE INDEX IDX_F2F7EF9C49AE2F1E ON adherent_adherer (adherer_id)');
        $this->addSql('CREATE TABLE adherent_mail (adherent_id INT NOT NULL, mail_id INT NOT NULL, PRIMARY KEY(adherent_id, mail_id))');
        $this->addSql('CREATE INDEX IDX_EDD9BCCA25F06C53 ON adherent_mail (adherent_id)');
        $this->addSql('CREATE INDEX IDX_EDD9BCCAC8776F01 ON adherent_mail (mail_id)');
        $this->addSql('CREATE TABLE adherent_telephone (adherent_id INT NOT NULL, telephone_id INT NOT NULL, PRIMARY KEY(adherent_id, telephone_id))');
        $this->addSql('CREATE INDEX IDX_28D8912425F06C53 ON adherent_telephone (adherent_id)');
        $this->addSql('CREATE INDEX IDX_28D89124FE649A29 ON adherent_telephone (telephone_id)');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060D28E485D FOREIGN KEY (une_categ_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060884F6CDA FOREIGN KEY (un_certif_id) REFERENCES certificat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0609A75186D FOREIGN KEY (un_pass_id) REFERENCES passeport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_personne_confiance ADD CONSTRAINT FK_1A16794E25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_personne_confiance ADD CONSTRAINT FK_1A16794E80F8A44E FOREIGN KEY (personne_confiance_id) REFERENCES personne_confiance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT FK_F5FDCD0425F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_nom ADD CONSTRAINT FK_F5FDCD04C8121CE9 FOREIGN KEY (nom_id) REFERENCES nom (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT FK_F2F7EF9C25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT FK_F2F7EF9C49AE2F1E FOREIGN KEY (adherer_id) REFERENCES adherer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT FK_EDD9BCCA25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_mail ADD CONSTRAINT FK_EDD9BCCAC8776F01 FOREIGN KEY (mail_id) REFERENCES mail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT FK_28D8912425F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_telephone ADD CONSTRAINT FK_28D89124FE649A29 FOREIGN KEY (telephone_id) REFERENCES telephone (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE adherent_personne_confiance DROP CONSTRAINT FK_1A16794E25F06C53');
        $this->addSql('ALTER TABLE adherent_nom DROP CONSTRAINT FK_F5FDCD0425F06C53');
        $this->addSql('ALTER TABLE adherent_adherer DROP CONSTRAINT FK_F2F7EF9C25F06C53');
        $this->addSql('ALTER TABLE adherent_mail DROP CONSTRAINT FK_EDD9BCCA25F06C53');
        $this->addSql('ALTER TABLE adherent_telephone DROP CONSTRAINT FK_28D8912425F06C53');
        $this->addSql('DROP SEQUENCE adherent_id_seq CASCADE');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE adherent_personne_confiance');
        $this->addSql('DROP TABLE adherent_nom');
        $this->addSql('DROP TABLE adherent_adherer');
        $this->addSql('DROP TABLE adherent_mail');
        $this->addSql('DROP TABLE adherent_telephone');
    }
}

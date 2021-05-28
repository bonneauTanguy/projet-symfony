<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211100716 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adherer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adherent_adherer (adherent_id INT NOT NULL, adherer_id INT NOT NULL, PRIMARY KEY(adherent_id, adherer_id))');
        $this->addSql('CREATE INDEX IDX_F2F7EF9C25F06C53 ON adherent_adherer (adherent_id)');
        $this->addSql('CREATE INDEX IDX_F2F7EF9C49AE2F1E ON adherent_adherer (adherer_id)');
        $this->addSql('CREATE TABLE adherer (id INT NOT NULL, une_saison_id INT DEFAULT NULL, une_ceinture_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7786DD121F3C845E ON adherer (une_saison_id)');
        $this->addSql('CREATE INDEX IDX_7786DD1266066BD4 ON adherer (une_ceinture_id)');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT FK_F2F7EF9C25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherent_adherer ADD CONSTRAINT FK_F2F7EF9C49AE2F1E FOREIGN KEY (adherer_id) REFERENCES adherer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT FK_7786DD121F3C845E FOREIGN KEY (une_saison_id) REFERENCES saison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT FK_7786DD1266066BD4 FOREIGN KEY (une_ceinture_id) REFERENCES ceinture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE adherent_adherer DROP CONSTRAINT FK_F2F7EF9C49AE2F1E');
        $this->addSql('DROP SEQUENCE adherer_id_seq CASCADE');
        $this->addSql('DROP TABLE adherent_adherer');
        $this->addSql('DROP TABLE adherer');
    }
}

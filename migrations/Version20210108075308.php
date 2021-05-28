<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108075308 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherer_adherent (adherer_id INT NOT NULL, adherent_id INT NOT NULL, PRIMARY KEY(adherer_id, adherent_id))');
        $this->addSql('CREATE INDEX IDX_5CDC5E8B49AE2F1E ON adherer_adherent (adherer_id)');
        $this->addSql('CREATE INDEX IDX_5CDC5E8B25F06C53 ON adherer_adherent (adherent_id)');
        $this->addSql('ALTER TABLE adherer_adherent ADD CONSTRAINT FK_5CDC5E8B49AE2F1E FOREIGN KEY (adherer_id) REFERENCES adherer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer_adherent ADD CONSTRAINT FK_5CDC5E8B25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE adherer_adherent');
    }
}

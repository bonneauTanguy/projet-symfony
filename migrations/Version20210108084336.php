<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108084336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adherer_adherent');
        $this->addSql('ALTER TABLE adherer ADD un_adherent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT FK_7786DD124BFA6AC3 FOREIGN KEY (un_adherent_id) REFERENCES adherent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_7786DD124BFA6AC3 ON adherer (un_adherent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE adherer_adherent (adherer_id INT NOT NULL, adherent_id INT NOT NULL, PRIMARY KEY(adherer_id, adherent_id))');
        $this->addSql('CREATE INDEX idx_5cdc5e8b49ae2f1e ON adherer_adherent (adherer_id)');
        $this->addSql('CREATE INDEX idx_5cdc5e8b25f06c53 ON adherer_adherent (adherent_id)');
        $this->addSql('ALTER TABLE adherer_adherent ADD CONSTRAINT fk_5cdc5e8b49ae2f1e FOREIGN KEY (adherer_id) REFERENCES adherer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer_adherent ADD CONSTRAINT fk_5cdc5e8b25f06c53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherer DROP CONSTRAINT FK_7786DD124BFA6AC3');
        $this->addSql('DROP INDEX IDX_7786DD124BFA6AC3');
        $this->addSql('ALTER TABLE adherer DROP un_adherent_id');
    }
}

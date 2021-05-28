<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211105214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE certificat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE certificat (id INT NOT NULL, une_competition_id INT DEFAULT NULL, date_certif DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_27448F774BC34891 ON certificat (une_competition_id)');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT FK_27448F774BC34891 FOREIGN KEY (une_competition_id) REFERENCES competition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE certificat_id_seq CASCADE');
        $this->addSql('DROP TABLE certificat');
    }
}

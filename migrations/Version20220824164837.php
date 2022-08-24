<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220824164837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plastic_production AS SELECT id, year, plastic_production FROM plastic_production');
        $this->addSql('DROP TABLE plastic_production');
        $this->addSql('CREATE TABLE plastic_production (pp_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, year INTEGER NOT NULL, plastic_production BIGINT NOT NULL)');
        $this->addSql('INSERT INTO plastic_production (pp_id, year, plastic_production) SELECT id, year, plastic_production FROM __temp__plastic_production');
        $this->addSql('DROP TABLE __temp__plastic_production');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plastic_production AS SELECT pp_id, year, plastic_production FROM plastic_production');
        $this->addSql('DROP TABLE plastic_production');
        $this->addSql('CREATE TABLE plastic_production (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, year INTEGER NOT NULL, plastic_production BIGINT NOT NULL)');
        $this->addSql('INSERT INTO plastic_production (id, year, plastic_production) SELECT pp_id, year, plastic_production FROM __temp__plastic_production');
        $this->addSql('DROP TABLE __temp__plastic_production');
    }
}

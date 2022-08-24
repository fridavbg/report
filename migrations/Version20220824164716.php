<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220824164716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plastic_lifetime AS SELECT id, sector, lifetime_in_years FROM plastic_lifetime');
        $this->addSql('DROP TABLE plastic_lifetime');
        $this->addSql('CREATE TABLE plastic_lifetime (pl_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sector VARCHAR(255) NOT NULL, lifetime INTEGER NOT NULL)');
        $this->addSql('INSERT INTO plastic_lifetime (pl_id, sector, lifetime) SELECT id, sector, lifetime_in_years FROM __temp__plastic_lifetime');
        $this->addSql('DROP TABLE __temp__plastic_lifetime');
        $this->addSql('CREATE TEMPORARY TABLE __temp__plastic_production AS SELECT id, year, plastics_production_million_tones FROM plastic_production');
        $this->addSql('DROP TABLE plastic_production');
        $this->addSql('CREATE TABLE plastic_production (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, year INTEGER NOT NULL, plastic_production BIGINT NOT NULL)');
        $this->addSql('INSERT INTO plastic_production (id, year, plastic_production) SELECT id, year, plastics_production_million_tones FROM __temp__plastic_production');
        $this->addSql('DROP TABLE __temp__plastic_production');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plastic_lifetime AS SELECT pl_id, sector, lifetime FROM plastic_lifetime');
        $this->addSql('DROP TABLE plastic_lifetime');
        $this->addSql('CREATE TABLE plastic_lifetime (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sector VARCHAR(255) NOT NULL, lifetime_in_years INTEGER NOT NULL)');
        $this->addSql('INSERT INTO plastic_lifetime (id, sector, lifetime_in_years) SELECT pl_id, sector, lifetime FROM __temp__plastic_lifetime');
        $this->addSql('DROP TABLE __temp__plastic_lifetime');
        $this->addSql('CREATE TEMPORARY TABLE __temp__plastic_production AS SELECT id, year, plastic_production FROM plastic_production');
        $this->addSql('DROP TABLE plastic_production');
        $this->addSql('CREATE TABLE plastic_production (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, year INTEGER NOT NULL, plastics_production_million_tones BIGINT NOT NULL)');
        $this->addSql('INSERT INTO plastic_production (id, year, plastics_production_million_tones) SELECT id, year, plastic_production FROM __temp__plastic_production');
        $this->addSql('DROP TABLE __temp__plastic_production');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220824165253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sector AS SELECT id, name, year, primary_plastic_production_million_tonnes FROM sector');
        $this->addSql('DROP TABLE sector');
        $this->addSql('CREATE TABLE sector (s_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, year INTEGER DEFAULT NULL, primary_plastic_prod BIGINT NOT NULL)');
        $this->addSql('INSERT INTO sector (s_id, name, year, primary_plastic_prod) SELECT id, name, year, primary_plastic_production_million_tonnes FROM __temp__sector');
        $this->addSql('DROP TABLE __temp__sector');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sector AS SELECT s_id, name, year, primary_plastic_prod FROM sector');
        $this->addSql('DROP TABLE sector');
        $this->addSql('CREATE TABLE sector (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, year INTEGER DEFAULT NULL, primary_plastic_production_million_tonnes BIGINT NOT NULL)');
        $this->addSql('INSERT INTO sector (id, name, year, primary_plastic_production_million_tonnes) SELECT s_id, name, year, primary_plastic_prod FROM __temp__sector');
        $this->addSql('DROP TABLE __temp__sector');
    }
}

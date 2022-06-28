<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220628132312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animanga (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, original_title VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, synopsis VARCHAR(255) DEFAULT NULL, note SMALLINT DEFAULT NULL, release_date DATETIME DEFAULT NULL, tomes SMALLINT DEFAULT NULL, episodes SMALLINT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, last_modification DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE animanga');
    }
}

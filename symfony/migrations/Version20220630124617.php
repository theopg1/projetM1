<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630124617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE animanga_genres');
        $this->addSql('ALTER TABLE animanga CHANGE genres genres LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animanga_genres (animanga_id INT NOT NULL, genres_id INT NOT NULL, INDEX IDX_E248168D6A3B2603 (genres_id), INDEX IDX_E248168DA06A4020 (animanga_id), PRIMARY KEY(animanga_id, genres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE animanga_genres ADD CONSTRAINT FK_E248168DA06A4020 FOREIGN KEY (animanga_id) REFERENCES animanga (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animanga_genres ADD CONSTRAINT FK_E248168D6A3B2603 FOREIGN KEY (genres_id) REFERENCES genres (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animanga CHANGE genres genres VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629114242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animanga_genres (animanga_id INT NOT NULL, genres_id INT NOT NULL, INDEX IDX_E248168DA06A4020 (animanga_id), INDEX IDX_E248168D6A3B2603 (genres_id), PRIMARY KEY(animanga_id, genres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animanga_genres ADD CONSTRAINT FK_E248168DA06A4020 FOREIGN KEY (animanga_id) REFERENCES animanga (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animanga_genres ADD CONSTRAINT FK_E248168D6A3B2603 FOREIGN KEY (genres_id) REFERENCES genres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis ADD animanga_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A06A4020 FOREIGN KEY (animanga_id) REFERENCES animanga (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0A76ED395 ON avis (user_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0A06A4020 ON avis (animanga_id)');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) NOT NULL, ADD profile_image VARCHAR(255) DEFAULT NULL, ADD back_image VARCHAR(255) DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL, ADD last_connection VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE animanga_genres');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A76ED395');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A06A4020');
        $this->addSql('DROP INDEX IDX_8F91ABF0A76ED395 ON avis');
        $this->addSql('DROP INDEX IDX_8F91ABF0A06A4020 ON avis');
        $this->addSql('ALTER TABLE avis DROP animanga_id');
        $this->addSql('ALTER TABLE user DROP username, DROP profile_image, DROP back_image, DROP description, DROP last_connection');
    }
}

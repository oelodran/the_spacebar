<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324093512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_389B783989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tag');
        $this->addSql('ALTER TABLE article CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE author author VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image_filename image_filename VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comment CHANGE author_name author_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

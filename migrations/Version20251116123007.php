<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251116123007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(2000) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE article_blogger (article_id INT NOT NULL, blogger_id INT NOT NULL, PRIMARY KEY(article_id, blogger_id))');
        $this->addSql('CREATE INDEX IDX_452B74557294869C ON article_blogger (article_id)');
        $this->addSql('CREATE INDEX IDX_452B7455D700BD1D ON article_blogger (blogger_id)');
        $this->addSql('CREATE TABLE blogger (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE article_blogger ADD CONSTRAINT FK_452B74557294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_blogger ADD CONSTRAINT FK_452B7455D700BD1D FOREIGN KEY (blogger_id) REFERENCES blogger (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE article_blogger DROP CONSTRAINT FK_452B74557294869C');
        $this->addSql('ALTER TABLE article_blogger DROP CONSTRAINT FK_452B7455D700BD1D');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_blogger');
        $this->addSql('DROP TABLE blogger');
    }
}

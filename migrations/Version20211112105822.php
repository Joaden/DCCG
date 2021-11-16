<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112105822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments ADD auteur_id_id INT DEFAULT NULL, ADD article_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A75F8742E FOREIGN KEY (auteur_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A8F3EC46 FOREIGN KEY (article_id_id) REFERENCES articles (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A75F8742E ON comments (auteur_id_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A8F3EC46 ON comments (article_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A75F8742E');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A8F3EC46');
        $this->addSql('DROP INDEX IDX_5F9E962A75F8742E ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962A8F3EC46 ON comments');
        $this->addSql('ALTER TABLE comments DROP auteur_id_id, DROP article_id_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112111952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE is_valid');
        $this->addSql('ALTER TABLE users_address ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE users_address ADD CONSTRAINT FK_FD4E1B4BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD4E1B4BA76ED395 ON users_address (user_id)');
        $this->addSql('ALTER TABLE users_infos ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE users_infos ADD CONSTRAINT FK_9BD2624A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BD2624A76ED395 ON users_infos (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE is_valid (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users_address DROP FOREIGN KEY FK_FD4E1B4BA76ED395');
        $this->addSql('DROP INDEX UNIQ_FD4E1B4BA76ED395 ON users_address');
        $this->addSql('ALTER TABLE users_address DROP user_id');
        $this->addSql('ALTER TABLE users_infos DROP FOREIGN KEY FK_9BD2624A76ED395');
        $this->addSql('DROP INDEX UNIQ_9BD2624A76ED395 ON users_infos');
        $this->addSql('ALTER TABLE users_infos DROP user_id');
    }
}

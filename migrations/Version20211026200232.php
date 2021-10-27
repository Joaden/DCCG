<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026200232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, author VARCHAR(100) NOT NULL, comment LONGTEXT NOT NULL, date DATETIME NOT NULL, approved INT NOT NULL, report INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE follow (id INT AUTO_INCREMENT NOT NULL, followed_id INT NOT NULL, UNIQUE INDEX UNIQ_68344470D956F010 (followed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE follow_users (follow_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_1674F538711D3BC (follow_id), INDEX IDX_1674F5367B3B43D (users_id), PRIMARY KEY(follow_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_articles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE is_valid (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sessions (id INT AUTO_INCREMENT NOT NULL, session_id VARCHAR(255) NOT NULL, date DATETIME NOT NULL, ip INT NOT NULL, user_agent VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unsubscribe (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, comment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_address (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) DEFAULT NULL, cp VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_infos (id INT AUTO_INCREMENT NOT NULL, is_valid TINYINT(1) NOT NULL, birth DATE DEFAULT NULL, date_inscription DATETIME NOT NULL, phone VARCHAR(50) DEFAULT NULL, ip VARCHAR(20) DEFAULT NULL, newsletter TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_68344470D956F010 FOREIGN KEY (followed_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE follow_users ADD CONSTRAINT FK_1674F538711D3BC FOREIGN KEY (follow_id) REFERENCES follow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE follow_users ADD CONSTRAINT FK_1674F5367B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31687B478B1A');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31689D86650F');
        $this->addSql('DROP INDEX IDX_BFDD31689D86650F ON articles');
        $this->addSql('DROP INDEX IDX_BFDD31687B478B1A ON articles');
        $this->addSql('ALTER TABLE articles ADD user_id INT DEFAULT NULL, DROP user_id_id, CHANGE title title VARCHAR(100) NOT NULL, CHANGE author author VARCHAR(50) DEFAULT NULL, CHANGE slug slug VARCHAR(20) DEFAULT NULL, CHANGE categories_id_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_BFDD3168BCF5E72D ON articles (categorie_id)');
        $this->addSql('CREATE INDEX IDX_BFDD3168A76ED395 ON articles (user_id)');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE users DROP created_at, CHANGE phrase phrase VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE follow_users DROP FOREIGN KEY FK_1674F538711D3BC');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE follow');
        $this->addSql('DROP TABLE follow_users');
        $this->addSql('DROP TABLE images_articles');
        $this->addSql('DROP TABLE is_valid');
        $this->addSql('DROP TABLE sessions');
        $this->addSql('DROP TABLE unsubscribe');
        $this->addSql('DROP TABLE users_address');
        $this->addSql('DROP TABLE users_infos');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168BCF5E72D');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168A76ED395');
        $this->addSql('DROP INDEX IDX_BFDD3168BCF5E72D ON articles');
        $this->addSql('DROP INDEX IDX_BFDD3168A76ED395 ON articles');
        $this->addSql('ALTER TABLE articles ADD categories_id_id INT DEFAULT NULL, ADD user_id_id INT NOT NULL, DROP categorie_id, DROP user_id, CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE author author VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31687B478B1A FOREIGN KEY (categories_id_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31689D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_BFDD31689D86650F ON articles (user_id_id)');
        $this->addSql('CREATE INDEX IDX_BFDD31687B478B1A ON articles (categories_id_id)');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE users ADD created_at DATETIME NOT NULL, CHANGE phrase phrase VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

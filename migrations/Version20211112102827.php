<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112102827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE follow_user (follow_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B35425148711D3BC (follow_id), INDEX IDX_B3542514A76ED395 (user_id), PRIMARY KEY(follow_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE follow_user ADD CONSTRAINT FK_B35425148711D3BC FOREIGN KEY (follow_id) REFERENCES follow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE follow_user ADD CONSTRAINT FK_B3542514A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE follow_users');
        $this->addSql('ALTER TABLE follow DROP FOREIGN KEY FK_68344470D956F010');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_68344470D956F010 FOREIGN KEY (followed_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE follow_users (follow_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_1674F5367B3B43D (users_id), INDEX IDX_1674F538711D3BC (follow_id), PRIMARY KEY(follow_id, users_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE follow_users ADD CONSTRAINT FK_1674F5367B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE follow_users ADD CONSTRAINT FK_1674F538711D3BC FOREIGN KEY (follow_id) REFERENCES follow (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE follow_user');
        $this->addSql('ALTER TABLE follow DROP FOREIGN KEY FK_68344470D956F010');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_68344470D956F010 FOREIGN KEY (followed_id) REFERENCES users (id)');
    }
}

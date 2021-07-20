<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704131416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034D024748C');
        $this->addSql('DROP TABLE armor');
        $this->addSql('DROP INDEX UNIQ_937AB034D024748C ON `character`');
        $this->addSql('ALTER TABLE `character` ADD armor VARCHAR(255) NOT NULL, DROP worn_by_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `character` ADD worn_by_id INT NOT NULL, DROP armor');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034D024748C FOREIGN KEY (worn_by_id) REFERENCES armor (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034D024748C ON `character` (worn_by_id)');
    }
}

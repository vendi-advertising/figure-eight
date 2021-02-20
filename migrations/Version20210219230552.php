<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219230552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE container_base (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', name VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE container_client (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE container_folder (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE container_project (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_list (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', container_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', INDEX IDX_377B6C63BC21F742 (container_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE container_client ADD CONSTRAINT FK_DB55EA52BF396750 FOREIGN KEY (id) REFERENCES container_base (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE container_folder ADD CONSTRAINT FK_F0B3E7CABF396750 FOREIGN KEY (id) REFERENCES container_base (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE container_project ADD CONSTRAINT FK_B1CB54A3BF396750 FOREIGN KEY (id) REFERENCES container_base (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_list ADD CONSTRAINT FK_377B6C63BC21F742 FOREIGN KEY (container_id) REFERENCES container_base (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE container_client DROP FOREIGN KEY FK_DB55EA52BF396750');
        $this->addSql('ALTER TABLE container_folder DROP FOREIGN KEY FK_F0B3E7CABF396750');
        $this->addSql('ALTER TABLE container_project DROP FOREIGN KEY FK_B1CB54A3BF396750');
        $this->addSql('ALTER TABLE task_list DROP FOREIGN KEY FK_377B6C63BC21F742');
        $this->addSql('DROP TABLE container_base');
        $this->addSql('DROP TABLE container_client');
        $this->addSql('DROP TABLE container_folder');
        $this->addSql('DROP TABLE container_project');
        $this->addSql('DROP TABLE task_list');
    }
}

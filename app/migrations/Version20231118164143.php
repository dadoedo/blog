<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118164143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE candidate_skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE candidate_skill (id INT NOT NULL, candidate_id INT DEFAULT NULL, skill_id INT DEFAULT NULL, seniority VARCHAR(255) DEFAULT NULL, months_active INT DEFAULT NULL, comment TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_66DD0F8B91BD8781 ON candidate_skill (candidate_id)');
        $this->addSql('CREATE INDEX IDX_66DD0F8B5585C142 ON candidate_skill (skill_id)');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B91BD8781 FOREIGN KEY (candidate_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE skill DROP seniority');
        $this->addSql('ALTER TABLE skill DROP months_active');
        $this->addSql('ALTER TABLE skill DROP comment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE candidate_skill_id_seq CASCADE');
        $this->addSql('ALTER TABLE candidate_skill DROP CONSTRAINT FK_66DD0F8B91BD8781');
        $this->addSql('ALTER TABLE candidate_skill DROP CONSTRAINT FK_66DD0F8B5585C142');
        $this->addSql('DROP TABLE candidate_skill');
        $this->addSql('ALTER TABLE skill ADD seniority VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE skill ADD months_active INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skill ADD comment TEXT DEFAULT NULL');
    }
}

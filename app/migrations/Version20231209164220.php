<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209164220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE candidate_skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE education_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE job_post_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE profession_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE profession_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE candidate_skill (id INT NOT NULL, candidate_id INT DEFAULT NULL, skill_id INT DEFAULT NULL, seniority VARCHAR(255) DEFAULT NULL, months_active INT DEFAULT NULL, comment TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_66DD0F8B91BD8781 ON candidate_skill (candidate_id)');
        $this->addSql('CREATE INDEX IDX_66DD0F8B5585C142 ON candidate_skill (skill_id)');
        $this->addSql('CREATE TABLE education (id INT NOT NULL, institution VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, program VARCHAR(255) DEFAULT NULL, achieved_degree VARCHAR(255) DEFAULT NULL, years_spent INT DEFAULT NULL, comment TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE job_post (id INT NOT NULL, candidate_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, keywords TEXT DEFAULT NULL, content TEXT DEFAULT NULL, published_from TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, published_to TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, priority INT DEFAULT NULL, expected_salary_min INT DEFAULT NULL, expected_salary_max INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DD461ACC91BD8781 ON job_post (candidate_id)');
        $this->addSql('CREATE TABLE profession (id INT NOT NULL, main_category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BA930D69C6C55574 ON profession (main_category_id)');
        $this->addSql('CREATE TABLE profession_profession_category (main_category_id INT NOT NULL, profession_category_id INT NOT NULL, PRIMARY KEY(main_category_id, profession_category_id))');
        $this->addSql('CREATE INDEX IDX_61CB5ED6C6C55574 ON profession_profession_category (main_category_id)');
        $this->addSql('CREATE INDEX IDX_61CB5ED6C5424D6B ON profession_profession_category (profession_category_id)');
        $this->addSql('CREATE TABLE profession_category (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE skill (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, user_type VARCHAR(50) NOT NULL, ico VARCHAR(20) DEFAULT NULL, dic VARCHAR(20) DEFAULT NULL, size VARCHAR(50) DEFAULT NULL, field VARCHAR(100) DEFAULT NULL, interests JSON DEFAULT NULL, date_of_birth DATE DEFAULT NULL, gender VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B91BD8781 FOREIGN KEY (candidate_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job_post ADD CONSTRAINT FK_DD461ACC91BD8781 FOREIGN KEY (candidate_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profession ADD CONSTRAINT FK_BA930D69C6C55574 FOREIGN KEY (main_category_id) REFERENCES profession_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profession_profession_category ADD CONSTRAINT FK_61CB5ED6C6C55574 FOREIGN KEY (main_category_id) REFERENCES profession (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profession_profession_category ADD CONSTRAINT FK_61CB5ED6C5424D6B FOREIGN KEY (profession_category_id) REFERENCES profession_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE candidate_skill_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE education_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE job_post_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE profession_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE profession_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE skill_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, user_type VARCHAR(50) NOT NULL, ico VARCHAR(20) DEFAULT NULL, dic VARCHAR(20) DEFAULT NULL, size VARCHAR(50) DEFAULT NULL, field VARCHAR(100) DEFAULT NULL, interests JSON DEFAULT NULL, date_of_birth DATE DEFAULT NULL, gender VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_1483a5e9f85e0677 ON users (username)');
        $this->addSql('ALTER TABLE candidate_skill DROP CONSTRAINT FK_66DD0F8B91BD8781');
        $this->addSql('ALTER TABLE candidate_skill DROP CONSTRAINT FK_66DD0F8B5585C142');
        $this->addSql('ALTER TABLE job_post DROP CONSTRAINT FK_DD461ACC91BD8781');
        $this->addSql('ALTER TABLE profession DROP CONSTRAINT FK_BA930D69C6C55574');
        $this->addSql('ALTER TABLE profession_profession_category DROP CONSTRAINT FK_61CB5ED6C6C55574');
        $this->addSql('ALTER TABLE profession_profession_category DROP CONSTRAINT FK_61CB5ED6C5424D6B');
        $this->addSql('DROP TABLE candidate_skill');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE job_post');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE profession_profession_category');
        $this->addSql('DROP TABLE profession_category');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

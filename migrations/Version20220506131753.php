<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506131753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE etudiant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE section_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE etudiant (id INT NOT NULL, section_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_717E22E3D823E37A ON etudiant (section_id)');
        $this->addSql('CREATE TABLE section (id INT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3D823E37A FOREIGN KEY (section_id) REFERENCES section (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE etudiant DROP CONSTRAINT FK_717E22E3D823E37A');
        $this->addSql('DROP SEQUENCE etudiant_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE section_id_seq CASCADE');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE section');
    }
}

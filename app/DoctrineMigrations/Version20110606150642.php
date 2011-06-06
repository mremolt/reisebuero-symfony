<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20110606150642 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE reisen CHANGE titel titel VARCHAR(255) NOT NULL, CHANGE preis preis NUMERIC(6, 2) NOT NULL, CHANGE kurzbeschreibung kurzbeschreibung LONGTEXT DEFAULT NULL, CHANGE beschreibung beschreibung LONGTEXT DEFAULT NULL, CHANGE beginn beginn DATE NOT NULL, CHANGE ende ende DATE NOT NULL, CHANGE bild bild VARCHAR(255) DEFAULT NULL, CHANGE thumbnail thumbnail VARCHAR(255) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE reisen CHANGE titel titel VARCHAR(255) DEFAULT NULL, CHANGE preis preis NUMERIC(10, 0) DEFAULT NULL, CHANGE kurzbeschreibung kurzbeschreibung LONGTEXT NOT NULL, CHANGE beschreibung beschreibung LONGTEXT NOT NULL, CHANGE beginn beginn DATE DEFAULT NULL, CHANGE ende ende DATE DEFAULT NULL, CHANGE bild bild VARCHAR(255) NOT NULL, CHANGE thumbnail thumbnail VARCHAR(255) NOT NULL");
    }
}

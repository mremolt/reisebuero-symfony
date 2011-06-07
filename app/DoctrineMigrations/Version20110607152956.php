<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20110607152956 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE buchungen (id INT AUTO_INCREMENT NOT NULL, reise_id INT DEFAULT NULL, anzahl_reisende INT NOT NULL, buchungs_datum DATE NOT NULL, anrede VARCHAR(20) NOT NULL, vorname VARCHAR(45) NOT NULL, name VARCHAR(45) NOT NULL, strasse VARCHAR(80) NOT NULL, ort VARCHAR(80) NOT NULL, plz VARCHAR(5) NOT NULL, telefon_nr VARCHAR(80) DEFAULT NULL, email VARCHAR(80) DEFAULT NULL, INDEX IDX_3B0618A056A8F558 (reise_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE buchungen ADD FOREIGN KEY (reise_id) REFERENCES reisen(id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE buchungen");
    }
}

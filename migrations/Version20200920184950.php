<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200920184950 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE base (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bedrijfsnaam VARCHAR(30) NOT NULL, logo LONGBLOB NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C0B4FE61A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE btw (id INT AUTO_INCREMENT NOT NULL, percentage VARCHAR(5) NOT NULL, omschrijving VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factuur (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, factuur_datum DATETIME NOT NULL, INDEX IDX_32147710A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factuur_regel (id INT AUTO_INCREMENT NOT NULL, factuur_id INT NOT NULL, product_id INT NOT NULL, aantal INT NOT NULL, INDEX IDX_62560F59C35D3E (factuur_id), INDEX IDX_62560F594584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, image_name VARCHAR(20) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C53D045F4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memo (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(30) NOT NULL, content VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_AB4A902AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, btw_id INT DEFAULT NULL, naam VARCHAR(40) NOT NULL, omschrijving VARCHAR(255) NOT NULL, prijs DOUBLE PRECISION NOT NULL, frontpage TINYINT(1) NOT NULL, INDEX IDX_D34A04AD9744CDFA (btw_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(50) NOT NULL, username VARCHAR(20) NOT NULL, roles VARCHAR(20) NOT NULL, password VARCHAR(30) NOT NULL, naw VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base ADD CONSTRAINT FK_C0B4FE61A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE factuur ADD CONSTRAINT FK_32147710A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE factuur_regel ADD CONSTRAINT FK_62560F59C35D3E FOREIGN KEY (factuur_id) REFERENCES factuur (id)');
        $this->addSql('ALTER TABLE factuur_regel ADD CONSTRAINT FK_62560F594584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE memo ADD CONSTRAINT FK_AB4A902AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9744CDFA FOREIGN KEY (btw_id) REFERENCES btw (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9744CDFA');
        $this->addSql('ALTER TABLE factuur_regel DROP FOREIGN KEY FK_62560F59C35D3E');
        $this->addSql('ALTER TABLE factuur_regel DROP FOREIGN KEY FK_62560F594584665A');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4584665A');
        $this->addSql('ALTER TABLE base DROP FOREIGN KEY FK_C0B4FE61A76ED395');
        $this->addSql('ALTER TABLE factuur DROP FOREIGN KEY FK_32147710A76ED395');
        $this->addSql('ALTER TABLE memo DROP FOREIGN KEY FK_AB4A902AA76ED395');
        $this->addSql('DROP TABLE base');
        $this->addSql('DROP TABLE btw');
        $this->addSql('DROP TABLE factuur');
        $this->addSql('DROP TABLE factuur_regel');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE memo');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}

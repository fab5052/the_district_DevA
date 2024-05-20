<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517132759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande RENAME INDEX idx_6eeaa67dfb88e14f TO IDX_979CC42BFB88E14F');
        $this->addSql('ALTER TABLE detail RENAME INDEX idx_2e067f93d73db560 TO IDX_29AA7AA5D73DB560');
        $this->addSql('ALTER TABLE detail RENAME INDEX idx_2e067f9382ea2e54 TO IDX_29AA7AA582EA2E54');
        $this->addSql('ALTER TABLE plat RENAME INDEX idx_2038a207bcf5e72d TO IDX_800A0D39BCF5E72D');
        $this->addSql('ALTER TABLE utilisateur CHANGE is_verified isVerified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Commande RENAME INDEX idx_979cc42bfb88e14f TO IDX_6EEAA67DFB88E14F');
        $this->addSql('ALTER TABLE Detail RENAME INDEX idx_29aa7aa5d73db560 TO IDX_2E067F93D73DB560');
        $this->addSql('ALTER TABLE Detail RENAME INDEX idx_29aa7aa582ea2e54 TO IDX_2E067F9382EA2E54');
        $this->addSql('ALTER TABLE Plat RENAME INDEX idx_800a0d39bcf5e72d TO IDX_2038A207BCF5E72D');
        $this->addSql('ALTER TABLE Utilisateur CHANGE isVerified is_verified TINYINT(1) NOT NULL');
    }
}

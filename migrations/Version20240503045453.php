<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503045453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0ECC306847');
        $this->addSql('DROP INDEX IDX_DF7DFD0ECC306847 ON seance');
        $this->addSql('ALTER TABLE seance DROP timetable_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance ADD timetable_id INT NOT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0ECC306847 FOREIGN KEY (timetable_id) REFERENCES timetable (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0ECC306847 ON seance (timetable_id)');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503044808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE timetable_session (id INT AUTO_INCREMENT NOT NULL, timetable_id INT DEFAULT NULL, seance_id INT NOT NULL, INDEX IDX_51249FAACC306847 (timetable_id), INDEX IDX_51249FAAE3797A94 (seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE timetable_session ADD CONSTRAINT FK_51249FAACC306847 FOREIGN KEY (timetable_id) REFERENCES timetable (id)');
        $this->addSql('ALTER TABLE timetable_session ADD CONSTRAINT FK_51249FAAE3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timetable_session DROP FOREIGN KEY FK_51249FAACC306847');
        $this->addSql('ALTER TABLE timetable_session DROP FOREIGN KEY FK_51249FAAE3797A94');
        $this->addSql('DROP TABLE timetable_session');
    }
}

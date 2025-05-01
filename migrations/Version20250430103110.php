<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430103110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE soutenance ADD etudiant_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (nce)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4D59FF6EDDEAB1A3 ON soutenance (etudiant_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6EDDEAB1A3
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4D59FF6EDDEAB1A3 ON soutenance
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE soutenance DROP etudiant_id
        SQL);
    }
}

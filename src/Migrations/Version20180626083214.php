<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180626083214 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation ADD nature_id INT DEFAULT NULL, ADD lieu_id INT DEFAULT NULL, DROP nature');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849553BCB2E4B FOREIGN KEY (nature_id) REFERENCES nature_deplacement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556AB213CC FOREIGN KEY (lieu_id) REFERENCES stationnement (id)');
        $this->addSql('CREATE INDEX IDX_42C849553BCB2E4B ON reservation (nature_id)');
        $this->addSql('CREATE INDEX IDX_42C849556AB213CC ON reservation (lieu_id)');
        $this->addSql('ALTER TABLE voiture ADD stationnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FA1FE2E78 FOREIGN KEY (stationnement_id) REFERENCES stationnement (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810FA1FE2E78 ON voiture (stationnement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849553BCB2E4B');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556AB213CC');
        $this->addSql('DROP INDEX IDX_42C849553BCB2E4B ON reservation');
        $this->addSql('DROP INDEX IDX_42C849556AB213CC ON reservation');
        $this->addSql('ALTER TABLE reservation ADD nature VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nature_id, DROP lieu_id');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FA1FE2E78');
        $this->addSql('DROP INDEX IDX_E9E2810FA1FE2E78 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP stationnement_id');
    }
}

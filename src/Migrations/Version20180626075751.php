<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180626075751 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nature_deplacement (id INT AUTO_INCREMENT NOT NULL, motif VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, date_debut DATETIME NOT NULL, nature VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, km INT NOT NULL, commentaire VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_utilisateur (reservation_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_D170BEEFB83297E7 (reservation_id), INDEX IDX_D170BEEFFB88E14F (utilisateur_id), PRIMARY KEY(reservation_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stationnement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, immatriculation INT NOT NULL, statut TINYINT(1) NOT NULL, carburant VARCHAR(255) NOT NULL, kilometrage INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_utilisateur ADD CONSTRAINT FK_D170BEEFB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_utilisateur ADD CONSTRAINT FK_D170BEEFFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation_utilisateur DROP FOREIGN KEY FK_D170BEEFB83297E7');
        $this->addSql('ALTER TABLE reservation_utilisateur DROP FOREIGN KEY FK_D170BEEFFB88E14F');
        $this->addSql('DROP TABLE nature_deplacement');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_utilisateur');
        $this->addSql('DROP TABLE stationnement');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE voiture');
    }
}

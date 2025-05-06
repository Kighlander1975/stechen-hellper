<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250506160258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, punkteziel INT NOT NULL, erstellt_am DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE game_player (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, name VARCHAR(255) NOT NULL, reihenfolge INT NOT NULL, INDEX IDX_E52CD7ADE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE round (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, nummer INT NOT NULL, INDEX IDX_C5EEEA34E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE round_entry (id INT AUTO_INCREMENT NOT NULL, round_id INT NOT NULL, game_player_id INT NOT NULL, ansage INT DEFAULT NULL, stiche INT DEFAULT NULL, punkte INT DEFAULT NULL, INDEX IDX_FD528989A6005CA0 (round_id), INDEX IDX_FD5289894B4034DD (game_player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE game_player ADD CONSTRAINT FK_E52CD7ADE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE round ADD CONSTRAINT FK_C5EEEA34E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE round_entry ADD CONSTRAINT FK_FD528989A6005CA0 FOREIGN KEY (round_id) REFERENCES round (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE round_entry ADD CONSTRAINT FK_FD5289894B4034DD FOREIGN KEY (game_player_id) REFERENCES game_player (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE game_player DROP FOREIGN KEY FK_E52CD7ADE48FD905
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE round DROP FOREIGN KEY FK_C5EEEA34E48FD905
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE round_entry DROP FOREIGN KEY FK_FD528989A6005CA0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE round_entry DROP FOREIGN KEY FK_FD5289894B4034DD
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE game
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE game_player
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE round
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE round_entry
        SQL);
    }
}

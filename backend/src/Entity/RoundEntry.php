<?php

namespace App\Entity;

use App\Repository\RoundEntryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundEntryRepository::class)]
class RoundEntry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Round::class, inversedBy: 'roundEntries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Round $round = null;

    #[ORM\ManyToOne(targetEntity: GamePlayer::class, inversedBy: 'roundEntries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GamePlayer $gamePlayer = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $ansage = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $stiche = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $punkte = null;

    // Getter und Setter hier...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnsage(): ?int
    {
        return $this->ansage;
    }

    public function setAnsage(?int $ansage): static
    {
        $this->ansage = $ansage;

        return $this;
    }

    public function getStiche(): ?int
    {
        return $this->stiche;
    }

    public function setStiche(?int $stiche): static
    {
        $this->stiche = $stiche;

        return $this;
    }

    public function getPunkte(): ?int
    {
        return $this->punkte;
    }

    public function setPunkte(?int $punkte): static
    {
        $this->punkte = $punkte;

        return $this;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): static
    {
        $this->round = $round;

        return $this;
    }

    public function getGamePlayer(): ?GamePlayer
    {
        return $this->gamePlayer;
    }

    public function setGamePlayer(?GamePlayer $gamePlayer): static
    {
        $this->gamePlayer = $gamePlayer;

        return $this;
    }
}

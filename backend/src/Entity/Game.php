<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: 'integer')]
    private int $punkteziel;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $erstellt_am;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: GamePlayer::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $gamePlayers;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: Round::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $rounds;

    public function __construct()
    {
        $this->gamePlayers = new ArrayCollection();
        $this->rounds = new ArrayCollection();
        $this->erstellt_am = new \DateTimeImmutable();
    }

    // Getter und Setter hier...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPunkteziel(): ?int
    {
        return $this->punkteziel;
    }

    public function setPunkteziel(int $punkteziel): static
    {
        $this->punkteziel = $punkteziel;

        return $this;
    }

    public function getErstelltAm(): ?\DateTimeImmutable
    {
        return $this->erstellt_am;
    }

    public function setErstelltAm(\DateTimeImmutable $erstellt_am): static
    {
        $this->erstellt_am = $erstellt_am;

        return $this;
    }

    /**
     * @return Collection<int, GamePlayer>
     */
    public function getGamePlayers(): Collection
    {
        return $this->gamePlayers;
    }

    public function addGamePlayer(GamePlayer $gamePlayer): static
    {
        if (!$this->gamePlayers->contains($gamePlayer)) {
            $this->gamePlayers->add($gamePlayer);
            $gamePlayer->setGame($this);
        }

        return $this;
    }

    public function removeGamePlayer(GamePlayer $gamePlayer): static
    {
        if ($this->gamePlayers->removeElement($gamePlayer)) {
            // set the owning side to null (unless already changed)
            if ($gamePlayer->getGame() === $this) {
                $gamePlayer->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Round>
     */
    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function addRound(Round $round): static
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds->add($round);
            $round->setGame($this);
        }

        return $this;
    }

    public function removeRound(Round $round): static
    {
        if ($this->rounds->removeElement($round)) {
            // set the owning side to null (unless already changed)
            if ($round->getGame() === $this) {
                $round->setGame(null);
            }
        }

        return $this;
    }
}

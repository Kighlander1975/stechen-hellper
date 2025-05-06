<?php

namespace App\Entity;

use App\Repository\GamePlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamePlayerRepository::class)]
class GamePlayer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'gamePlayers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    private int $reihenfolge;

    #[ORM\OneToMany(mappedBy: 'gamePlayer', targetEntity: RoundEntry::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $roundEntries;

    public function __construct()
    {
        $this->roundEntries = new ArrayCollection();
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

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getReihenfolge(): ?int
    {
        return $this->reihenfolge;
    }

    public function setReihenfolge(int $reihenfolge): static
    {
        $this->reihenfolge = $reihenfolge;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return Collection<int, RoundEntry>
     */
    public function getRoundEntries(): Collection
    {
        return $this->roundEntries;
    }

    public function addRoundEntry(RoundEntry $roundEntry): static
    {
        if (!$this->roundEntries->contains($roundEntry)) {
            $this->roundEntries->add($roundEntry);
            $roundEntry->setGamePlayer($this);
        }

        return $this;
    }

    public function removeRoundEntry(RoundEntry $roundEntry): static
    {
        if ($this->roundEntries->removeElement($roundEntry)) {
            // set the owning side to null (unless already changed)
            if ($roundEntry->getGamePlayer() === $this) {
                $roundEntry->setGamePlayer(null);
            }
        }

        return $this;
    }
}

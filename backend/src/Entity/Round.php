<?php

namespace App\Entity;

use App\Repository\RoundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundRepository::class)]
class Round
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'rounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game = null;

    #[ORM\Column(type: 'integer')]
    private int $nummer;

    #[ORM\OneToMany(mappedBy: 'round', targetEntity: RoundEntry::class, orphanRemoval: true, cascade: ['persist'])]
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

    public function getNummer(): ?int
    {
        return $this->nummer;
    }

    public function setNummer(int $nummer): static
    {
        $this->nummer = $nummer;

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
            $roundEntry->setRound($this);
        }

        return $this;
    }

    public function removeRoundEntry(RoundEntry $roundEntry): static
    {
        if ($this->roundEntries->removeElement($roundEntry)) {
            // set the owning side to null (unless already changed)
            if ($roundEntry->getRound() === $this) {
                $roundEntry->setRound(null);
            }
        }

        return $this;
    }
}
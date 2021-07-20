<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"character:read"}},
 *     denormalizationContext={"groups"={"character:write"}}
 * )
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("character:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"character:read", "character:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"character:read", "character:write"})
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"character:read", "character:write"})
     */
    private $coatOfArms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"character:read", "character:write"})
     */
    private $portrait;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"character:read", "character:write"})
     */
    private $division;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="played_by")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"character:read", "character:write"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"character:read", "character:write"})
     */
    private $armor;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getCoatOfArms(): ?string
    {
        return $this->coatOfArms;
    }

    public function setCoatOfArms(?string $coatOfArms): self
    {
        $this->coatOfArms = $coatOfArms;

        return $this;
    }

    public function getPortrait(): ?string
    {
        return $this->portrait;
    }

    public function setPortrait(?string $portrait): self
    {
        $this->portrait = $portrait;

        return $this;
    }

    public function getDivision(): ?string
    {
        return $this->division;
    }

    public function setDivision(?string $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getArmor(): ?string
    {
        return $this->armor;
    }

    public function setArmor(string $armor): self
    {
        $this->armor = $armor;

        return $this;
    }
}

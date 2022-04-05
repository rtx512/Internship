<?php

namespace App\Entity;

use App\Dto\CabinetDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="cabinet")
 */
class CabinetEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private string $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CabinetEntity
     */
    public function setName(string $name): CabinetEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return CabinetDto
     */
    public function toDto(): CabinetDto
    {
        $dto = new CabinetDto();
        $dto->id = $this->getId();
        $dto->name = $this->getName();
        return $dto;
    }
}
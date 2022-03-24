<?php

namespace App\Entity;

use App\Dto\GroupDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="groups")
 */
class GroupEntity
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
     * @return GroupEntity
     */
    public function setName(string $name): GroupEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return GroupDto
     */
    public function toDto(): GroupDto
    {
        $dto = new GroupDto();
        $dto->id = $this->getId();
        $dto->name = $this->getName();
        return $dto;
    }
}
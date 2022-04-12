<?php

namespace App\Entity;

use App\Dto\IdNameDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="subject")
 */
class SubjectEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column (name="name", type="string")
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
     * @return SubjectEntity
     */
    public function setName(string $name): SubjectEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return IdNameDto
     */
    public function toDto(): IdNameDto
    {
        $dto = new IdNameDto();
        $dto->id = $this->getId();
        $dto->name = $this->getName();
        return $dto;
    }
}
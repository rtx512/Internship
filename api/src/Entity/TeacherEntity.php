<?php

namespace App\Entity;

use App\Dto\TeacherDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="teacher")
 */
class TeacherEntity
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
     * @return TeacherEntity
     */
    public function setName(string $name): TeacherEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return TeacherDto
     */
    public function toDto(): TeacherDto
    {
        $dto = new TeacherDto();
        $dto->id = $this->getId();
        $dto->name = $this->getName();
        return $dto;
    }
}
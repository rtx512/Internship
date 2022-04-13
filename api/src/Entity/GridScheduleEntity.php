<?php

namespace App\Entity;


use App\Dto\CellDto;
use App\Dto\GridScheduleDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="schedule")
 */
class GridScheduleEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="date", type="string")
     */
    private string $date;

    /**
     * @ORM\ManyToOne(targetEntity="CabinetEntity")
     * @ORM\JoinColumn(name="cabinet_id", referencedColumnName="id")
     */
    private CabinetEntity $cabinet;

    /**
     * @ORM\ManyToOne(targetEntity="GroupEntity")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private GroupEntity $group;

    /**
     * @ORM\ManyToOne(targetEntity="SubjectEntity")
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="id")
     */
    private SubjectEntity $subject;

    /**
     * @ORM\ManyToOne(targetEntity="TeacherEntity")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     */
    private TeacherEntity $teacher;

    /**
     * @ORM\ManyToOne(targetEntity="TimeEntity")
     * @ORM\JoinColumn(name="time_id", referencedColumnName="id")
     */
    private TimeEntity $time;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return CabinetEntity
     */
    public function getCabinet(): CabinetEntity
    {
        return $this->cabinet;
    }

    /**
     * @param CabinetEntity $cabinet
     * @return GridScheduleEntity
     */
    public function setCabinet(CabinetEntity $cabinet): GridScheduleEntity
    {
        $this->cabinet = $cabinet;
        return $this;
    }

    /**
     * @return GroupEntity
     */
    public function getGroup(): GroupEntity
    {
        return $this->group;
    }

    /**
     * @param GroupEntity $group
     * @return GridScheduleEntity
     */
    public function setGroup(GroupEntity $group): GridScheduleEntity
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return SubjectEntity
     */
    public function getSubject(): SubjectEntity
    {
        return $this->subject;
    }

    /**
     * @param SubjectEntity $subject
     * @return GridScheduleEntity
     */
    public function setSubject(SubjectEntity $subject): GridScheduleEntity
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return TeacherEntity
     */
    public function getTeacher(): TeacherEntity
    {
        return $this->teacher;
    }

    /**
     * @param TeacherEntity $teacher
     * @return GridScheduleEntity
     */
    public function setTeacher(TeacherEntity $teacher): GridScheduleEntity
    {
        $this->teacher = $teacher;
        return $this;
    }

    /**
     * @return TimeEntity
     */
    public function getTime(): TimeEntity
    {
        return $this->time;
    }

    /**
     * @param TimeEntity $time
     * @return GridScheduleEntity
     */
    public function setTime(TimeEntity $time): GridScheduleEntity
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return GridScheduleEntity
     */
    public function setDate(string $date): GridScheduleEntity
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return GridScheduleDto
     */
    public function toDto(): GridScheduleDto
    {
        $dto = new GridScheduleDto();
        $dto->id = $this->getId();
        $dto->date = $this->getDate();

        if (date("w", strtotime($this->getDate())) == 0) {
            $dto->day = 7;
        } else {
            $dto->day = date("w", strtotime($this->getDate()));
        }

        $dto->cabinet = $this->getCabinet()->toDto();
        $dto->group = $this->getGroup()->toDto();
        $dto->subject = $this->getSubject()->toDto();
        $dto->teacher = $this->getTeacher()->toDto();
        $dto->time = $this->getTime()->toDto();
        return $dto;
    }

    /**
     * @return CellDto
     */
    public function toCellDto(): CellDto
    {
        $dto = new CellDto();
        $dto->id = $this->getId();
        $dto->date = $this->getDate();
        $dto->cabinet = $this->getCabinet()->toDto();
        $dto->group = $this->getGroup()->toDto();
        $dto->subject = $this->getSubject()->toDto();
        $dto->teacher = $this->getTeacher()->toDto();
        return $dto;
    }
}


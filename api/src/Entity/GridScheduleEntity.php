<?php

namespace App\Entity;


use App\Dto\GridScheduleDto;
use Cassandra\Date;
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
    private CabinetEntity $cabinetID;

    /**
     * @ORM\ManyToOne(targetEntity="GroupEntity")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private GroupEntity $groupID;

    /**
     * @ORM\ManyToOne(targetEntity="SubjectEntity")
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="id")
     */
    private SubjectEntity $subjectID;

    /**
     * @ORM\ManyToOne(targetEntity="TeacherEntity")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     */
    private TeacherEntity $teacherID;

    /**
     * @ORM\ManyToOne(targetEntity="TimeEntity")
     * @ORM\JoinColumn(name="time_id", referencedColumnName="id")
     */
    private TimeEntity $timeID;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return GroupEntity
     */
    public function getGroupID(): GroupEntity
    {
        return $this->groupID;
    }

    /**
     * @return CabinetEntity
     */
    public function getCabinetID(): CabinetEntity
    {
        return $this->cabinetID;
    }

    /**
     * @return SubjectEntity
     */
    public function getSubjectID(): SubjectEntity
    {
        return $this->subjectID;
    }

    /**
     * @return TeacherEntity
     */
    public function getTeacherID(): TeacherEntity
    {
        return $this->teacherID;
    }

    /**
     * @return TimeEntity
     */
    public function getTimeID(): TimeEntity
    {
        return $this->timeID;
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
     * @param GroupEntity $groupID
     * @return GridScheduleEntity
     */
    public function setGroupID(GroupEntity $groupID): GridScheduleEntity
    {
        $this->groupID = $groupID;
        return $this;
    }

    /**
     * @param CabinetEntity $cabinetID
     * @return GridScheduleEntity
     */
    public function setCabinetID(CabinetEntity $cabinetID): GridScheduleEntity
    {
        $this->cabinetID = $cabinetID;
        return $this;
    }

    /**
     * @param SubjectEntity $subjectID
     * @return GridScheduleEntity
     */
    public function setSubjectID(SubjectEntity $subjectID): GridScheduleEntity
    {
        $this->subjectID = $subjectID;
        return $this;
    }

    /**
     * @param TeacherEntity $teacherID
     * @return GridScheduleEntity
     */
    public function setTeacherID(TeacherEntity $teacherID): GridScheduleEntity
    {
        $this->teacherID = $teacherID;
        return $this;
    }

    /**
     * @param TimeEntity $timeID
     * @return GridScheduleEntity
     */
    public function setTimeID(TimeEntity $timeID): GridScheduleEntity
    {
        $this->timeID = $timeID;
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
        $dto->day = date("w", strtotime($this->getDate()));
        $dto->cabinetID = $this->getCabinetID()->toDto();
        $dto->groupID = $this->getGroupID()->toDto();
        $dto->subjectID = $this->getSubjectID()->toDto();
        $dto->teacherID = $this->getTeacherID()->toDto();
        $dto->timeID = $this->getTimeID()->toDto();
        return $dto;
    }
}


<?php

namespace App\Service;

use App\Dto\IdNameDto;
use App\Entity\GroupEntity;
use App\Entity\TeacherEntity;
use App\Entity\TimeEntity;
use App\Entity\SubjectEntity;
use App\Entity\CabinetEntity;
use Doctrine\ORM\EntityManagerInterface;

class MainService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getGroups(): array
    {
        $groups = $this->entityManager->getRepository(GroupEntity::class)
            ->findAll();

        $groupDtos = [];
        /** @var GroupEntity $group */
        foreach ($groups as $group) {
            $groupDtos[] = $group->toDto();
        }
        return $groupDtos;
    }

    public function getTeachers(): array
    {
        $teachers = $this->entityManager->getRepository(TeacherEntity::class)->findAll();

        $teacherDtos = [];
        /** @var TeacherEntity $teacher */
        foreach ($teachers as $teacher) {
            $teacherDtos[] = $teacher->toDto();
        }
        return $teacherDtos;
    }

    /**
     * @return IdNameDto[]
     */
    public function getTimes(): array
    {
        $times = $this->entityManager->getRepository(TimeEntity::class)->findAll();

        $timeDtos = [];
        /** @var TimeEntity $time */
        foreach ($times as $time) {
            $timeDtos[] = $time->toDto();
        }
        return $timeDtos;
    }

    /**
     * @return array
     */
    public function getSubjects(): array
    {
        $subjects = $this->entityManager->getRepository(SubjectEntity::class)->findAll();

        $subjectDtos = [];
        /** @var SubjectEntity $subject */
        foreach ($subjects as $subject) {
            $subjectDtos[] = $subject->toDto();
        }
        return $subjectDtos;
    }

    /**
     * @return array
     */
    public function getCabinets(): array
    {
        $cabinets = $this->entityManager->getRepository(CabinetEntity::class)->findAll();

        $cabinetDtos = [];
        /** @var CabinetEntity $cabinet */
        foreach ($cabinets as $cabinet) {
            $cabinetDtos[] = $cabinet->toDto();
        }
        return $cabinetDtos;
    }
}
<?php

namespace App\Service;

use App\Entity\GroupEntity;
use App\Entity\TeacherEntity;
use App\Entity\TimeEntity;
use App\Entity\SubjectEntity;
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
    public function getTeacher(): array
    {
        $teacher = $this->entityManager->getRepository(TeacherEntity::class)->findAll();

        $teacherDot=[];
        /** @var TeacherEntity $teach */
        foreach ($teacher as $teach)
        {
            $teacherDot[]=$teach->toDto();
        }
        return $teacherDot;
    }

    public function getTime(): array
    {
        $times = $this->entityManager->getRepository(TimeEntity::class)->findAll();

        $timeDot=[];
        /** @var TimeEntity $time */
        foreach ($times as $time)
        {
            $timeDot[] = $time->toDto();
        }
        return $timeDot;
    }

    public function getSubject(): array
    {
        $subjects = $this->entityManager->getRepository(SubjectEntity::class)->findAll();

        $subjectDot = [];
        /** @var SubjectEntity $subject */
        foreach ($subjects as $subject)
        {
            $subjectDot[] = $subject->toDto();
        }
        return $subjectDot;
    }
}
<?php

namespace App\Service;

use App\Entity\CabinetEntity;
use App\Entity\GridScheduleEntity;
use App\Entity\GroupEntity;
use App\Entity\SubjectEntity;
use App\Entity\TeacherEntity;
use App\Entity\TimeEntity;
use Doctrine\ORM\EntityManagerInterface;

class GridScheduleService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getSchedule():array
    {
        $items = $this->entityManager->getRepository(GridScheduleEntity::class)
            ->findAll();

        $itemDto = [];
        /** @var GridScheduleEntity $item */
        foreach ($items as $item)
        {
            $itemDto[] = $item->toDto();
        }

        /*$arr = [];
        for ($i = 0; $i<count($itemDto);$i++)
        {

        }*/

        return $itemDto;
    }

    public function setSchedule($post)
    {
        $Schedule = new GridScheduleEntity();

        $group = $this->entityManager->getRepository(GroupEntity::class)->find($post['groupsID']);
        $Schedule->setGroupID($group);

        $subject = $this->entityManager->getRepository(SubjectEntity::class)->find($post['subjectID']);
        $Schedule->setSubjectID($subject);

        $cabinet = $this->entityManager->getRepository(CabinetEntity::class)->find($post['cabinetID']);
        $Schedule->setCabinetID($cabinet);

        $teacher = $this->entityManager->getRepository(TeacherEntity::class)->find($post['teacherID']);
        $Schedule->setTeacherID($teacher);

        $time = $this->entityManager->getRepository(TimeEntity::class)->find($post['timeID']);
        $Schedule->setTimeID($time);

        $Schedule->setDate($post['date']);
        return $Schedule;
    }
}
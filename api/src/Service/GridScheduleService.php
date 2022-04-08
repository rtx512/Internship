<?php

namespace App\Service;

use App\Dto\CellDto;
use App\Dto\GridScheduleDto;
use App\Dto\RowDto;
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

    public function getSchedule($groupId,$date):array
    {
        $items = $this->entityManager->createQueryBuilder()
            ->select('s')
            ->from(GridScheduleEntity::class, 's')
            ->where('s.group = :groupId')
            ->setParameter('groupId', $groupId)
            ->getQuery()
            ->getResult();

        $dateStart = date(
            'Y.m.d',
            strtotime($date),
        );
        $dateNext = date(
            'Y.m.d',
            strtotime('+7 days', strtotime($date)),
        );

        $itemDto = [];
        /** @var GridScheduleEntity $item */
        foreach ($items as $item)
        {
            $item = $item->toDto();
            $itemDate = date(
                'Y.m.d',
                strtotime($item->date)
            );
            if (($itemDate >= $dateStart) && ($itemDate < $dateNext)){
                $itemDto[] = $item;
            }
        }

        $times = $this->entityManager->getRepository(TimeEntity::class)
            ->findAll();

        $result = [];
        /** @var TimeEntity $time */
        foreach ($times as $time)
        {
            $rowDto = new RowDto();
            $rowDto->time = $time->toDto();
            $rowDto->days = [
                0 => null,
                1 => null,
                2 => null,
                3 => null,
                4 => null,
                5 => null,
                6 => null,
                7=> null,
            ];
            $result[$time->getId()] = $rowDto;
        }

        $itemCellDto = [];
        /** @var GridScheduleEntity $item */
        foreach ($items as $item)
        {
            $item = $item->toCellDto();
            $itemDate = date(
                'Y.m.d',
                strtotime($item->date)
            );
            if (($itemDate >= $dateStart) && ($itemDate < $dateNext)){
                $itemCellDto[] = $item;
            }
        }
        //print_r($itemCellDto);
        //print_r($itemDto);
        //print_r('Hello');
        //var_dump($result);
        $i = 0;
        foreach ($itemCellDto as $item){
            $result[($itemDto[$i]->time->id)]->days[$itemDto[$i]->day] = $item;
            $i += 1;
        }
        return array_values($result);
    }

    public function setSchedule($post)
    {
        $schedule = new GridScheduleEntity();

        $group = $this->entityManager->getRepository(GroupEntity::class)->find($post['groupsId']);
        $schedule->setGroup($group);

        $subject = $this->entityManager->getRepository(SubjectEntity::class)->find($post['subjectId']);
        $schedule->setSubject($subject);

        $cabinet = $this->entityManager->getRepository(CabinetEntity::class)->find($post['cabinetId']);
        $schedule->setCabinet($cabinet);

        $teacher = $this->entityManager->getRepository(TeacherEntity::class)->find($post['teacherId']);
        $schedule->setTeacher($teacher);

        $time = $this->entityManager->getRepository(TimeEntity::class)->find($post['timeId']);
        $schedule->setTime($time);

        $schedule->setDate($post['date']);
        return $schedule;
    }

}
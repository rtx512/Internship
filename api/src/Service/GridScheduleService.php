<?php

namespace App\Service;

use App\Dto\RowDto;
use App\Entity\CabinetEntity;
use App\Entity\GridScheduleEntity;
use App\Entity\GroupEntity;
use App\Entity\SubjectEntity;
use App\Entity\TeacherEntity;
use App\Entity\TimeEntity;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class GridScheduleService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $groupId
     * @param string $date
     * @return array
     */
    public function getSchedule(int $groupId, string $date): array
    {
        $dateStart = date(
            'Y.m.d',
            strtotime($date),
        );
        $dateEnd = date(
            'Y.m.d',
            strtotime('+7 days', strtotime($date)),
        );

        $items = $this->entityManager->createQueryBuilder()
            ->select('s')
            ->from(GridScheduleEntity::class, 's')
            ->where('s.group = :groupId')
            ->andWhere('s.date >= :startDate')
            ->andWhere('s.date < :endDate')
            ->setParameter('groupId', $groupId)
            ->setParameter('startDate', $dateStart)
            ->setParameter('endDate', $dateEnd)
            ->getQuery()
            ->getResult();

        $itemDtos = [];
        /** @var GridScheduleEntity $item */
        foreach ($items as $item) {
            $itemDtos[] = $item->toDto();
        }

        $times = $this->entityManager->getRepository(TimeEntity::class)
            ->findAll();

        $result = [];
        /** @var TimeEntity $time */
        foreach ($times as $time) {
            $rowDto = new RowDto();
            $rowDto->time = $time->toDto();
            $rowDto->days = [
                0 => "Hello",
                1 => null,
                2 => null,
                3 => null,
                4 => null,
                5 => null,
                6 => null,
                7 => null,
            ];
            $result[$time->getId()] = $rowDto;
        }

        $itemCellDtos = [];
        /** @var GridScheduleEntity $item */
        foreach ($items as $item) {
            $itemCellDtos[] = $item->toCellDto();
        }
        $i = 0;
        foreach ($itemCellDtos as $itemCellDto) {
            $result[($itemDtos[$i]->time->id)]->days[$itemDtos[$i]->day] = $itemCellDto;
            $i += 1;
        }
        return array_values($result);
    }

    /**
     * @param array $post
     * @return void
     * @throws \Exception
     */
    public function saveSchedule(array $post)
    {
        $this->entityManager->beginTransaction();
        try {
            $this->setSchedule($post);
            if (array_key_exists('isRepeatable', $post)) {
                for ($i = 1; $i < $post['manyCouples']; $i++) {
                    if ($post['period'] == 2) {
                        $post['date'] = date(
                            'd.m.Y',
                            strtotime('+14 day', strtotime($post['date']))
                        );
                    } else {
                        $post['date'] = date(
                            'd.m.Y',
                            strtotime('+7 day', strtotime($post['date']))
                        );
                    }
                    $this->setSchedule($post);
                }
            }
            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $exception) {
            $this->entityManager->rollback();
            throw new \Exception('Ошибка при сохранении!');
        }
    }

    /**
     * @param array $post
     * @return void
     */
    public function setSchedule(array $post)
    {
        if (isset($post['id'])) {
            $schedule = $this->entityManager->getRepository(GridScheduleEntity::class)->find($post['id']);
        } else {
            $schedule = new GridScheduleEntity();
        }

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

        $this->entityManager->persist($schedule);
        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteSchedule(int $id)
    {
        $para = $this->entityManager->getRepository(GridScheduleEntity::class)->find($id);
        $this->entityManager->remove($para);
        $this->entityManager->flush();
    }

    public function printSchedule(int $groupId, string $date)
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates/my');
        $twig = new Environment($loader);
        $template = $twig->load('test.html.twig');
        $schedule = $this->getSchedule($groupId, $date);
        $html = $template->render(['schedule' => $schedule]);

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4');
        $dompdf->render();
        //$dompdf->stream("schedule.pdf");
        $dompdf->stream("schedule.pdf", [
            "Attachment" => false
        ]);
    }
}
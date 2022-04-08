<?php

namespace App\Controller;

use App\Entity\GridScheduleEntity;
use App\Service\GridScheduleService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GridScheduleController extends AbstractController
{
    private GridScheduleService $gridScheduleService;

    public function __construct(GridScheduleService $gridScheduleService)
    {
        $this->gridScheduleService = $gridScheduleService;
    }

    /**
     * @Route("Grid/getSchedule")
     */
    public function getSchedule(Request $request): Response
    {
        $groupId = $request->get('groupId');
        $date = $request->get('date');
        $schedule = $this->gridScheduleService->getSchedule($groupId,$date);
        return new JsonResponse($schedule);
    }

    /**
     * @Route("Grid/setSchedule")
     */
    public function setSchedule(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $schedule = $this->gridScheduleService->setSchedule($_POST);
        $entityManager->persist($schedule);
        $entityManager->flush();

        if (array_key_exists("undefined",$_POST))
        {
            for ($i = 1; $i < $_POST['manyCouples'];$i++)
            {
                if ($_POST['period'] == 2)
                {
                    $_POST['date'] = date(
                        'd.m.Y',
                        strtotime('+14 day', strtotime($_POST['date']))
                    );
                }
                else
                {
                    $_POST['date'] = date(
                        'd.m.Y',
                        strtotime('+7 day', strtotime($_POST['date']))
                    );
                }

                $schedule = $this->gridScheduleService->setSchedule($_POST);
                $entityManager->persist($schedule);
                $entityManager->flush();
            }
        }
        return new JsonResponse($schedule->getDate());
    }

    /**
     * @Route ("Grid/deleteSchedule")
     */
    public function deleteSchedule(Request $request):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $para = $entityManager->getRepository(GridScheduleEntity::class)->find($request->get('id'));
        $entityManager->remove($para);
        $entityManager->flush();
        return new JsonResponse('Ok');
    }

}
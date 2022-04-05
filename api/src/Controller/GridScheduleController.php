<?php

namespace App\Controller;

use App\Service\GridScheduleService;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function getSchedule(): Response
    {
        $Schedule = $this->gridScheduleService->getSchedule();
        return new JsonResponse($Schedule);
    }

    /**
     * @Route("Grid/setSchedule")
     */
    public function setSchedule(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Schedule = $this->gridScheduleService->setSchedule($_POST);
        $entityManager->persist($Schedule);
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

                $Schedule = $this->gridScheduleService->setSchedule($_POST);
                $entityManager->persist($Schedule);
                $entityManager->flush();
            }
        }
        return new JsonResponse($Schedule->getDate());
    }

}
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
        $schedule = $this->gridScheduleService->getSchedule($groupId, $date);
        return new JsonResponse($schedule);
    }

    /**
     * @Route("Grid/setSchedule")
     */
    public function setSchedule(Request $request): Response
    {
        try {
            $this->gridScheduleService->saveSchedule($_POST);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
        return new JsonResponse([
            'success' => true,
            'message' => 'Сохранение прошло успешно!'
        ], 200);
    }

    /**
     * @Route ("Grid/deleteSchedule")
     */
    public function deleteSchedule(Request $request): Response
    {
        try {
            $this->gridScheduleService->deleteSchedule($request->get('id'));
        } catch (\Exception $exception) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
        return new JsonResponse([
            'success' => true,
            'message' => 'Удаление прошло успешно!'
        ], 200);
    }

    /**
     * @Route ("Grid/updateSchedule")
     */
    public function updateSchedule(Request $request): Response
    {
        try {
            $this->gridScheduleService->setSchedule($_POST);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
        return new JsonResponse([
            'success' => true,
            'message' => 'Изменение прошло успешно!'
        ], 200);
    }

    /**
     * @Route("Grid/printSchedule")
     */
    public function printSchedule()
    {
        $this->gridScheduleService->printSchedule();
    }
}
<?php

namespace App\Controller;

use App\Service\MainService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends AbstractController
{
    private MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    /**
     * @Route("List/getSubjects")
     */
    public function getSubject():Response
    {
        $Subjects = $this->mainService->getSubject();
        return new JsonResponse($Subjects);
    }

    /**
     * @Route("List/getGroups")
     */
    public function getGroups(): Response
    {
        $Groups = $this->mainService->getGroups();
        return new JsonResponse($Groups);
    }

    /**
     * @Route("List/getTeachers")
     */
    public function getTeachers(): Response
    {
        $Teachers = $this->mainService->getTeacher();
        return new JsonResponse($Teachers);
    }

    /**
     * @Route("List/getTimes")
     */
    public function getTimes(): Response
    {
        $Times = $this->mainService->getTime();
        return new JsonResponse($Times);
    }
}
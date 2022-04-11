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
        $Subjects = $this->mainService->getSubjects();
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
        $Teachers = $this->mainService->getTeachers();
        return new JsonResponse($Teachers);
    }

    /**
     * @Route("List/getTimes")
     */
    public function getTimes(): Response
    {
        $times = $this->mainService->getTimes();
        return new JsonResponse($times);
    }

    /**
     * @Route("List/getCabinet")
     */
    public function getCabinet(): Response
    {
        $Cabinet = $this->mainService->getCabinets();
        return new JsonResponse($Cabinet);
    }

}
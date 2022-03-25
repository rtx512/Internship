<?php

namespace App\Controller;

use App\Entity\SubjectEntity;
use App\Service\MainService;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class ListController extends AbstractController
{
    private MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    /**
     * @Route ("GET/getSubjects")
     */
    public function getSubject():Response
    {
        $Subjects = $this->mainService->getSubject();
        return new JsonResponse($Subjects);
    }

    /**
     * @Route ("GET/getGroups")
     */
    public function getGroups(): Response
    {
        $Groups = $this->mainService->getGroups();
        return new JsonResponse($Groups);
    }

    /**
     * @Route ("GET/getTeachers")
     */
    public function getTeachers(): Response
    {
        $Teachers = $this->mainService->getTeacher();
        return new JsonResponse($Teachers);
    }

    /**
     * @Route ("GET/getTimes")
     */
    public function getTimes(): Response
    {
        $Times = $this->mainService->getTime();
        return new JsonResponse($Times);
    }
}
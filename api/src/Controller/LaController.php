<?php

namespace App\Controller;

use App\Dto\GroupDto;
use App\Entity\GroupEntity;
use App\Service\MainService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;


class LaController extends AbstractController
{
    private MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    /**
     * @Route("Controller/download", name = "Controller_test")
     */
    public function download()
    {
        $file = $this->file('Controller/qwer.png');

        return $this->file($file);
    }

    /**
     * @Route("test")
     */
    function test():Response
    {
        $My = $this->mainService->getGroups();
        print_r($My[0]->name);
        return new JsonResponse($My);
    }
}
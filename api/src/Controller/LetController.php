<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LetController extends AbstractController
{
    /**
     * @Route ("Controller/my", name = "Controller_my")
     */
    function my()
    {
        return $this->redirect('https://symfony.ru/doc/current/controller.html');
    }
}
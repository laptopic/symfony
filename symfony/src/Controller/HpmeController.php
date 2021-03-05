<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HpmeController extends AbstractController
{
    /**
     * @Route("/hpme", name="hpme")
     */
    public function index(): Response
    {
        return $this->render('hpme/index.html.twig', [
            'controller_name' => 'HpmeController',
        ]);
    }
}

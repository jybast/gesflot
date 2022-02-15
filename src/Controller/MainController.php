<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('main/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}

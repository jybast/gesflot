<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/manager', name: 'manager_')]
class ManagerController extends AbstractController
{
    #[IsGranted('ROLE_MANAGER')]
    #[Route('/', name: 'dashboard')]
    public function dashboard(): Response
    {
        return $this->render('manager/dashboard.html.twig', [
            'controller_name' => 'ManagerController',
        ]);
    }
}

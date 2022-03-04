<?php

namespace App\Controller;

use App\Entity\Vehicule;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/driver', name: 'driver_')]
class DriverController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/', name: 'dashboard')]
    public function dashboard(): Response
    {
        if (null !== $this->getUser()) {
            $driver = $this->getUser();
        } else {
            $driver = 'John DOE';
        }



        $totalDistance = 0;
        $distanceMonth = 0;
        $drivingLicenceTypes = 0;
        $claims = 0;
        $lastClaim = 0;


        return $this->render('driver/dashboard.html.twig', [
            'driver' => $driver,
            'totalDistance' => $totalDistance,
            'distanceMonth' => $distanceMonth,
            'drivingLicenceTypes' => $drivingLicenceTypes,
            'claims' => $claims,
            'lastClaim' => $lastClaim
        ]);
    }
}

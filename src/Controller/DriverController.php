<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Conduire;
use App\Entity\Vehicule;
use App\Repository\ConduireRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/driver', name: 'driver_')]
class DriverController extends AbstractController
{

    #[IsGranted('ROLE_USER')]
    #[Route('/', name: 'dashboard')]
    public function dashboard(ManagerRegistry $doctrine, UserRepository $userRepository, ConduireRepository $conduireRepository): Response
    {
        // get the User
        if (null !== $this->getUser()) {
            $driver = $this->getUser();
        } else {
            $driver = 'John DOE';
        }
        // Get vehicles and logbooks
        $vehicules = $doctrine->getRepository(Vehicule::class)->findAll();
        // logbook du conducteur
        $trajets = $conduireRepository->findLogbooksByDriver($driver);

        // Calcul des km par année
        $nbTrajetsByYear = $conduireRepository->countByYear($driver);
        foreach ($nbTrajetsByYear as $nb) {
            $years[] = $nb['years'];
            $km[] = $nb['km'];
            $count[] = $nb['count'];
        }
        // Utilisation des véhicules
        $vehByDriver = $conduireRepository->VehicleUsePerDriver($driver);
        foreach ($vehByDriver as $vh) {
            $marque[] = $vh['d1_marque'];
            $nbr[] = $vh['count'];
        }


        return $this->render('driver/dashboard.html.twig', [
            'driver' => $driver,
            'vehicules' => $vehicules,
            'trajets' => $trajets,
            //'distances' => $distances,
            //'totalDistance' => $totalDistance,
            'years' => json_encode($years),
            'km' => json_encode($km),
            'nb' => json_encode($count),
            'marque' => json_encode($marque),
            'nbr' => json_encode($nbr),


        ]);
    }
}

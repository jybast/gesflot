<?php

namespace App\Controller;

use App\Entity\Conduire;

use App\Entity\Vehicule;
use App\Form\ConduireType;

use App\Repository\ConduireRepository;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/logbook', name: 'logbook_')]
class ConduireController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ConduireRepository $conduireRepository): Response
    {
        // récupère tous les lignes de trajets
        $books = $conduireRepository->findAll();
        // récupère les ID des véhicules
        foreach ($books as $veh) {
            $v[] = $veh->getVehicule()->getID();
        }

        dd($books);

        return $this->render('logbook/index.html.twig', [
            'conduires' => $books,


        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $conduire = new Conduire();
        $form = $this->createForm(ConduireType::class, $conduire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($conduire);
            $entityManager->flush();

            return $this->redirectToRoute('logbook_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('logbook/new.html.twig', [
            'conduire' => $conduire,
            'form' => $form,
        ]);
    }

    #[Route('/{vehicule}', name: 'show', methods: ['GET'])]
    public function show(Conduire $conduire, VehiculeRepository $vehiculeRepository, Request $request): Response
    {

        $vehicules = $vehiculeRepository->findAll();
        //dd($data);
        return $this->render('logbook/show.html.twig', [
            'conduire' => $conduire,
            'vehicules' => $vehicules

        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Conduire $conduire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConduireType::class, $conduire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('logbook_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('logbook/edit.html.twig', [
            'conduire' => $conduire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Conduire $conduire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $conduire->getId(), $request->request->get('_token'))) {
            $entityManager->remove($conduire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('logbook_index', [], Response::HTTP_SEE_OTHER);
    }
}

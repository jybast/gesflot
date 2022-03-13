<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\VehiculeRepository;
use App\Service\SendMailService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;

class MainController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(TranslatorInterface $translator): Response
    {
        return $this->render('main/home.html.twig', []);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(SendMailService $mailerService, Request $request, TranslatorInterface $translator): Response
    {
        // set form contact
        $form = $this->createForm(ContactType::class);

        // Handle form
        $contact = $form->handleRequest($request);
        $token = $request->attributes->get('token');

        // operates with datas
        if ($form->isSubmitted() && $form->isValid()) {
            // prepare context of the mail       

            $context = [
                'mail' => $contact->get('email')->getData(),
                'sujet' => $contact->get('sujet')->getData(),
                'message' => $contact->get('message')->getData(),
            ];

            try {
                // create email with template
                $mailerService->send(
                    $contact->get('email')->getData(),
                    'Gesflot@domaine.fr',
                    'Contact depuis le site Gesflot',
                    'email-contact',
                    $context,
                    'image'
                );
            } catch (TransportExceptionInterface $e) {
                // confirm and redirect
                $this->addFlash('error', $translator->trans('Your mail was not sent successfully'));
            }

            // confirm and redirect
            $this->addFlash('message', $translator->trans('Your mail was sent successfully'));

            // return on route
            return $this->redirectToRoute('app_home');
        }

        return $this->render('main/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(TranslatorInterface $translator): Response
    {
        return $this->render('main/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /*
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(TranslatorInterface $translator, VehiculeRepository $vehRepo): Response
    {
        // nombre de véhicules
        $vehicules = $vehRepo->findAll();
        $go = $vehRepo->findByEnergie('GO');
        $es = $vehRepo->findByEnergie('ES');
        // age des vehicules
        // kilomètres parcourus 
        // carburant 
        // échéances controles techniques, assurances


        return $this->render('main/dashboard.html.twig', [
            'vehicules' => $vehicules,
            'go' => $go,
            'es' => $es,

        ]);
    }
    */
}

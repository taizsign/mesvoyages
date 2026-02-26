<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VoyagesController extends AbstractController
{
    #[Route('/voyages', name: 'app_voyages')]
    public function index(VisiteRepository $repository): Response
    {
        // recup données table visite
        $visites = $repository->findAll();

        // envoie des données à la vue
        return $this->render('voyages/index.html.twig', [
            'visites' => $visites,
        ]);
    }
}

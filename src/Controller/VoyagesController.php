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
    #[Route('/voyages/tri/{champ}/{ordre}', name: 'app_voyages_tri')]
    public function sort(VisiteRepository $repository, $champ, $ordre): Response
    {
        $visites = $repository->findAllOrderBy($champ, $ordre);

        return $this->render('voyages/index.html.twig', [
            'visites' => $visites,
        ]);
    }
}

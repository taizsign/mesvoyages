<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class VoyagesController extends AbstractController
{
    #[Route('/voyages', name: 'app_voyages')]
    public function index(VisiteRepository $repository): Response
    {
        $visites = $repository->findAll();

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

    #[Route('/voyages/recherche/{champ}', name: 'app_voyages_recherche')]
    public function findByValeur(VisiteRepository $repository, $champ, Request $request): Response
    {
        $valeur = $request->request->get('recherche') ?? $request->query->get('recherche');
        $visites = $repository->findByEqualValue($champ, $valeur);

        return $this->render('voyages/index.html.twig', [
            'visites' => $visites,
        ]);
    }
}

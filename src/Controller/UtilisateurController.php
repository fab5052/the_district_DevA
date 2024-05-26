<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/utilisateur', name: 'app_utilisateur')]
class UtilisateurController extends AbstractController
{
    
    #[Route('/', name: 'index')]#[Route('app/utilisateur', name: 'index')]
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        $utilisateur = $utilisateurRepository->findBy([], ['username' => 'asc']);
        return $this->render('app/utilisateur/index.html.twig', compact('utilisateur'));
    }
}
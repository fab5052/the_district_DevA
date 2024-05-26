<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commande', name: 'app_commande')]
class CommandeController extends AbstractController
{
    #[Route('/ajout', name: 'add')]
    public function add(SessionInterface $session, PlatRepository $platRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if($panier === []){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_acueil');
        }

        //Le panier n'est pas vide, on crée la commande
        $commande = new Commande();

        // On remplit la commande
        $commande->setUtilisateur  
         ($this->setUtilisateur());
        $commande->setReference(uniqid());

        // On parcourt le panier pour créer les détails de commande
        foreach($panier as $item => $quantite){
            $commande = new Commande();

            // On va chercher le produit
            $plat = $platRepository->find($item);
            
            $prix = $plat->getPrix();

            // On crée le détail de commande
            $commande->setPlat($plat);
            $commande->setPrix($prix);
            $commande->setQuantite($quantite);

            $commande->setCommande($commande);
        }

        // On persiste et on flush
        $em->persist($commande);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('message', 'Commande créée avec succès');
        return $this->redirectToRoute('app_accueil');
    }
}

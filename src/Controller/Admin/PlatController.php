<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Entity\Plat;
use App\Form\PlatFormType;
use App\Repository\PlatRepository;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/plat', name: 'admin_plat_')]
class PlatController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(PlatRepository $PlatRepository): Response
    {
        $plat = $PlatRepository->findAll();
        return $this->render('admin/plat/index.html.twig', compact('plat'));
    }

    // #[Route('/ajout', name: 'add')]
    // public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger, PictureService $pictureService): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     //On crée un "nouveau plat"
    //     $plat = new Plat();

    //     // On crée le formulaire
    //     $platForm = $this->createForm(PlatFormType::class, $plat);

    //     // On traite la requête du formulaire
    //     $platForm->handleRequest($request);

        //On vérifie si le formulaire est soumis ET valide
        // if($platForm->isSubmitted() && $platForm->isValid()){
        //     // On récupère les images
        //     $images = $platForm->get('images')->getData();
            
        //     foreach($images as $image){
        //         // On définit le dossier de destination
        //         $folder = 'plat';

        //         // On appelle le service d'ajout
        //         $fichier = $pictureService->add($image, $folder, 300, 300);

        //         $img = new Images();
        //         $img->setName($fichier);
        //         $plat->addImage($img);
        //     }

        //     // On génère le slug
        //     $slug = $slugger->slug($plat->getName());
        //     $plat->setSlug($slug);

        //     // On arrondit le prix 
        //     // $prix = $plat->getPrice() * 100;
        //     // $plat->setPrice($prix);

        //     // On stocke
        //     $em->persist($plat);
        //     $em->flush();

        //     $this->addFlash('success', 'Plat ajouté avec succès');

        //     // On redirige
        //     return $this->redirectToRoute('admin_plat_index');
        // }


        // return $this->render('admin/plat/add.html.twig',[
        //     'platForm' => $plattForm->createView()
        // ]);

    //     return $this->renderForm('admin/plat/add.html.twig', compact('PlatForm'));
    //     // ['platForm' => $platForm]
    // }

    // #[Route('/edition/{id}', name: 'edit')]
    // public function edit(Plat $plat Request $request, EntityManagerInterface $em, SluggerInterface $slugger, PictureService $pictureService): Response
    // {
    //     // On vérifie si l'utilisateur peut éditer avec le Voter
    //     $this->denyAccessUnlessGranted('PLAT_EDIT', $plat);

    // }};

        // On divise le prix par 100
        // $prix = $plat->getPrice() / 100;
        // $plat->setPrice($prix);

        // On crée le formulaire
        // $platForm = $this->createForm(PlatFormType::class, $plat);

        // // On traite la requête du formulaire
        // $platForm->handleRequest($request);

        // //On vérifie si le formulaire est soumis ET valide
        // if($platForm->isSubmitted() && $platForm->isValid()){
        //     // On récupère les images
        //     $images = $platForm->get('images')->getData();

        //     foreach($images as $image){
        //         // On définit le dossier de destination
        //         $folder = 'Plat';

        //         // On appelle le service d'ajout
        //         $fichier = $pictureService->add($image, $folder, 300, 300);

        //         $img = new Images();
        //         $img->setName($fichier);
        //         $plat->addImage($img);
        //     }
            
            
        //     // On génère le slug
        //     $slug = $slugger->slug($plat->getName());
        //     $plat->setSlug($slug);

            // On arrondit le prix 
            // $prix = $plat->getPrice() * 100;
            // $product->setPrice($prix);

            // On stocke
        //     $em->persist($product);
        //     $em->flush();

        //     $this->addFlash('success', 'Plat modifié avec succès');

        //     // On redirige
        //     return $this->redirectToRoute('admin_Plat_index');
        // }


        // return $this->render('admin/Plat/edit.html.twig',[
        //     'productForm' => $productForm->createView(),
        //     'product' => $product
        // ]);

        // return $this->renderForm('admin/Plat/edit.html.twig', compact('productForm'));
        // ['productForm' => $productForm]
    // }

    // #[Route('/suppression/{id}', name: 'delete')]
    // public function delete(Plat $product): Response
    // {
    //     // On vérifie si l'utilisateur peut supprimer avec le Voter
    //     $this->denyAccessUnlessGranted('PRODUCT_DELETE', $product);

    //     return $this->render('admin/Plat/index.html.twig');
    // }

    // #[Route('/suppression/image/{id}', name: 'delete_image', methods: ['DELETE'])]
    // public function deleteImage(Images $image, Request $request, EntityManagerInterface $em, PictureService $pictureService): JsonResponse
    // {
    //     // On récupère le contenu de la requête
    //     $data = json_decode($request->getContent(), true);

    //     if($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])){
    //         // Le token csrf est valide
    //         // On récupère le nom de l'image
    //         $nom = $image->getName();

    //         if($pictureService->delete($nom, 'Plat', 300, 300)){
    //             // On supprime l'image de la base de données
    //             $em->remove($image);
    //             $em->flush();

    //             return new JsonResponse(['success' => true], 200);
    //         }
    //         // La suppression a échoué
    //         return new JsonResponse(['error' => 'Erreur de suppression'], 400);
    //     }

    //     return new JsonResponse(['error' => 'Token invalide'], 400);
    // }
    }

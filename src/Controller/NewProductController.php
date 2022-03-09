<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\NewProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class NewProductController extends AbstractController
{
    #[Route('/nouveau_produit', name:'NouveauProduit')]
    public function NewProduct(Request $request) {
        $product = new Produit();
        $form = $this->createForm(NewProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('ListeProduits');
        }

        return $this->render('NewProduct.html.twig', ['NewProductForm' => $form->createView()]);

    }


    }


<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\NewProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ModifProductController extends AbstractController
{
    #[Route('/modifier/{id}', name:'ModifierProduit')]
    public function ModifProduct(Request $request, Produit $product) {

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


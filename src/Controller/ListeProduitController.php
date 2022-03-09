<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeProduitController extends AbstractController
{
    #[Route('/liste_produits', name:'ListeProduits')]
    public function ListeProduits(EntityManagerInterface $em) {
        $repo = $em->getRepository(Produit::class);
        $product_list = $repo->findAll();

        return $this->render('ListProduct.html.twig',['ProductList'=>$product_list]);
    }

}
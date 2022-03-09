<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as AbstractControllerAlias;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractControllerAlias
{
    #[Route('/', name: 'HomePage')]
     public function HomePage(){
        return $this->render('home.html.twig');
     }

}
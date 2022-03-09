<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class IncreDecreController extends AbstractController
{

    /**
     * @Route ("/Incrementer/{id}", name="IncrementQuantité")
     * @param int $id
     *
     */
    public function Incrementer(int $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('App:Produit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $entity->setQuantiteProduit( $entity->getQuantiteProduit() + 1);
        $em->flush();
        dump($entity);

        return $this->redirectToRoute('ListeProduits');
    }

    /**
     * @Route ("/Decrementer/{id}", name="IncrementQuantité")
     * @param int $id
     *
     */
    public function Decr(int $id, MailerInterface $mailer) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('App:Produit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $entity->setQuantiteProduit( $entity->getQuantiteProduit() - 1);
        $em->flush();
        dump($entity);

        if ($entity->getQuantiteProduit() == 0){
            $email = (new Email())
                ->from('inutiletest.test@gmail.com')
                ->to('corentinwatisse@gmail.com')
                ->subject('Produit en rupture')
                ->text('Le produit : '.$id.", est en rupture de stock. (".$entity->getNomProduit().")");
            $mailer->send($email);
            return $this->redirectToRoute('ListeProduits');
        }

        return $this->redirectToRoute('ListeProduits');
    }






}
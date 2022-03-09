<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class pdfController extends AbstractController
{

    /**
     * @Route ("/pdf/{id}", name="DecrementerQuantité")
     * @param int $id
     *
     */

    public function PDF(int $id){

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('App:Produit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }



        $pdf = new \FPDF();

        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);




        /* En-tête */
        $pdf->SetFillColor(255,0,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128,0,0);
        $pdf->SetLineWidth(.3);
        $pdf->SetFont("","B");



        $w = array(45,45,45,45);
        $header = array('Nom','Quantite','Date de creation','Prix');
        for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();

        /* Données */

        $Qt = $entity->getQuantiteProduit();
        $Dt =  date_format($entity->getDateCreationProduit(),"d/m/Y");
        $Pr = $entity->getPrixProduit();
        $name = $entity->getNomProduit();

        /* Body */
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');

        $body = array($name,$Qt,$Dt,$Pr);

        for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,$body[$i],1,0,'C',true);
        $pdf->Ln();



        return new Response($pdf->Output(),200,array('Content-Type' => 'application/pdf'));

    }

}
<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomProduit')
            ->add('PrixProduit')
            ->add('DateCreationProduit', DateType::class, array(
                'required' => true,
                'widget' => 'choice',
                'years' => range(1980,2022),
                'attr' => [
                    'class' => ' input-inline datepicker',
                    'data-provide' => 'datepicker',

                ],
            ))
            ->add('QuantiteProduit')
            ->add('Enregistrer', SubmitType::class, [
                'attr' => array(
                    'class' => 'btn btn-lg btn-primary'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

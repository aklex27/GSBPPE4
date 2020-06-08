<?php

namespace App\Form;

use App\Entity\FicheFrais;
use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class FicheFraisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois',DateType::class, array('disabled' => true,'data' => new \DateTime()))
            ->add('nbJustificatifs',NumberType::class, array('label'=>'nbJustificatifs:','attr'=>array('class'=>'form-control', 'placeholder'=>'Nombre ...')))
            ->add('montantValide',NumberType::class, array('label'=>'montantValide:','attr'=>array('class'=>'form-control', 'placeholder'=>'Montant ...')))
            ->add('dateModif',DateType::class, array('label'=>'DateModif:'))
            ->add('visiteur', EntityType::class, array('class' => Visiteur::class , 'choice_label' => 'nom', 'label' => "Visiteur"))
            ->add('valider',SubmitType::class, array('label'=>'Valider:','attr'=>array('class'=>'btn btn-primary btn-block')))
            ->add('annuler',ResetType::class, array('label'=>'Annuler:','attr'=>array('class'=>'btn btn-primary btn-block')))      
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheFrais::class,
        ]);
    }
}
<?php

namespace App\Form;

use App\Entity\Visiteur;
use App\Entity\LigneFraisHorsForfait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LigneFraisHorsForfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('visiteur', EntityType::class, array('class' => Visiteur::class , 'choice_label' => 'nom', 'label' => "Visiteur"))
            ->add('date',DateType::class, array('label'=>'DateSaisie:','attr'=>array('placeholder'=>'dateSaisie')))
            ->add('libelle',TextType::class, array('label'=>'Libelle:','attr'=>array('class'=>'form-control', 'placeholder'=>'Libelle')))
            ->add('montant',NumberType::class, array('label'=>'montant:','attr'=>array('class'=>'form-control', 'placeholder'=>'montant')))  
            ->add('valider',SubmitType::class, array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn-block')))   
            ->add('annuler',ResetType::class, array('label'=>'Quitter','attr'=>array('class'=>'btn btn-primary btn-block')))  
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneFraisHorsForfait::class,
        ]);
    }
}

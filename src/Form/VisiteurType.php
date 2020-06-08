<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, array('label'=>'Nom:','attr'=>array('class'=>'form-control', 'placeholder'=>'Nom ...')))
            ->add('prenom',TextType::class, array('label'=>'Prenom:','attr'=>array('class'=>'form-control', 'placeholder'=>'Prenom ...')))
            ->add('adresse',TextType::class, array('label'=>'Adresse:','attr'=>array('class'=>'form-control', 'placeholder'=>'Adresse ...')))
            ->add('ville',TextType::class, array('label'=>'Ville:','attr'=>array('class'=>'form-control', 'placeholder'=>'Ville ...')))
            ->add('cp',TextType::class, array('label'=>'Cp:','attr'=>array('class'=>'form-control', 'placeholder'=>'Cp ...')))
            ->add('dateEmbauche',DateType::class, array('label'=>'dateEmbauche:'))
            ->add('login',TextType::class, array('label'=>'Login:','attr'=>array('class'=>'form-control', 'placeholder'=>'Login ...')))
            ->add('mdp',PasswordType::class, array('label'=>'Mdp:','attr'=>array('class'=>'form-control', 'placeholder'=>'Mdp ...')))
             ->add('valider',SubmitType::class, array('label'=>'Valider:','attr'=>array('class'=>'btn btn-primary btn-block')))
            ->add('annuler',ResetType::class, array('label'=>'Annuler:','attr'=>array('class'=>'btn btn-primary btn-block')))    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiteur::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\LigneFraisHorsForfait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConsultFicheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',SubmitType::class, array('label'=>'LibellÃ©','attr'=>array('class'=>'btn btn-primary btn-block')))
            ->add('date',SubmitType::class, array('label'=>'Date','attr'=>array('class'=>'btn btn-primary btn-block')))
            ->add('montant',SubmitType::class, array('label'=>'Montant','attr'=>array('class'=>'btn btn-primary btn-block')))
            //->add('visiteur')
            //->add('mois')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneFraisHorsForfait::class,
        ]);
    }
}

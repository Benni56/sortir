<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType :: class)
            ->add('dateDebut', DateTimeType::class)
            ->add('duree', IntegerType::class)
            ->add('dateClotureInscription', DateTimeType::class)
            ->add('nombreInscriptionMax', IntegerType::class)
            ->add('descriptionInfos', TextType::class)
            ->add('etat')
            ->add('lieux')
            ->add('organisateur')
            ->add('inscription')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}

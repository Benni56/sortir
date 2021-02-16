<?php

namespace App\Form;

use App\Entity\SearchDataSite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDataSiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyWords', SearchType::class, [
                'required' => false,
                'label' => 'Le nom de la sortie contient',
                'attr' => [
                    'placeholder'=>'Search'
                ]
            ])
            ->add('dateMin', DateType::class,[
                'required'=> false,
                'label' => 'Entre',
                'widget' => 'single_text'
            ])

            ->add('dateMax', DateType::class, [
                'required'=> false,
                'label' => 'et',
                'widget'=>'single_text'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Rechercher'
            ])
            ->setMethod("GET")
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchDataSite::class,
        ]);
    }
}

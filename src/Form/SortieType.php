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
            ->add('nom',TextType :: class,
                [
                'label'=>'Nom de la sortie'

                    ])

            ->add('dateDebut', DateTimeType::class,
                [
                'label'=>'Date et Heure de la sortie'

                    ])

            ->add('duree', IntegerType::class, [
                'label'=>'Durée'

                    ])

            ->add('dateClotureInscription', DateTimeType::class, [
                'label'=>'Date limite d inscription'


                    ])

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

<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                'label'=>'Date limite d\'inscription'


            ])

            ->add('nombreInscriptionMax', IntegerType::class, [
                'label'=>'Nombre de place'


            ])
            ->add('descriptionInfos', TextareaType::class, [
                'label'=>'Description et informations'


            ])


            ->add('campus', EntityType::class,[
                'class' =>Campus::class,
                'choice_label' => 'nom',
                'label' =>'Campus'])

//            ->add('lieux',EntityType::class, [
//                'class' =>Lieu::class,
//                'choice_label' =>'nom',
//                'label' =>'Lieu'])

//            ->add('rue', EntityType::class,[
//                'class' =>Lieu::class,
//                'choice_label' => 'Rue',
//                'label' =>'Rue',
//                'mapped'=> false])
//
//            ->add('latitude', EntityType::class,[
//                'class' =>Lieu::class,
//                'label' =>'Latitude',
//                'mapped'=>false])
//
//            ->add('longitude', EntityType::class,[
//                'class' =>Lieu::class,
//                'label' =>'Longitude',
//                'mapped'=>false])
//
//            ->add('codePostal', EntityType::class,[
//                'class' =>Ville::class,
//                'choice_label' =>'nom',
//                'label' =>'Code postal',
//                'mapped' => false])
//
//            ->add('ville', EntityType::class, [
//                'class'=>Ville::class,
//                'label'=>'Ville',
//                'mapped'=> false])


//            ->add('organisateur')
//            ->add('inscription')
//            ->add('etat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}

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

            ->add('nombreInscriptionMax', IntegerType::class, [
                'label'=>'Nombre d inscrits maximums'


            ])
            ->add('descriptionInfos', TextType::class, [
                'label'=>'Description et informations'


            ])

            ->add('campus', EntityType::class,[
                'class' =>Campus::class,
                'choice_label' => 'nom',
                'label' =>'Campus'])

            ->add('lieux',EntityType::class, [
                'class' =>Sortie::class,
                'choice_label' =>'nom',
                'label' =>'Lieu'])

            //->add('rue', EntityType::class,[
            //    'class' =>Lieu::class,
            //    'label' =>'Rue'])

            //->add('codePostal', EntityType::class,[
            //    'class' =>Lieu::class,
            //    'choice_label' =>'nom',
            //    'label' =>'Ville'])

            //->add('latitude', EntityType::class,[
            //    'class' =>Lieu::class,
            //    'label' =>'Latitude'])

            //->add('longitude', EntityType::class,[
            //    'class' =>Lieu::class,
            //    'label' =>'Longitude'])

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

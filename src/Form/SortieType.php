<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('dateDebut')
            ->add('duree')
            ->add('dateClotureInscription')
            ->add('nombreInscriptionMax')
            ->add('descriptionInfos')

            ->add('campus', EntityType::class,[
                'class' =>Campus::class,
                'label' =>'Campus'])

            ->add('lieux',EntityType::class, [
                'class' =>Lieu::class,
                'choice_label' =>'nom',
                'label' =>'Lieu'])

            ->add('rue', EntityType::class,[
                'class' =>Lieu::class,
                'label' =>'Rue'])

            ->add('codePostal', EntityType::class,[
                'class' =>Ville::class,
                'choice_label' =>'nom',
                'label' =>'Ville'])

            ->add('latitude', EntityType::class,[
                'class' =>Lieu::class,
                'label' =>'Latitude'])

            ->add('longitude', EntityType::class,[
                'class' =>Lieu::class,
                'label' =>'Longitude'])

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

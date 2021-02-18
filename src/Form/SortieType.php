<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use PhpParser\Node\Expr\BinaryOp\Greater;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;

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
                'label'=>'Durée en minutes'

            ])

            ->add('dateClotureInscription', DateType::class, [
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


            ->add('lieux',EntityType::class, [
                'class' =>Lieu::class,
                'choice_label' =>'nom',
                'label' =>'Lieu']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}

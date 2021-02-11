<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Entity\Etat;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatController extends AbstractController
{
    /**
     * @Route("/etats/add", name="etats_add")
     */
    public function addEtat(EntityManagerInterface $entityManager): Response
    {
       $etat = ['Créée', 'Ouverture', 'Clôturée', 'Activité en cours', 'Passée', 'Annulée'];
        foreach($etat as $state){
            $creationEtat = new Etat();
            $creationEtat->setLibelle($state);
            $entityManager->persist($creationEtat);
        }
        $entityManager->flush();

        return $this->render('etat/index.html.twig',[

        ]);
    }
}

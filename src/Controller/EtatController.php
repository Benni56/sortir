<?php

namespace App\Controller;

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
        $creationEtat = new Etat();
        $creationEtat->setLibelle('Créée');
        $entityManager->persist($creationEtat);

        $ouvertureEtat= new Etat();
        $ouvertureEtat->setLibelle('Ouverture');
        $entityManager->persist($ouvertureEtat);

        $clotureEtat= new Etat();
        $clotureEtat->setLibelle('Clôturée');
        $entityManager->persist($clotureEtat);

        $enCoursEtat= new Etat();
        $enCoursEtat->setLibelle('Activité en cours');
        $entityManager->persist($enCoursEtat);

        $passeEtat= new Etat();
        $passeEtat->setLibelle('Passée');
        $entityManager->persist($passeEtat);

        $annuleEtat= new Etat();
        $annuleEtat->setLibelle('Annulée');
        $entityManager->persist($annuleEtat);

        $entityManager->flush();

        return $this->render('etat/index.html.twig', [
            'controller_name' => 'EtatController',
        ]);
    }
}

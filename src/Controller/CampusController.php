<?php

namespace App\Controller;

use App\Entity\Campus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{
    /**
     * @Route("/campus", name="campus")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $campus = ['Saint Herblain', 'Rennes', 'Quimper', 'Niort', 'Angers', 'Le Mans'];
        foreach($campus as $camp){
            $ecole = new Campus();
            $ecole->setNom($camp);
            $entityManager->persist($ecole);
        }
        $entityManager->flush();


        return $this->render('campus/index.html.twig', [
            'controller_name' => 'CampusController',
        ]);
    }
}

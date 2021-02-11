<?php

namespace App\Controller;

use App\Entity\Sortie;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/sorties/create", name="sortie_create")
     */
    public function createSorties(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        //création de l'instance sortie vide associée au formulaire
        $sortie = new Sortie();

        $user = $this->getUser();




        return $this->render('sortie/create.html.twig', [

        ]);
    }
}

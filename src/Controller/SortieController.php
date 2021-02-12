<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
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
        //pré remplissage du campus par défaut de l'utilisateur connecté
        $sortie->setCampus($user->getUsername());

        //on hydrate les propriétés nécessaires au formulaire
        $sortie->setNom();
        $sortie->setDateDebut(new \DateTime());
        $sortie->setDateClotureInscription(new \DateTime());
        $sortie->setNombreInscriptionMax();
        $sortie->setDuree();
        $sortie->setDescriptionInfos();
        $sortie->setLieux();

        //création du formulaire avec passage en param de l'instance vide
        $sortieForm = $this->createForm(SortieType::class, $sortie);
        //récupère les données du form et les inject dans la sortie
        $sortieForm->handleRequest($request);

        //vérification de validation de smoussion du for
        if ($sortieForm->isSubmitted()&& $sortieForm->isValid())
        {
            //on insert les données
            $entityManager->persist($sortie);
            $entityManager->flush();

            $this->addFlash('Succès', 'Votre sortie a bien été créée');

            //ca redirige vers la page qui liste les sorties
            return $this->redirectToRoute('main_home');

        }

      return $this->render('sortie/create.html.twig',[
         "sortie_form" => $sortieForm->createView() //passe le form à twig
      ]);


    }
}

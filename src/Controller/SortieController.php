<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use App\Form\SortieType;
use App\Repository\ParticipantRepository;
use App\Security\AppAuthenticator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\SortieRepository;
use App\Repository\EtatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class SortieController extends AbstractController
{
    /**
     *
     * @Route("/sorties/create", name="sortie_create")
     */
    public function createSorties(Request $request,
                                  UserPasswordEncoderInterface $passwordEncoder,
                                  GuardAuthenticatorHandler $guardHandler,
                                  AppAuthenticator $authenticator,
                                  EtatRepository $etatRepository,
                                  ParticipantRepository $participantRepository): Response
    {
        //création de l'instance sortie vide associée au formulaire
        $sortie = new Sortie();

        $user = $this->getUser();
        //pré remplissage du campus par défaut de l'utilisateur connecté
        $form = $this->createForm(SortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) //on hydrate les propriétés nécessaires au formulaire
        {

            //on insert les données
            $en = $request->request->get("enregistrer");

            $participant= $participantRepository->findOneBy(['email'=>$user->getUsername()]);
            $sortie->setCampus($participant->getNameCampus());
            $sortie->setOrganisateur($participant);

            if ($en == "creer") {
                $etat = $etatRepository->find(1);
                $sortie->setEtat($etat);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($sortie);
                $entityManager->flush();

            } else if ($en == 'publier'){
                $etat = $etatRepository->find(2);
                $sortie->setEtat($etat);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($sortie);
                $entityManager->flush();

            } else if ($en == "annuler"){
                $etat = $etatRepository->find(8);
                $sortie->setEtat($etat);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($sortie);
                $entityManager->flush();

            }

            $this->addFlash('Succès', 'Votre sortie a bien été créée');

            //ca redirige vers la page qui liste les sorties
            return $this->redirectToRoute('main_home');

        }

        return $this->render('sortie/create.html.twig', [
            "sortie_form" => $form->createView() //passe le form à twig
        ]);

    }
    /**
     * @route("/sortie/{id}", name="sortie_detail", methods={"GET"})
     * @param Sortie $sortie
     * @return Response
     */

    public function detail(Sortie $sortie) : Response{

        return $this->render('sortie/detail.html.twig', ["sortie"=>$sortie]);

    }

    /*   /**
   * @Route("/sorties", name="sorties_list")
*/
    /*    public function list(SortieRepository $sortieRepository): Response
      {
           //aller chercher tous les wishes dans la bdd
           //$wishRepository = $this->getDoctrine()->getRepository(Wish::class);
           $sortie = $sortieRepository->findCategorizedSorties();
           return $this->render('sortie/list.html.twig', [
               "" => $wishes
           ]);
       }
   */
}


//            $sortie->setNom($form->get('nom')->getData());
//            $sortie->setDateDebut($form->get('dateDebut')->getData());
//            $sortie->setDateClotureInscription($form->get('dateClotureInscription')->getData());
//            $sortie->setNombreInscriptionMax($form->get('nombreInscriptionMax')->getData());
//            $sortie->setDuree($form->get('duree')->getData());
//            $sortie->setDescriptionInfos($form->get('descriptionInfos')->getData());
//            $sortie = $lieu->setRue($form->get('Rue')->getData());
//            $sortie = $lieu->setLatitude($form->get('latitude')->getData());
//            $sortie = $lieu->setLongitude($form->get('longitude')->getData());
//            $sortie = $ville->setCodePostal($form->get('code postal')->getData());
//            $sortie = $ville->setNom($form->get('ville')->getData());
//création du formulaire avec passage en param de l'instance vide
//$sortieForm = $this->createForm(SortieFormType::class, $sortie);
//récupère les données du form et les inject dans la sortie
//$sortieForm->handleRequest($request);
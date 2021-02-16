<?php

namespace App\Controller;

use App\Entity\SearchDataSite;
use App\Form\SearchDataSiteType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(SortieRepository $sortieRepository,
                         Request $request): Response
    {
        $search = new SearchDataSite();
        //création instance du formulaire de recherche associé à l'entité
        $form= $this->createForm(SearchDataSiteType::class, $search);
        //récupère les données soumises dans la requête
        $form->handleRequest($request);
        //les données du form sont ici (s'il a bien été soumis)
        $data = $form->getData();

        //on récupère la recherche
        $sorties=$sortieRepository->search($data->getKeyWords());
        //$sorties = $sortieRepository->findBy([]);

        return $this->render('main/home.html.twig', [
        "sorties"=>$sorties,
        "form_search" => $form->createView()
        ]);
    }
}

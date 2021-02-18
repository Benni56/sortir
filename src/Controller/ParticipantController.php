<?php

namespace App\Controller;

use App\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/participant/{id}", name="participant", methods={"GET"})
     * @param Participant $participant
     * @return Response
     */

    public function index(Participant $participant) : Response{

        return $this->render('participant/index.html.twig', ["participant"=>$participant]);

    }
}

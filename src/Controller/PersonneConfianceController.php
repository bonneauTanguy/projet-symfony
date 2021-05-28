<?php

namespace App\Controller;

use App\Entity\PersonneConfiance;
use App\Form\PersonneConfianceType;
use App\Repository\PersonneConfianceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personne/confiance")
 */
class PersonneConfianceController extends AbstractController
{
    /**
     * @Route("/", name="personne_confiance_index", methods={"GET"})
     */
    public function index(PersonneConfianceRepository $personneConfianceRepository): Response
    {
        return $this->render('personne_confiance/index.html.twig', [
            'personne_confiances' => $personneConfianceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="personne_confiance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personneConfiance = new PersonneConfiance();
        $form = $this->createForm(PersonneConfianceType::class, $personneConfiance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personneConfiance);
            $entityManager->flush();

            return $this->redirectToRoute('personne_confiance_index');
        }

        return $this->render('personne_confiance/new.html.twig', [
            'personne_confiance' => $personneConfiance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personne_confiance_show", methods={"GET"})
     */
    public function show(PersonneConfiance $personneConfiance): Response
    {
        return $this->render('personne_confiance/show.html.twig', [
            'personne_confiance' => $personneConfiance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personne_confiance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PersonneConfiance $personneConfiance): Response
    {
        $form = $this->createForm(PersonneConfianceType::class, $personneConfiance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personne_confiance_index');
        }

        return $this->render('personne_confiance/edit.html.twig', [
            'personne_confiance' => $personneConfiance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personne_confiance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PersonneConfiance $personneConfiance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personneConfiance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personneConfiance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personne_confiance_index');
    }
}

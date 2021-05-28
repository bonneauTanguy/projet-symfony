<?php

namespace App\Controller;

use App\Entity\Adherer;
use App\Form\AdhererType;
use App\Repository\AdhererRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adherer")
 */
class AdhererController extends AbstractController
{
    /**
     * @Route("/", name="adherer_index", methods={"GET"})
     */
    public function index(AdhererRepository $adhererRepository): Response
    {
        return $this->render('adherer/index.html.twig', [
            'adherers' => $adhererRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="adherer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adherer = new Adherer();
        $form = $this->createForm(AdhererType::class, $adherer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adherer);
            $entityManager->flush();

            return $this->redirectToRoute('adherer_index');
        }

        return $this->render('adherer/new.html.twig', [
            'adherer' => $adherer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adherer_show", methods={"GET"})
     */
    public function show(Adherer $adherer): Response
    {
        return $this->render('adherer/show.html.twig', [
            'adherer' => $adherer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adherer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adherer $adherer): Response
    {
        $form = $this->createForm(AdhererType::class, $adherer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adherer_index');
        }

        return $this->render('adherer/edit.html.twig', [
            'adherer' => $adherer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adherer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Adherer $adherer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adherer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adherer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adherer_index');
    }
}

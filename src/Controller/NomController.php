<?php

namespace App\Controller;

use App\Entity\Nom;
use App\Form\NomType;
use App\Repository\NomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nom")
 */
class NomController extends AbstractController
{
    /**
     * @Route("/", name="nom_index", methods={"GET"})
     */
    public function index(NomRepository $nomRepository): Response
    {
        return $this->render('nom/index.html.twig', [
            'noms' => $nomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="nom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $nom = new Nom();
        $form = $this->createForm(NomType::class, $nom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nom);
            $entityManager->flush();

            return $this->redirectToRoute('nom_index');
        }

        return $this->render('nom/new.html.twig', [
            'nom' => $nom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nom_show", methods={"GET"})
     */
    public function show(Nom $nom): Response
    {
        return $this->render('nom/show.html.twig', [
            'nom' => $nom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="nom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Nom $nom): Response
    {
        $form = $this->createForm(NomType::class, $nom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nom_index');
        }

        return $this->render('nom/edit.html.twig', [
            'nom' => $nom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Nom $nom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($nom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('nom_index');
    }
}

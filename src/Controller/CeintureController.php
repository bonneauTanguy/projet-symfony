<?php

namespace App\Controller;

use App\Entity\Ceinture;
use App\Form\CeintureType;
use App\Repository\CeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ceinture")
 */
class CeintureController extends AbstractController
{
    /**
     * @Route("/", name="ceinture_index", methods={"GET"})
     */
    public function index(CeintureRepository $ceintureRepository): Response
    {
        return $this->render('ceinture/index.html.twig', [
            'ceintures' => $ceintureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ceinture_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ceinture = new Ceinture();
        $form = $this->createForm(CeintureType::class, $ceinture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ceinture);
            $entityManager->flush();

            return $this->redirectToRoute('ceinture_index');
        }

        return $this->render('ceinture/new.html.twig', [
            'ceinture' => $ceinture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ceinture_show", methods={"GET"})
     */
    public function show(Ceinture $ceinture): Response
    {
        return $this->render('ceinture/show.html.twig', [
            'ceinture' => $ceinture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ceinture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ceinture $ceinture): Response
    {
        $form = $this->createForm(CeintureType::class, $ceinture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ceinture_index');
        }

        return $this->render('ceinture/edit.html.twig', [
            'ceinture' => $ceinture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ceinture_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ceinture $ceinture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ceinture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ceinture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ceinture_index');
    }
}

<?php

namespace App\Controller;

use App\Entity\TypeParent;
use App\Form\TypeParentType;
use App\Repository\TypeParentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/parent")
 */
class TypeParentController extends AbstractController
{
    /**
     * @Route("/", name="type_parent_index", methods={"GET"})
     */
    public function index(TypeParentRepository $typeParentRepository): Response
    {
        return $this->render('type_parent/index.html.twig', [
            'type_parents' => $typeParentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_parent_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeParent = new TypeParent();
        $form = $this->createForm(TypeParentType::class, $typeParent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeParent);
            $entityManager->flush();

            return $this->redirectToRoute('type_parent_index');
        }

        return $this->render('type_parent/new.html.twig', [
            'type_parent' => $typeParent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_parent_show", methods={"GET"})
     */
    public function show(TypeParent $typeParent): Response
    {
        return $this->render('type_parent/show.html.twig', [
            'type_parent' => $typeParent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_parent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeParent $typeParent): Response
    {
        $form = $this->createForm(TypeParentType::class, $typeParent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_parent_index');
        }

        return $this->render('type_parent/edit.html.twig', [
            'type_parent' => $typeParent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_parent_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeParent $typeParent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeParent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeParent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_parent_index');
    }
}

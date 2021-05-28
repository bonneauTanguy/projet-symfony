<?php

namespace App\Controller;

use Dompdf\Options;
use Dompdf\Dompdf;
use App\Entity\Adherent;
use App\Entity\Adherer;
use App\Entity\Saison;
use App\Form\AdherentType;
use App\Repository\AdherentRepository;
use App\Repository\SaisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adherent")
 */
class AdherentController extends AbstractController
{
	/**
     * @Route("/pdf/{idA}{idAdhere}", name="adherent_pdf", methods={"GET","POST"})
     */
	public function fairelepdf(int $idA, int $idAdhere){
		$objetsRepository = $this->getDoctrine()->getRepository(Adherent::class);
		$objet = $objetsRepository->findOneById($idA);
		$adhererRepository = $this->getDoctrine()->getRepository(Adherer::class);
		$adhere = $adhererRepository->findOneById($idAdhere);
		$options = new Options();
		$options->set('isRemoteEnabled', TRUE);
		$dompdf = new Dompdf($options);
		$html = $this->render('adherent/pdfTemplate.html.twig', [ 'adherent'=>$objet, 'adhere' => $adhere, ]);
		$dompdf -> loadHtml($html);
		$dompdf->render();
		return new Response ($dompdf->stream());
	}
	
    /**
     * @Route("/", name="adherent_index", methods={"GET"})
     */
    public function index(AdherentRepository $adherentRepository, SaisonRepository $saisonRepository): Response
    {
        return $this->render('adherent/index.html.twig', [
            'adherents' => $adherentRepository->findAll(), 'saison' => $saisonRepository,
        ]);
    }

    /**
     * @Route("/new", name="adherent_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adherent);
            $entityManager->flush();

            return $this->redirectToRoute('adherent_index');
        }

        return $this->render('adherent/new.html.twig', [
            'adherent' => $adherent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adherent_show", methods={"GET"})
     */
    public function show(Adherent $adherent): Response
    {
        return $this->render('adherent/show.html.twig', [
            'adherent' => $adherent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adherent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adherent $adherent): Response
    {
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adherent_index');
        }

        return $this->render('adherent/edit.html.twig', [
            'adherent' => $adherent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adherent_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Adherent $adherent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adherent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adherent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adherent_index');
    }
}

<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(EtudiantRepository $etudiantRepository): Response
    {
        $etudiants = $etudiantRepository->findAll();
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
            'etudiants' => $etudiants
        ]);
    }


    #[Route('/add', name: 'app_etudiant_add')]
    public function ajoutEtudiant(EntityManagerInterface $em, Request $request)
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('app_etudiant');
        }

        return $this->render("etudiant_form.html.twig", [
            'form' => $form->createView()
        ]);
    }


    #[Route('/etudiant/delete/{id}', name: 'app_etudiant_delete')]
    public function deleteEtudiant(Etudiant $etudiant = null, EntityManagerInterface $entityManager)
    {
        if (isset($etudiant)) {
            $entityManager->remove($etudiant);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_etudiant');
    }

    #[Route('/etudiant/edit/{id}', name: 'app_etudiant_edit')]
    public function editEtudiant(Etudiant $etudiant = null, EntityManagerInterface $entityManager,Request $request)
    {
        if(isset($etudiant)){
            $form= $this->createForm(EtudiantType::class,$etudiant);
            $form->handleRequest($request);
            if($form->isSubmitted()&&$form->isValid()){
                $entityManager->persist($etudiant);
                $entityManager->flush();
                return $this->redirectToRoute('app_etudiant');
            }
            return $this->render('etudiant_form.html.twig',[
                'form'=>$form
            ]);
        }
        return $this->redirectToRoute('app_etudiant');
    }
}

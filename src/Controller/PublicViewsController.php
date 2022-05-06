<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicViewsController extends AbstractController
{
    #[Route('/', name: 'app_public_views')]
    public function index(): Response
    {
        $this->addFlash("success","Testing success message");
        $this->addFlash("error","Testing danger");
        $this->addFlash("info","Testing warning");
        return $this->render('admin.html.twig', [
            'controller_name' => 'PublicViewsController',
        ]);
    }
}

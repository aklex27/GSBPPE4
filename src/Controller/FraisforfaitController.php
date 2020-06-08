<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FraisforfaitController extends AbstractController
{
    /**
     * @Route("/fraisforfait", name="fraisforfait")
     */
    public function index()
    {
        return $this->render('fraisforfait/index.html.twig', [
            'controller_name' => 'FraisforfaitController',
        ]);
    }
}

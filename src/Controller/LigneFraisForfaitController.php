<?php

namespace App\Controller;
use App\Entity\Visiteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class LigneFraisForfaitController extends AbstractController
{
    /**
     * @Route("/ligne/frais/forfait", name="ligne_frais_forfait")
     */
    public function index()
    {
        return $this->render('ligne_frais_forfait/index.html.twig', [
            'controller_name' => 'LigneFraisForfaitController',
        ]);
    }
    
    /**
     * @Route("/ligne/frais/forfait_add", name="_frais_forfait")
     */
    public function addligneFF(Request $request, Session $session) {
     
        $ligneff = new LigneFraisForfait();
        
        $form = $this->createForm(LignefraisforfaitType::class, $ligneff);
        
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            $id = $session->get('visiteur');
            $lff = $this->getDoctrine()->getManager()->getRepository(LigneFraisForfait::class);
            if($ff == null){
                if($form->isValid()){
                    $em = $this->getDoctrine()->getManager();
             $visiteur = $this->getDoctrine()->getManager()->getRepository(Visiteur::class)->getLeVisiteur($id);
             $fraisforfait = $this->getDoctrine()->getManager()->getRepository(LigneFraisForfait::class)->getLalignefraisf($id);
             
             $ligneff->setVisiteur($visiteur);
             $ligneff->setFraisForFait($fraisforfait);
             $em->persist($ligneff);
             $em->flush();
             
                    $request->getSession()->getFlashBag()->add('notice', 'Visiteur bien enregistre.');
                    return $this->redirectToRoute('affichage');
            }
            }
            
        }
    }
            
            
    
}

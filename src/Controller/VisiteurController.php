<?php

namespace App\Controller;
use App\Entity\FicheFrais;
use App\Form\FicheFraisType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Visiteur;
use Symfony\Component\HttpFoundation\Request;
use App\Form\VisiteurType;
use Symfony\Component\HttpFoundation\Session\Session;


class VisiteurController extends AbstractController
{
    /**
     * @Route("/visiteur", name="visiteur")
     */
    public function index()
    {
        return $this->render('visiteur/index.html.twig', [
            'controller_name' => 'VisiteurController',
        ]);
    }
    
   /**
     * @Route("/visiteur/creer", name="creervisiteur")
     */ 
public function creerVisiteur(Request $query){
    
    $cand = new Visiteur();
    
    $form = $this->createForm(VisiteurType::class, $cand);
    
    $form->handleRequest($query);

    if ($query->isMethod('POST')){
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cand);
            $em->flush();
            $query->getSession()->getFlashBag()->add('notice', 'Visiteur enregistré.');
            
            /*return $this->redirectToroute('rli_exame_homepage_1', array('id'=>$cand->getId()));*/
            return new Response('Visiteur ajouter avec succes');
        }
            
        }
        return $this->render('visiteur/formulaire.html.twig', array ('form'=> $form->createView(),));
    }
    
    
    /**
 * @Route("/visiteur/afficher/{id}" , name="unvisiteur")
 */
public function afficherVisiteur($id){
    $rep= $this->getDoctrine()->getRepository('App\Entity\Visiteur');
    $resultat = $rep->find($id);
    return $this->render('visiteur/view.html.twig',array('resultat'=>$resultat));
}
  /**
 * @Route("/visiteur/affichertout" , name="toutvisiteur")
 */

public function afficherTout(){
    $rep2=$this->getDoctrine()->getRepository('App\Entity\Visiteur');
    $resultat = $rep2->findAll();
    return $this->render('visiteur/view.html.twig',array('resultat'=>$resultat));
}
    
    

/**
* @Route("/login", name="sioslam_connexion")
*/
public function connectionVisiteur(Request $query, Session $session)
{
$visiteur = new Visiteur;
$form = $this->createForm(VisiteurType::class, $visiteur);
$form->handleRequest($query);
if ($form->isSubmitted() && $form->isValid()) {
$em = $this->getDoctrine()->getManager();
$data = $form->getData();
$login = $form['login']->getData();
$password = $form['mdp']->getData();
$v = $em->getRepository(Visiteur::class)->seConnecter($login,$password);
//on envoie les données reçus pour tester
foreach ($v as $result){
if($v[0]->getLogin()==$login){
$session ->set('nom', $v[0]->getNom());
$session ->set('prenom', $v[0]->getPrenom());
$session ->set('id', $v[0]->getId());
$login = $session->set('login', $login);
return $this->redirectToRoute('jesuisco');
}
}
}
return $this->render('visiteur/connexion.html.twig',array('form'=>$form->createView()));
}


/**
* @Route("/jesuisco", name="jesuisco")
*/
public function jesuisConnecter(){
return $this->render('visiteur/menuVisiteur.html.twig');
}
}
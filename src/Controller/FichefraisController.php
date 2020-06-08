<?php

namespace App\Controller;

use App\Entity\FicheFrais;
use App\Entity\Visiteur;
use App\Form\FicheFraisType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class FichefraisController extends AbstractController
{
     
     /**
     * @Route("/add_fiche", name="_fichefrais")
     */
    
    public function addFicheFrais(Request $request, Session $session) {
     
        $fichefrais = new FicheFrais();
        
        $form = $this->createForm(FicheFraisType::class, $fichefrais);
        $em = $this->getDoctrine()->getManager();

      
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            $id = $session->get('visiteur');
            $ff = $this->getDoctrine()->getManager()->getRepository(FicheFrais::class)->getByMois($fichefrais->getMois(), $id);
            if($ff == null){
              $table = $request->request->all();
                if(!empty($table)){
                    $nbjustificatifs= $table["fiche_frais"]["nbJustificatifs"];
                    $montantvalide=$table["fiche_frais"]["montantValide"];
                    
                    $rawSql = "INSERT INTO fiche_frais (visiteur_id, etat_id, libelle, mois, nb_justificatifs, montant_valide, date_modif) VALUES
                            (".$session->get("id").", 1, NULL, NOW(), $nbjustificatifs, $montantvalide, NOW());";

               
            //echo $rawSql ;
            //exit();
            $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($rawSql);
            $stmt->execute();
                  
                    return $this->redirectToRoute('affichage1');
                }
            }
        }

        return $this->render( 'fichefrais/saisir_fichefrais.html.twig', array('form' =>$form->createView()));
    }

    /**
     * @Route("/register", name="affichage1")
     */
    public function register(){
        
        return $this->render('fichefrais/add.html.twig');
    }
   
       /**
     * @Route("/saisirFF", name="add_fichefrais")
    */ 
    
    public function SaisirFicheFrais(Request $query, Session $session) {
        //$fichefrais = new FicheFrais();
        //$form = $this->createForm(FicheFraisType::class, $fichefrais);
        //$form->handleRequest($query);
       $em = $this->getDoctrine()->getManager();
       $ficheFrais = $em->getRepository(FicheFrais::class)->findAll();
        
        /*if ($form->isSubmitted() && $form->isValid()) {
           
           $em->persist($fichefrais);
           $em->flush();  
           
        
          $query->getSession()
              ->getFlashBag()
              ->add('success','fiche saisir');
        }*/
        
        
        
        
        return $this->render('visiteur/saisirFF.html.twig', array('fichefrais' => $ficheFrais));
}
    

    
 
}
     




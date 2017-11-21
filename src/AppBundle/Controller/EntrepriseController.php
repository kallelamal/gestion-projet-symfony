<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Utiisateur;


class EntrepriseController extends FOSRestController
{
    /**
     * @Rest\Get("/entreprise/{id}")
     */
    public function getUserAction($id) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAssoc('SELECT id,cin  FROM utilisateur where  id = ? ',array($id));
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }

    /**
     * @Rest\Get("/entreprise")
     */
    public function getEntreprisesAction() {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAssoc('SELECT *  FROM utilisateur where type=3');
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }

    /**
     * @Rest\Post("/entreprise")
     */
    public function addEntrepriseAction(Request $request) {
        $result=  Null;
            try 
            {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $nomEntreprise = $request->request->get("nomEntreprise");                
                $telEntreprise = $request->request->get("telEntreprise");                
                $adresseEntreprise = $request->request->get("adresseEntreprise");  
                $faxEntreprise = $request->request->get("faxEntreprise");  

                if (empty($cin)) 
                {
                    $result= Response::HTTP_NOT_FOUND;
                }
                else
                {
                $conn = $this->get('database_connection');
                $conn->insert('utilisateur', array('type' => 3 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'nom_ent' => $nomEntreprise,'tel_ent' => $telEntreprise,'adresse_ent' => $adresseEntreprise ,'fax_ent' => $faxEntreprise ));
                $result=Response::HTTP_OK;
                }
            } 
            catch (\Exception $exception) 
            {
                $result=Response::HTTP_NOT_ACCEPTABLE;
            }
         return $result;
    }

    /**
     * @Rest\Put("/entreprise/{id}")
     */
    public function editEntrepriseAction(Request $request, $id) {
        $result=  Null;
            try {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $nomEntreprise = $request->request->get("nomEntreprise");                
                $telEntreprise = $request->request->get("telEntreprise");                
                $adresseEntreprise = $request->request->get("adresseEntreprise");  
                $faxEntreprise = $request->request->get("faxEntreprise");  

                $conn = $this->get('database_connection');
                $conn->update('utilisateur', array('type' => 3 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'nom_ent' => $nomEntreprise,'tel_ent' => $telEntreprise,'adresse_ent' => $adresseEntreprise ,'fax_ent' => $faxEntreprise ),array('id' => $id));
                $result=Response::HTTP_OK;
            } catch (\Exception $exception) {
                $result=Response::HTTP_NOT_ACCEPTABLE;
            }
        return$result;
    }
}

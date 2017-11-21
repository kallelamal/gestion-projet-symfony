<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Utiisateur;


class EtudiantController extends FOSRestController
{
    /**
     * @Rest\Get("/etudiant/{id}")
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
     * @Rest\Get("/etudiant")
     */
    public function getEtudiantsAction() {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAssoc('SELECT * FROM utilisateur where type=1');
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }


    /**
     * @Rest\Post("/etudiant")
     */
    public function addEtudiantAction(Request $request) {
        $result=  Null;
            try 
            {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $dateNess = $request->request->get("dateNess");                
                $cy_etud = $request->request->get("cy_etud");                
                $niv_etud = $request->request->get("niv_etud");  
                $specialite = $request->request->get("spec");  
                if (empty($cin)) 
                {
                    $result= Response::HTTP_NOT_FOUND;
                }
                else
                {
                $conn = $this->get('database_connection');
                $conn->insert('utilisateur', array('type' => 1 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'date_naiss' => $dateNess,'cycle_etude' => $cy_etud,'niveau_etude' => $niv_etud ,'specialite' => $specialite ));
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
     * @Rest\Put("/etudiant/{id}")
     */
    public function editEtudiantAction(Request $request, $id) {
        $result=  Null;
            try {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $dateNess = $request->request->get("dateNess");                
                $cy_etud = $request->request->get("cy_etud");                
                $niv_etud = $request->request->get("niv_etud");  
                $specialite = $request->request->get("spec");  

                $conn = $this->get('database_connection');
                $conn->update('utilisateur', array('type' => 1 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'date_naiss' => $dateNess,'cycle_etude' => $cy_etud,'niveau_etude' => $niv_etud ,'specialite' => $specialite ),array('id' => $id));
                $result=Response::HTTP_OK;
            } catch (\Exception $exception) {
                $result=Response::HTTP_NOT_ACCEPTABLE;
            }
        return$result;
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Utiisateur;
use AppBundle\Exception\BadRequestDataException;

class EtudiantController extends FOSRestController
{
    /**
     * @Rest\Get("/etudiant/{id}")
     */
    public function getEtudiantAction($id) {
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
    public function getAllEtudiantAction() {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT * FROM utilisateur where type=1');
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }


    /**
     * @Rest\Post("/etudiant")
     */
    public function postEtudiantAction(Request $request) {
        $result=  Null;
        $isims=  Null;
        $existe=  Null;
            try 
            {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("password");   
                $tel = $request->request->get("tel");                                
                $dateNess = $request->request->get("date_naiss");                
                $cy_etud = $request->request->get("cycle_etude");                
                $niv_etud = $request->request->get("niveau_etude");  
                $specialite = $request->request->get("specialite");  
                $conn = $this->get('database_connection');
                $isims = $conn->fetchAssoc('SELECT * FROM isims where Ncin=? ',array($cin));
              
                if (!($isims)) 
                {
                    return new Response("non isims",400);
                }
                else
                {
                $existe = $conn->fetchAssoc('SELECT * FROM utilisateur where cin =?',array($cin));
                if ($existe) 
                {
                    return new Response("user existe",400);
                    
                }
                else{
                $conn->insert('utilisateur', array('type' => 1 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'date_naiss' => $dateNess,'cycle_etude' => $cy_etud,'niveau_etude' => $niv_etud ,'specialite' => $specialite ));
               
                }
                }
            }
            catch (\Exception $exception) 
            {
              $this->throwFosrestSupportedException($exception);
              //return new Response("",400);
            }
        return new Response("", 201);
    }

    /**
     * @Rest\Put("/etudiant/{id}")
     */
    public function putEtudiantAction(Request $request, $id) {
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
                return new Response("",400);
            }
            return new Response("",200);
    }
     /**
     * Makes response from given exception.
     *
     * @param \Exception $exception
     * @throws BadRequestDataException
     */
    protected function throwFosrestSupportedException(\Exception $exception) {
        throw new BadRequestDataException($exception->getMessage());
    }
}

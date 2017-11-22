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


class EnseignantController extends FOSRestController
{
    /**
     * @Rest\Get("/enseignant/{id}")
     */
    public function getEnseignantAction($id) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAssoc('SELECT *  FROM utilisateur where  id = ? ',array($id));
        } catch (\Exception $exception) {
            $result= new Response("No results found",404);            
        }
        return  $result;
    }

    /**
     * @Rest\Get("/enseignant")
     */
    public function getAllEnseignantAction() {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT *  FROM utilisateur where type=2');
        } catch (\Exception $exception) {
            $result= new Response("No results found",404);           
        }
        return  $result;
    }

    /**
     * @Rest\Post("/enseignant")
     */
    public function postEnseignantAction(Request $request) {
        $result=  Null;
        $isims=  Null;
        $existe=  Null;
            try 
            {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $grade = $request->request->get("grade");
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
                $conn->insert('utilisateur', array('type' => 2 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'grade' => $grade));
              
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
     * @Rest\Put("/enseignant/{id}")
     */
    public function putEnseignantAction(Request $request, $id) {
        $result=  Null;
            try {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $grade = $request->request->get("grade");    
                $conn = $this->get('database_connection');
                $conn->update('utilisateur',  array('type' => 2 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'grade' => $grade),array('id' => $id));
                $result=Response::HTTP_OK;
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
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

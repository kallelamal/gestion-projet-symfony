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
    public function getEntrepriseAction($id) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAssoc('SELECT id,cin  FROM utilisateur where  id = ? ',array($id));
        } catch (\Exception $exception) {
            $result= new Response("No results found",404);              
        }
        return  $result;
    }
    /**
     * @Rest\Get("/entreprise")
     */
    public function getAllEntrepriseAction() {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT *  FROM utilisateur where type=3');
        } catch (\Exception $exception) {
            $result= new Response("No results found",404);         
        }
        return  $result;
    }
    /**
     * @Rest\Get("/entrepriseCompte")
     */
    public function getEntrepriseCompteAction() {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT email,password FROM utilisateur where type=3');
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }
    /**
     * @Rest\Post("/entreprise")
     */
    public function postEntrepriseAction(Request $request) {
        $result=  Null;
            try 
            {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("password");    
                $nomEntreprise = $request->request->get("nom_ent");                
                $telEntreprise = $request->request->get("tel_ent");                
                $adresseEntreprise = $request->request->get("adresse_ent");  
                $faxEntreprise = $request->request->get("fax_ent");    

                if (empty($cin)) 
                {
                    return new Response("",404);
                }
                else
                {
                $conn = $this->get('database_connection');
                $conn->insert('utilisateur', array('type' => 4 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass,
                'nom_ent' => $nomEntreprise,'tel_ent' => $telEntreprise,'adresse_ent' => $adresseEntreprise ,'fax_ent' => $faxEntreprise ));
                }
            } 
            catch (\Exception $exception) 
            {
                return new Response("",400);
            }

        return new Response("", 201);
    }
    /**
     * @Rest\Put("/entreprise/{id}")
     */
    public function putEntrepriseAction(Request $request, $id) {
        $result=  Null;
            try {
                $type = $request->request->get("type");
                $conn = $this->get('database_connection');
                if ($type == 3)
                {
                    $conn->update('utilisateur', array('type' => $type ),array('id' => $id));
                   
                }
                else
                {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("password");    
                $tel = $request->request->get("tel");                                
                $nomEntreprise = $request->request->get("nom_ent");                
                $telEntreprise = $request->request->get("tel_ent");                
                $adresseEntreprise = $request->request->get("adresse_ent");  
                $faxEntreprise = $request->request->get("fax_ent");    
                $conn->update('utilisateur', array('nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass,
                'nom_ent' => $nomEntreprise,'tel_ent' => $telEntreprise,'adresse_ent' => $adresseEntreprise ,'fax_ent' => $faxEntreprise ),array('id' => $id));
                  
                }
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }
     /**
     * @Rest\Delete("/entreprise/{id}")
     */
    public function deleteEntrepriseAction($id) {
        $result=  Null;
            try {
               
                $conn = $this->get('database_connection');
              
                    $conn->delete('utilisateur',array('id' => $id));
                
                $result= new Response("",200);
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

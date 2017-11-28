<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Exception\BadRequestDataException;

class PfeController extends FOSRestController
{
   

    /**
     * @Rest\Get("/pfe/{etat}")
     */
    public function getPfeAction($etat) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT * FROM pfe where etat_proposition =?',array($etat));
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }
    /**
     * @Rest\Post("/pfeProp")
     */
    public function postPfePropAction(Request $request) {
        $result=  Null;
        
            try 
            {
                $sujet_pfe = $request->request->get("sujet_pfe");  
                $desc_pfe = $request->request->get("desc_pfe");                
                $date_deb = $request->request->get("date_deb");                
                $date_fin = $request->request->get("date_fin");                               
                $id_prop = $request->request->get("id_prop");
                
                $conn = $this->get('database_connection');                
                
                $conn->insert('pfe', array('sujet_pfe' => $sujet_pfe , 'desc_pfe' => $desc_pfe ,'date_deb' => $date_deb ,'date_fin' => $date_fin ,'etat_proposition' => 0 ,'etat_demande' => 1 ,
                'id_prop' => $id_prop));
              
            } 
            catch (\Exception $exception) 
            {
                $this->throwFosrestSupportedException($exception);
                //return new Response("",400);
            }

        return new Response("", 201);
    }

    /**
     * @Rest\Post("/PfePub")
     */
    public function postPfePubAction(Request $request) {
        $result=  Null;
        
            try 
            {
                $sujet_pfe = $request->request->get("sujet_pfe");  
                $desc_pfe = $request->request->get("desc_pfe");                
                $date_deb = $request->request->get("date_deb");                
                $date_fin = $request->request->get("date_fin");                               
                $id_prop = $request->request->get("id_prop");
                
                $conn = $this->get('database_connection');                
                
                $conn->insert('pfe', array('sujet_pfe' => $sujet_pfe , 'desc_pfe' => $desc_pfe ,'date_deb' => $date_deb ,'date_fin' => $date_fin ,'etat_proposition' =>1 ,'etat_demande' => 1 ,
                'id_prop' => $id_prop));
              
            } 
            catch (\Exception $exception) 
            {
                $this->throwFosrestSupportedException($exception);
                //return new Response("",400);
            }

        return new Response("", 201);
    }

    /**
     * @Rest\Put("/pfe/{id}")
     */
    public function putPfeAction(Request $request, $id) {
        $result=  Null;
            try {
                $conn = $this->get('database_connection');
               
                $sujet_pfe = $request->request->get("sujet_pfe");  
                $desc_pfe = $request->request->get("desc_pfe");                
                $date_deb = $request->request->get("date_deb");                
                $date_fin = $request->request->get("date_fin");                               
                $id_prop = $request->request->get("id_prop");

                $conn->update('pfe', array('sujet_pfe' => $sujet_pfe , 'desc_pfe' => $desc_pfe ,'date_deb' => $date_deb ,'date_fin' => $date_fin  ),array('id' => $id));
                  
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }

    /**
     * @Rest\Put("/pfeValid/{id}")
     */
    public function putPfeValidAction(Request $request, $id) {
        $result=  Null;
            try {
                $conn = $this->get('database_connection');
                $etat_proposition = $request->request->get("etat_proposition");  
                $conn->update('pfe', array('etat_proposition' => $etat_proposition),array('id' => $id));
                  
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }
    /**
     * @Rest\Put("/pfeDemande/{id}")
     */
    public function putPfeDemandeAction(Request $request, $id) {
        $result=  Null;
            try {
                $conn = $this->get('database_connection');
                $etat_demande = $request->request->get("etat_demande");  
                $conn->update('pfe', array('etat_demande' => $etat_demande),array('id' => $id));
                  
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }
     /**
     * @Rest\Delete("/pfe/{id}")
     */
    public function deletePfeAction($id) {
        $result=  Null;
            try {
               
                $conn = $this->get('database_connection');
              
                $conn->delete('pfe',array('id' => $id));
                
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

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Stage;
use AppBundle\Exception\BadRequestDataException;

class StageController extends FOSRestController
{
   

    /**
     * @Rest\Get("/stage/{etat}")
     */
    public function getStageAction($etat) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT sujet_stage, desc_stage,nom_ent,tel_ent,adresse_ent,email,date_deb,date_fin,s.id
            FROM stage s , utilisateur u where etat_proposition =? and s.id_prop=u.id',array($etat));
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }
    /**
     * @Rest\Get("/stageId/{id}")
     */
    public function getStageByIdAction($id) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT * from stage where id =?',array($id));
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }
     /**
     * @Rest\Get("/stageByProp/{id}")
     */
    public function getStagebypropAction($id) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAll('SELECT * FROM stage where id_prop =?',array($id));
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }
    
    /**
     * @Rest\Post("/stageProp")
     */
    public function postStagePropAction(Request $request) {
        $result=  Null;
        
            try 
            {
                $sujet_stage = $request->request->get("sujet_stage");  
                $desc_stage = $request->request->get("desc_stage");                
                $date_deb = $request->request->get("date_deb");                
                $date_fin = $request->request->get("date_fin");                               
                $id_prop = $request->request->get("id_prop");

                $conn = $this->get('database_connection');                
                
                $conn->insert('stage', array('sujet_stage' => $sujet_stage , 'desc_stage' => $desc_stage ,'date_deb' => $date_deb ,'date_fin' => $date_fin ,'etat_proposition' => 0 ,'etat_demande' => 1 ,
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
     * @Rest\Post("/stagePub")
     */
    public function postStagePubAction(Request $request) {
        $result=  Null;
        
            try 
            {
                $sujet_stage = $request->request->get("sujet_stage");  
                $desc_stage = $request->request->get("desc_stage");                
                $date_deb = $request->request->get("date_deb");                
                $date_fin = $request->request->get("date_fin");                               
                $id_prop = $request->request->get("id_prop");
                
                $conn = $this->get('database_connection');                
                
                $conn->insert('stage', array('sujet_stage' => $sujet_stage , 'desc_stage' => $desc_stage ,'date_deb' => $date_deb ,'date_fin' => $date_fin ,'etat_proposition' =>1 ,'etat_demande' => 1 ,
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
     * @Rest\Put("/stage/{id}")
     */
    public function putStageAction(Request $request, $id) {
        $result=  Null;
            try {
                $conn = $this->get('database_connection');
               
                $sujet_stage = $request->request->get("sujet_stage");  
                $desc_stage = $request->request->get("desc_stage");                
                $date_deb = $request->request->get("date_deb");                
                $date_fin = $request->request->get("date_fin");                               
                $id_prop = $request->request->get("id_prop");

                $conn->update('stage', array('sujet_stage' => $sujet_stage , 'desc_stage' => $desc_stage ,'date_deb' => $date_deb ,'date_fin' => $date_fin  ),array('id' => $id));
                  
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }

    /**
     * @Rest\Put("/stageValid/{id}")
     */
    public function putStageValidAction($id) {
        $result=  Null;
            try {
                $conn = $this->get('database_connection');
                $conn->update('stage', array('etat_proposition' => 1),array('id' => $id));
                  
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }
    /**
     * @Rest\Put("/stageDemande/{id}")
     */
    public function putStageDemandeAction(Request $request, $id) {
        $result=  Null;
            try {
                $conn = $this->get('database_connection');
                $etat_demande = $request->request->get("etat_demande");  
                $conn->update('stage', array('etat_demande' => $etat_demande),array('id' => $id));
                  
                $result= new Response("",200);
            } catch (\Exception $exception) {
                $result= new Response("",400);  
            }
        return $result;
    }
     /**
     * @Rest\Delete("/stage/{id}")
     */
    public function deleteStageAction($id) {
        $result=  Null;
            try {
               
                $conn = $this->get('database_connection');
              
                $conn->delete('stage',array('id' => $id));
                
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

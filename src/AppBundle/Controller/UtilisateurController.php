<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Utiisateur;


class UtilisateurController extends FOSRestController
{
    /**
     * @Rest\Get("/utilisateur/{id}")
     */
    public function getUserAction($id) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $result = $conn->fetchAssoc('SELECT id,Ncin  FROM utilisateur where id = ? ',array($id));
        } catch (\Exception $exception) {
            $result=Response::HTTP_NOT_ACCEPTABLE;            
        }
        return  $result;
    }

    /**
     * @Rest\Get("/all/utilisateur")
     */
    public function getAllUserAction() {
        $result=  Null;
                try {
                    $conn = $this->get('database_connection');
                    //Your sql Query
                    $sql="SELECT * FROM utilisateur";
                    // Prepare your sql
                    $stmt = $conn->prepare($sql);
                    //execute your sql
                    $stmt->execute();
                    $result=$stmt->fetchAll(); // fetch your result*/
                } catch (\Exception $exception) {
                    $result=Response::HTTP_NOT_ACCEPTABLE;                    
                }
                return $result;
    }

    /**
     * @Rest\Post("add/utilisateur")
     */
    public function addUserAction(Request $request) {
        $result=  Null;
            try 
            {
                $cin_user = $request->request->get("Ncin");                
                if (empty($cin_user)) 
                {
                    $result= Response::HTTP_NOT_FOUND;
                }
                else
                {
                $conn = $this->get('database_connection');
                $conn->insert('utilisateur', array('Ncin' => $cin_user));
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
     * @Rest\Post("add/etudiant")
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
     * @Rest\Post("add/enseignant")
     */
    public function addEnseignantAction(Request $request) {
        $result=  Null;
            try 
            {
                $nom = $request->request->get("nom");  
                $prenom = $request->request->get("prenom");                
                $cin = $request->request->get("cin");                
                $email = $request->request->get("email");                
                $pass = $request->request->get("pass");   
                $tel = $request->request->get("tel");                                
                $grade = $request->request->get("grade");                
                if (empty($cin)) 
                {
                    $result= Response::HTTP_NOT_FOUND;
                }
                else
                {
                $conn = $this->get('database_connection');
                $conn->insert('utilisateur', array('type' => 2 ,'nom' => $nom , 'prenom' => $prenom ,'cin' => $cin ,'email' => $email ,'password' => $pass ,'tel' => $tel ,
                'grade' => $grade));
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
     * @Rest\Post("add/entreprise")
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
     * @Rest\Post("edit/utilisateur/{id}")
     */
    public function editUtilisateurAction(Request $request, $id) {
        $result=  Null;
            try {
                $cin_user = $request->request->get("Ncin");    
                $conn = $this->get('database_connection');
                $conn->update('utilisateur', array('Ncin' => $cin_user),array('id' => $id));
                $result=Response::HTTP_OK;
            } catch (\Exception $exception) {
                $result=Response::HTTP_NOT_ACCEPTABLE;
            }
        return$result;
    }
}

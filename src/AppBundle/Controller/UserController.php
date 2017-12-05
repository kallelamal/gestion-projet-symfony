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

class UserController extends FOSRestController
{
    /**
     * @Rest\Post("/user")
     */
    public function postCompteAction(Request $request) {
        $result=  Null;
        try {
            $conn = $this->get('database_connection');
            $email = $request->request->get("email");                
            $pass = $request->request->get("password");   
            $result = $conn->fetchAssoc('SELECT * FROM utilisateur where email=? AND password=?', array($email,$pass));
            
            if ($result==false) 
            {
                return new Response("Utilisateur n'existe pas",400);    
            }
            
        } catch (\Exception $exception) {
            $result=new Response("Utilisateur n'existe pas",400);        
        }
        return  $result;
    }
    /**
     * @Rest\Put("/user/{id}")
     */
    public function putUserAction(Request $request, $id) {
        $result=  Null;
            try {
                $password = $request->request->get("password");  
            
                $conn = $this->get('database_connection');
                $conn->update('utilisateur', array('password' => $password ),array('id' => $id));
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
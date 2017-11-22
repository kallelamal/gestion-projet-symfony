<?php
/**
 * Created by PhpStorm.
 * User: mrwahib
 * Date: 20/04/2016
 * Time: 12:40 PM
 */

namespace AppBundle\Exception;

class InvalidFormException extends \RuntimeException {
    protected $form;

    public function __construct($message, $form = NULL) {
        parent::__construct($message);
        $this->form = $form;
    }

    /**
     * @return array|null
     */
    public function getForm() {
        return $this->form;
    }
}
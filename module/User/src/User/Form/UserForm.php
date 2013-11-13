<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.11.13
 * Time: 12:37
 */

namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('userEdit');
        //$this->setAttribute('action', '');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'displayName',
            'type' => 'text',
            'options' => array(
                'label' => 'Name',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Save',
            ),
        ));
    }
}
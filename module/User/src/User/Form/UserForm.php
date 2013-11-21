<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.11.13
 * Time: 12:37
 */

namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class UserForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('useredit', $options);
        $this->setAttribute('action', 'edit');
        $this->addElements();
    }

    public function addElements() {

        $submit = new Element\Submit('submit');
        $submit->setValue('Save');

        $this->add(array(
            'type' => 'User\Form\UserFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));
        $this->add($submit);
    }
}
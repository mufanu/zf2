<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.11.13
 * Time: 16:48
 */

namespace Project\Form;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class ProjectForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('project');
        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new ProjectInputFilter());
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'created',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'userId',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'min' => 3,
                'max' => 25,
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'body',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Text',
            ),
        ));
        $this->add(array(
            'name' => 'state',
            'type' => 'Checkbox',
            'options' => array(
                'label' => 'published',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Save',
                'id' => 'submitbutton',
            ),
        ));
    }
}
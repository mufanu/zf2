<?php

namespace User\Form;

use Zend\Form\Fieldset;
use Zend\Form\Element;

class UserFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('user');
        $this->addElements();
    }

    public function addElements()
    {
        $avatar = new Element\File('avatar');
        $avatar->setLabel('Фото');

        $telephone = new Element\Text('telephone');
        $telephone->setLabel('Телефон');

        $site = new Element\Text('site');
        $site->setLabel('Сайт');

        $this->add($avatar);
        $this->add($telephone);
        $this->add($site);

        $this->add(array(
            'type' => 'User\Form\MasterFieldset',
        ));

    }
}
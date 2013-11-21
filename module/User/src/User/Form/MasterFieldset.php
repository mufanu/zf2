<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.11.13
 * Time: 11:28
 */

namespace User\Form;

use User\Entity\Master;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\Reflection;
use Zend\Form\Element;

class MasterFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('master');
        $this->setHydrator(new Reflection());
        $this->setObject(new Master());
        $this->addElements();
    }

    public function addElements()
    {
        $surname = new Element\Text('surname');
        $surname->setLabel('Фамилия');

        $name = new Element\Text('name');
        $name->setLabel('Имя');

        $patronymic = new Element\Text('patronymic');
        $patronymic->setLabel('Отчество');

        $birthday = new Element\Text('birthday');
        $birthday->setLabel('День рождения');

        $experience = new Element\Text('experience');
        $experience->setLabel('Стаж');

        $this->add($surname);
        $this->add($name);
        $this->add($patronymic);
        $this->add($birthday);
        $this->add($experience);
    }


}
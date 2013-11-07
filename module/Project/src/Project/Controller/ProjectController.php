<?php

namespace Project\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProjectController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}


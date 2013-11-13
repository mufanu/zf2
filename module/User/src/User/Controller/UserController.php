<?php

namespace User\Controller;

use User\Entity\User;
use User\Form\UserForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\Reflection;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    public function editAction()
    {
        $form = new UserForm();
        $form->setHydrator(new Reflection());
        $form->bind(new User());

        $request = $this->getRequest();

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        if ($this->zfcUserAuthentication()->hasIdentity()) {
            //get the user_id of the user
            $id = $this->zfcUserAuthentication()->getIdentity()->getId();
        }

        $user = $objectManager->find('\User\Entity\User', $id);

        if ($request->isPost()) {

            $form->setData($request->getPost());

            if ($form->isValid()) {

                $data = $form->getData();

                echo "<pre>";
                //var_dump($data);
                echo "</pre>";

                $user->exchangeArray($data);

                echo "<pre>";
                //var_dump($user);
                echo "</pre>";




                $objectManager->persist($user);
                $objectManager->flush();

                // Redirect to list of blogposts
                return $this->redirect()->toRoute('zfcuser');
            }

        } else {
            $form->bind($user);
            return array('form' => $form);
        }
    }


}


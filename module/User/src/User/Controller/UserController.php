<?php

namespace User\Controller;

use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\Stdlib\Parameters;
use Zend\View\Model\ViewModel;
use User\Entity\User;

class UserController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * Register new user
     */
    public function registerAction()
    {

    }

    public function companyAction()
    {
        return new ViewModel();
    }

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

            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $form->setData($post);
            /*
            echo "<pre>";
            var_dump($post);
            echo "</pre>";
            */

            if ($form->isValid()) {

                $adapter = new \Zend\File\Transfer\Adapter\Http();

                $userdir = $user->getUserdir();

                $adapter->setDestination($userdir);

                $file = $this->params()->fromFiles('avatar');

                //var_dump($File);

                $adapter->receive($file['name']);

                $data = $form->getData();

                $user->exchangeArray($data);

                $objectManager->persist($user);
                $objectManager->flush();

                // Redirect to user page
                return $this->redirect()->toRoute('zfcuser');
            }

        } else {
            $form->bind($user);
            return array('form' => $form);

        }
    }

}


<?php

namespace Project\Controller;

use Project\Entity\Project;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\Reflection;
use Zend\View\Model\ViewModel;
use Project\Form\ProjectForm;

class ProjectController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        $form = new ProjectForm();
        $form->setHydrator(new Reflection());
        $form->bind(new Project());

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

                $project = $form->getData();
                $project->setCreated(time());
                $project->setUserId(0);

                $objectManager->persist($project);
                $objectManager->flush();

                // Redirect to list of projects
                return $this->redirect()->toRoute('project');

                print '<pre>';
                var_dump($project);
                print '</pre>';
            }
            else {
                echo "error";
            }
        }

        return array('form' => $form);
    }

    public function viewAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            echo "error";
        }

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $post = $objectManager
            ->getRepository('\Project\Entity\Project')
            ->findOneBy(array('id' => $id));

        if (!$post) {
            echo "error";
        }

        $view = new ViewModel(array(
            'post' => $post->getArrayCopy(),
        ));

        return $view;

        //var_dump($id);
    }


}


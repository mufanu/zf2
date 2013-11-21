<?php
/**
 * Created by PhpStorm.
 * User: Фаил
 * Date: 26.10.13
 * Time: 20:04
 */

namespace User;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Расширение формы регистрации
     * @param $e
     */
    public function onBootstrap($e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $em = $eventManager->getSharedManager();
        $em->attach('ZfcUser\Form\RegisterFilter', 'init', function($e) {
                $filter = $e->getTarget();
                // do your form filtering here
            }
        );

        // Добавляем поле выбора типа учетной записи
        $em->attach('ZfcUser\Form\Register', 'init', function($e) {
                /* @var $form \ZfcUser\Form\Register */
                $form = $e->getTarget();
                $select = new \Zend\Form\Element\Radio('profile');
                $select->setLabel('Тип учетной записи');
                $select->setValueOptions(array(
                    '0' => 'Частный мастер',
                    '1' => 'Компания',
                ));
                $form->add($select);
            }
        );

        // Обрабатываем дополнительные поля
        $zfcServiceEvents = $e->getApplication()->getServiceManager()->get('zfcuser_user_service')->getEventManager();
        $zfcServiceEvents->attach('register', function($e) {
            $form = $e->getParam('form'); // Form object
            $user = $e->getParam('user'); // User account object
            /*
             * Тип учетной записи:
             * 0 - частный мастер
             * 1 - компания
             */
            $profile = (int) $form->get('profile')->getValue();

            switch ($profile) {
                case 0:
                    $master_id = $user->createMaster();
                    $user->setMaster($master_id);
                    break;
                case 1:
                    $company_id = $user->createCompany();
                    $user->setCompany($company_id);
                    break;
            }
            // Устанавливаем время создания учетной записи
            $user->setCreated(time());
        });
    }
}
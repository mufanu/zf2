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
     * @param Event $e
     */
    public function onBootstrap($e)
    {
        $zfcServiceEvents = $e->getApplication()->getServiceManager()->get('zfcuser_user_service')->getEventManager();
        $zfcServiceEvents->attach('register', function($e) {
            $user = $e->getParam('user');  // User account object
            $user->setCreated(time());
        });
    }
}
<?php
namespace Strapieno\User\Api;

use Zend\ModuleManager\Feature\HydratorProviderInterface;
use Zend\ModuleManager\Feature\InputFilterProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayUtils;


/**
 * Class Module
 */
class Module implements HydratorProviderInterface
{
    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/',
                ],
            ],
        ];
    }

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $events = $e->getApplication()->getEventManager();
        // TODO recover from configuration
        $listenerManager = $e->getApplication()->getServiceManager()->get('listenerManager');
        $events->attach($listenerManager->get('Strapieno\User\Api\V1\Listener\NotFoundListener'));
    }

    /**
     * {@inheritdoc}
     */
    public function getHydratorConfig()
    {
        return include __DIR__ . '/config/hydrator.config.php';
    }
}

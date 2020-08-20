<?php

namespace ContainerXj5BxkJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Q8YOSIService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Q8_YOSI' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Q8_YOSI'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\StudentController::getOne' => ['privates', '.service_locator.utXbjR0', 'get_ServiceLocator_UtXbjR0Service', true],
            'App\\Controller\\TeacherController::delete' => ['privates', '.service_locator.6P8ix8o', 'get_ServiceLocator_6P8ix8oService', true],
            'App\\Controller\\TeacherController::getOne' => ['privates', '.service_locator.6P8ix8o', 'get_ServiceLocator_6P8ix8oService', true],
            'App\\Controller\\TeacherController::update' => ['privates', '.service_locator.6P8ix8o', 'get_ServiceLocator_6P8ix8oService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel::terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
            'App\\Controller\\StudentController:getOne' => ['privates', '.service_locator.utXbjR0', 'get_ServiceLocator_UtXbjR0Service', true],
            'App\\Controller\\TeacherController:delete' => ['privates', '.service_locator.6P8ix8o', 'get_ServiceLocator_6P8ix8oService', true],
            'App\\Controller\\TeacherController:getOne' => ['privates', '.service_locator.6P8ix8o', 'get_ServiceLocator_6P8ix8oService', true],
            'App\\Controller\\TeacherController:update' => ['privates', '.service_locator.6P8ix8o', 'get_ServiceLocator_6P8ix8oService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel:terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
        ], [
            'App\\Controller\\StudentController::getOne' => '?',
            'App\\Controller\\TeacherController::delete' => '?',
            'App\\Controller\\TeacherController::getOne' => '?',
            'App\\Controller\\TeacherController::update' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\StudentController:getOne' => '?',
            'App\\Controller\\TeacherController:delete' => '?',
            'App\\Controller\\TeacherController:getOne' => '?',
            'App\\Controller\\TeacherController:update' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}
<?php

/**
 * Container.php - Dependency injection gateway
 *
 * @package jaxon-core
 * @author Thierry Feuzeu <thierry.feuzeu@gmail.com>
 * @copyright 2016 Thierry Feuzeu <thierry.feuzeu@gmail.com>
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause License
 * @link https://github.com/jaxon-php/jaxon-core
 */

namespace Jaxon\Zend;

use Psr\Container\ContainerInterface;

use Interop\Container\ContainerInterface as ZendContainerInterface; // For ZFv3
use Zend\ServiceManager\ServiceLocatorInterface;                    // For ZFv2

class Container implements ContainerInterface
{
    /**
     * @var ZendContainerInterface|ServiceLocatorInterface      $container
     */
    protected $container;

    /**
     * The constructor
     *
     * @param ZendContainerInterface|ServiceLocatorInterface    $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Check if a given class is defined in the container
     *
     * @param string                $sClass             A full class name
     *
     * @return bool
     */
    public function has($sClass)
    {
        return $this->container->has($sClass);
    }

    /**
     * Get a class instance
     *
     * @param string                $sClass             A full class name
     *
     * @return mixed                The class instance
     */
    public function get($sClass)
    {
        return $this->container->get($sClass);
    }
}

<?php

namespace tests\functional;

use Configuration\Bootstrap;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Configuration.
 */
class FunctionalTestCase extends \PHPUnit_Framework_TestCase
{
    /** @var  ContainerInterface */
    protected $container;

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }


    protected function setUp()
    {
        $this->container = Bootstrap::buildContainer();

        parent::setUp();
    }


}

<?php

namespace tests\functional\Configuration;

use Symfony\Component\DependencyInjection\ContainerInterface;
use tests\functional\FunctionalTestCase;

/**
 * Class Configuration.
 */
class BootstrapTest extends FunctionalTestCase
{


    public function test_the_container_build_correctly()
    {
        $this->assertInstanceOf(ContainerInterface::class, $this->getContainer());
    }


}

<?php

namespace spec\Card;

use Card\Card;
use PhpSpec\ObjectBehavior;
use spec\StaticFixtures;

/**
 * Class HandSpec.
 */
class HandSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(...StaticFixtures::getFlush());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Card\Hand');
    }

    public function it_contains_an_array_of_cards()
    {
        $this->getCards()->shouldBeArray();
    }

    public function it_contains_up_to_five_cards()
    {
        $this->shouldThrow('\Exception')->during('__construct', StaticFixtures::getSixCardFlush());
    }
}

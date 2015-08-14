<?php

namespace spec\Hands;

use PhpSpec\ObjectBehavior;
use spec\StaticFixtures;

/**
 * Class HighCardSpec.
 */
class HighCardSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Hands\HighCard');
    }

    /**
     * @param \Card\HandInterface $hand
     */
    public function it_will_return_a_score_in_case_of_a_match($hand)
    {
        $hand->getCards()->willReturn(StaticFixtures::getFlush());

        $this->match($hand)->shouldReturn(6);
    }
}
